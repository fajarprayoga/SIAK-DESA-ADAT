<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Account;
use App\Journal;
use App\JournalDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\JournalRequestCreate;
use App\Transaction;
use DataTables;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use PDF;
use Symfony\Component\VarDumper\Cloner\Data;

class JournalController extends Controller
{
    public function journaldata(Request $request)
    {
        if ($request->ajax()) {
            $data = Journal::latest()->get();

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
                        if(Auth::user()->can('isAccounting')){
                            if($row->status !='approved'){
                                $btn = ' <a href="' .route('accounting.journal.edit', $row->id). '" class=" btn btn-primary btn-sm my-1">Edit</a>';
                                $btn .= ' <a href="javascript:void(0)" id="delete" onClick="removeItem(' .$row->id. ')" class=" btn btn-danger btn-sm my-1">Delete</a>';
                            }
                            // $btn .= '<a href="javascript:void(0)" class=" btn btn-primary btn-sm my-1">View</a>';
                        }
                        if(!Auth::user()->can('isCashier')){
                            $btn .= ' <a href="' .route('accounting.journal.show', $row->id). '" class=" btn btn-info btn-sm my-1">View</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['details','action', 'status'])
                    ->make(true);
        }

    }

    public function index()
    {
        return view('accounting.journal.index');
    }

    public function create()
    {
        $accounts = Account::all();
        return view('accounting.journal.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $date = (new DateTime($request->register))->format('Y-m-d');
            $data=[
                'register' =>  $date,
                'title' => $request->title,
                'description' => $request->description
            ];
            $journal = Journal::create($data);
            $journal_details_data=[];
            for($i = 0; $i< count($request->accounts); $i++){
                $journal_details_data[$i] = [

                        'journal_id' => $journal->id,
                        'account_id' => $request->accounts[$i],
                        'types' => $request->types[$i],
                        'amount' => $request->amount[$i] ?  str_replace(".","",  $request->amount[$i])  : 0,
                        'description' => $request->description_journal_detail[$i]

                ];
            }

            $journal->journal_detail()->createMany($journal_details_data);

            DB::commit();
            return redirect()->route('accounting.journal.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            // return redirect()->back();
        }
        // echo date('Y-m-d'. strtotime($request->register));
        // dd(date('Y-m-d'. strtotime($request->register)));
    }

    public function show($id)
    {
        $journal = Journal::findOrFail($id);
        return view('accounting.journal.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        $accounts = Account::all();
        return view('accounting.journal.edit', compact('journal', 'accounts'));
    }

    public function update(Request $request, $id)
    {
        $journal = Journal::findOrFail($id);
        if(Auth::user()->can('isManager')){
            // dd($request->status);

           try {
                if($request->status == 'approved'){
                    // $journal->update([
                    //     'status' => $request->status
                    // ]);
                    // $journal->status  =  $request->status;
                    $journal->update([
                        'status' => $request->status,
                        'note' => ''
                    ]);
                    return 1;
                }else{
                    // $journal->update([
                    //     'status' => $request->status,
                    //     'note' => $request->note
                    // ]);
                    // $journal->status  =  $request->status;
                    // $journal->note = $request->note;
                    $journal->update([
                        'status' => $request->status,
                        'note' => $request->note
                    ]);
                    return 1;
                    // dd($request->all());
                }

           } catch (\Throwable $th) {
               dd($th);
               return 0;
           }

        }else{
            DB::beginTransaction();

            // $date = (new DateTime(strtotime($request->register)))->format('Y-m-d');
            $date = date('Y-m-d', strtotime($request->register));
            try {
                $data=[
                    'register' =>  $date,
                    'title' => $request->title,
                    'description' => $request->description
                ];
                $journal->update($data);
                DB::table('journal_details')->where('journal_id', $journal->id)->delete();

                for($i = 0; $i< count($request->accounts); $i++){
                    $journal_details_data[$i] = [
                        'journal_id' => $journal->id,
                        'account_id' => $request->accounts[$i],
                        'types' => $request->types[$i],
                        'amount' => $request->amount[$i] ?  str_replace('.', '', $request->amount[$i]) : 0,
                        'description' => $request->description_journal_detail[$i]
                    ];
                }

                DB::table('journal_details')->insert(
                    $journal_details_data
                );
                DB::commit();
                // dd(date('Y-m-d', strtotime($request->register)));
                return redirect()->back()->with('success', 'Success');
            } catch (\Throwable $th) {
                DB::rollBack();
                dd($th);
                return redirect()->back();
            }
        }
        // dd(date('Y-m-d', strtotime($request->register)));

    }

    public function destroy(Journal $journal)
    {
       try {
        $journal->delete();
        return 'Item Berhasil Di Hapus';
       } catch (\Throwable $th) {
           return $th;
       }

    }

    function deleteItemDetail ($id) {
        try {
            // $journal->delete();
            // $journalDetails->delete();
            // return 'Item Berhasil Di Hapus';
            $journalDetails = JournalDetail::findOrFail($id);
            $journalDetails->delete();
            return 'Item Berhasil Di Hapus';
           } catch (\Throwable $th) {
               return $th;
           }

    }

    public function report($id)
    {
        $journal = Journal::findOrFail($id);
        // return view('accounting.journal.show', compact('journal'));
        $pdf = PDF::loadview('accounting.journal.report', ['journal' => $journal]);
        return $pdf->stream();
    }

    public function expense($date)
    {
        $daten = date('Y-m-d', strtotime($date));
        $expenses = Transaction::where('created_at', $daten)->where('expense', '!=', 0)->get();

        return json_decode($expenses);
    }
}
