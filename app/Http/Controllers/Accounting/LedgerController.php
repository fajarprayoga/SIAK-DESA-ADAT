<?php

namespace App\Http\Controllers\Accounting;

use App\Account;
use App\Http\Controllers\Controller;
use App\Journal;
use App\JournalDetail;
use App\Ledger;
use App\LedgerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use PDF;
use Illuminate\Support\Facades\Auth;

class LedgerController extends Controller
{
    public $yearStart = '';
    public $montStart = '';
    public $montEnd = '';
    public $yearEnd = '';



    public function ledgerdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Ledger::latest()->get();

            return Datatables::of($data)
                    ->editColumn('status', function($row) {
                        if($row->status == 'pending'){
                            $class = 'bg-warning';
                        }else if($row->status == 'approved'){
                            $class = 'bg-primary';
                        }else{
                            $class = 'bg-danger';
                        }
                        return '<span class="badge '.$class.'"> '. $row->status .'</span>';
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn='';
                        $btn .= ' <a href="' .route('accounting.ledger.report', $row->id). '" class=" btn btn-info btn-md my-1">View</a>';
                        if(Auth::user()->can('isAccounting')){
                                if($row->status != 'approved'){
                                    $btn .= ' <a href="javascript:void(0)" id="delete" onClick="removeItem(' .$row->id. ')" class="btn btn-md btn-danger my-1">Delete</a>';
                                }
                            // $btn = ' <a href="' .route('accounting.ledger.edit', $row->id). '" class=" btn btn-primary btn-sm my-1">Edit</a>';
                            // $btn .= '<a href="javascript:void(0)" class=" btn btn-primary btn-sm my-1">View</a>';
                        }
                        if(Auth::user()->can('isManager') && $row->status != 'approved'){
                            $btn.= ' <button class="btn btn-md btn-primary btn-approve mr-1" data-id = "'. $row->id .'" onclick="approve('.$row->id.')">Terima </button>';
                            $btn.= '<button class="btn btn-md btn-danger btn-reject" onclick="rejected('.$row->id.')" >Tolak</button>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['details','action', 'status'])
                    ->make(true);
        }
    }

    public function index()
    {
        return view('accounting.ledger.index');
    }


    public function create()
    {
        return view('accounting.ledger.create');
    }


    public function store(Request $request)
    {

        DB::beginTransaction();


        try{
            $this->montStart = date('m', strtotime($request->monthStart));
            $this->montEnd = date('m', strtotime($request->monthEnd));
            $this->yearEnd = date('Y', strtotime($request->monthEnd));
            $this->yearStart = date('Y', strtotime($request->monthStart));

            // dd($request->all());
            $journal = Journal::select('id')
                    ->where('register', '>=', date('Y-m-d', strtotime($request->monthStart. '-01')))
                    ->where('register', '<=', date('Y-m-d', strtotime($request->monthEnd. '-31')))
                    // ->where('register', '<=', date('Y-m-d', strtotime( $request->monthEnd. '-01')))
                    ->get();
            // ->where(function ($query){
            //     $query->whereMonth('register', $this->montStart);
            //     $query->whereYear('register', $this->yearStart);
            // })
            // ->where(function ($query){
            //     $query->whereMonth('register', $this->montEnd);
            //     $query->whereYear('register', $this->yearEnd);
            // })->get();

                // dd($journal);
            // dd(array($request->monthStart. '-01', $request->monthEnd. '-01'));
            foreach ($journal as $key => $value) {
                $journal_id[$key] = $value->id;
            }

            $journal_details = JournalDetail::whereIn('journal_id', $journal_id)->get();

            // insert ledger
            $ledger = Ledger::create($request->all());

            $ledger_detail_data=[];
            (new DateTime($journal_details[$i]->created_at))->format('Y-m-d');
            for ($i = 0; $i < count($journal_details); $i++) {
                $ledger_detail_data[$i] =[
                    'date' =>    (new DateTime($journal_details[$i]->created_at))->format('Y-m-d'),
                    'ledger_id' => $ledger->id,
                    'account_id' => $journal_details[$i]->account_id,
                    'types' => $journal_details[$i]->types,
                    'amount' => $journal_details[$i]->amount,
                    'description' => $journal_details[$i]->description
                ];
            }



            $ledger->ledger_detail()->createMany($ledger_detail_data);

            DB::commit();
            return redirect()->route('accounting.ledger.index')->with('success', 'Success');
        }catch(\Throwable $th){
            DB::rollBack();
            dd($th);
            return redirect()->back();
        }

    }


    public function show($id)
    {
        $ledger = Ledger::findOrFail($id);
        // dd($ledger);
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        try {
            $ledger = Ledger::findOrFail($id);
            if($request->status == 'approved'){
                $ledger->update([
                    'status' => $request->status
                ]);
                return 1;
            }else{
                $ledger->update([
                    'status' => $request->status,
                    'note' => $request->note
                ]);
                return 1;
            }
        } catch (\Throwable $th) {
            // dd($th);
            return 0;
        }
    }

    public function destroy(Ledger $ledger)
    {
        try {
            $ledger->delete();
            return 'Item Berhasil Di Hapus';
        } catch (\Throwable $th) {
            return $th;
        }

    }

    public function report($id)
    {
        // $ledger = Ledger::with('ledger_detail')->findOrFail($id);


        $ledger = Ledger::where('id', $id)
        ->with([ 'ledger_detail' => function($query) {
            $query->orderBy('date', 'ASC');
        }])->first();

        $ledgerDetail = LedgerDetail::where('ledger_id', $ledger->id)->with('account')->get();
        $accountId = $ledgerDetail->groupBy('account_id');

        $pdf = PDF::loadview('accounting.ledger.report', ['ledger' => $ledger, 'accountId' => $accountId]);
        return $pdf->stream();
    }
}
