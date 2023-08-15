<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequestCreate;
use App\Http\Requests\AccountRequestUpdate;
use App\Account;
use DataTables;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function accountdata(Request $request)
    {
        if ($request->ajax()) {

            $data = Account::where('is_delete' ,'!=', 1 )->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if(Auth::user()->can('isAccounting')){

                            $btn = ' <a href="' .route('accounting.accounts.edit', $row->id). '" class=" btn btn-info btn-sm my-1">Edit</a>';
                            // $btn .= '<a href="javascript:void(0)" class=" btn btn-primary btn-sm my-1">View</a>';
                            $btn .= ' <a href="javascript:void(0)" id="delete" onClick="removeItem(' .$row->id. ')" class=" btn btn-danger btn-sm my-1">Delete</a>';
                            return $btn;
                        }
                        return ;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

    }
    public function index()
    {
        return view('accounting.account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounting.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequestCreate $request)
    {
        $data = $request->all();
        Account::create($data);
        return redirect()->route('accounting.accounts.index')->with('success', 'Success');
        // return redirect()->back()->with('success', 'Success');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('accounting.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->update($request->all());
        return redirect()->route('accounting.accounts.index')->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        // $account->delete();
        $account->is_delete=1;
        $account->save();
        return 'Item Berhasil Di Hapus';
    }
}
