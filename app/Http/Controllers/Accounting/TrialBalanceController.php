<?php

namespace App\Http\Controllers\accounting;

use App\Account;
use App\Http\Controllers\Controller;
use App\Ledger;
use App\TrialBalance;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
class TrialBalanceController extends Controller
{
    public function trialbalancedata (Request $request){
        if ($request->ajax()) {
            $data = TrialBalance::latest()->get();

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
                        $btn .= ' <a href="' .route('accounting.trialbalance.report', $row->id). '" class=" btn btn-info btn-md my-1">View</a>';
                        if(Auth::user()->can('isAccounting')){
                                if($row->status != 'approved'){
                                    $btn .= ' <a href="javascript:void(0)" id="delete" onClick="removeItem(' .$row->id. ')" class=" btn btn-danger btn-md my-1">Delete</a>';
                                }

                            // $btn = ' <a href="' .route('accounting.ledger.edit', $row->id). '" class=" btn btn-primary btn-sm my-1">Edit</a>';
                            // $btn .= '<a href="javascript:void(0)" class=" btn btn-primary btn-sm my-1">View</a>';
                        }
                        if(Auth::user()->can('isManager') && $row->status !='approved'){
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
        // $trial_balances = TrialBalance::with('trial_balance_detail')->get();

        return view('accounting.trialbalance.index');
    }

   function create()
    {
        $ledgers = Ledger::all();
        // dd($ledgers);
        return view('accounting.trialbalance.create', compact('ledgers'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // $request->register =  (new DateTime($request->register))->format('Y-m-d');
            $data = $request->all();
            $data['register'] = (new DateTime($request->register))->format('Y-m-d');

            $trial_balance = TrialBalance::create($data);
            $ledger = Ledger::with('ledger_detail')->where('id', $request->ledger_id)->first();

            // dd($ledger->ledger_detail->groupBy('account_id'));
            $trial_balance_detail = [];
            $data_trial_balance = [];
            foreach ($ledger->ledger_detail->groupBy('account_id') as $index => $detail) {
                $sum = 0;
                foreach ($detail as $indexAccount => $account) {
                    $sum = $account->types == 'debit' ? $sum + $account->amount :  $sum - $account->amount;
                }
                $data_trial_balance[$index] = [
                    'date' => (new DateTime($trial_balance->register))->format('Y-m-d'),
                    'account_id' => $detail[0]->account->id,
                    // 'types' => $detail[0]->types,
                    'amount' => $sum,
                    // 'description' => $detail->description
                ];
            }

            $account = Account::latest()->get();

            foreach ($account as $key => $value) {
                $trial_balance_detail[$key] = [
                    'date' => (new DateTime($trial_balance->register))->format('Y-m-d'),
                    'account_id' => $value->id,
                    'amount' => array_key_exists($value->id,$data_trial_balance)? $data_trial_balance[$value->id]['amount'] : 0 ,
                ];
            }

            $trial_balance->trial_balance_detail()->createMany($trial_balance_detail);

            DB::commit();
            return redirect()->route('accounting.trialbalance.index')->with('success', 'Success');

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back();
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        try {
            $trial_balance = TrialBalance::findOrFail($id);
            if($request->status == 'approved'){
                $trial_balance->update([
                    'status' => $request->status
                ]);
                return 1;
            }else{
                $trial_balance->update([
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


    public function destroy($id)
    {
        try {
            $trial_balance = TrialBalance::findOrFail($id);
            $trial_balance->delete();
            return 'Item Berhasil Di Hapus';
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function report($id)
    {

        $trial_balance = TrialBalance::where('id', $id)
        ->with(['trial_balance_detail' => function($query) {
            $query->with('account');
            $query->orderBy('date', 'ASC');
        }])->first();


        $pdf = PDF::loadview('accounting.trialbalance.report', ['trial_balance' => $trial_balance]);
        return $pdf->stream();
    }

}
