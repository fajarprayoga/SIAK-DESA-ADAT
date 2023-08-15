<?php

namespace App\Http\Controllers\cashier;

use App\Http\Controllers\Controller;
use App\Material;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{

    public function materialdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Material::where('is_delete' ,'!=', 1 )->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '';
                        if(Auth::user()->can('isCashier')){
                            $btn = ' <a href="' .route('cashier.material.edit', $row->id). '" class=" btn btn-info btn-sm my-1">Edit</a>';
                            // $btn .= '<a href="javascript:void(0)" class=" btn btn-primary btn-sm my-1">View</a>';
                            $btn .= ' <a href="javascript:void(0)" id="delete" onClick="removeItem(' .$row->id. ')" class=" btn btn-danger btn-sm my-1">Delete</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

    }

    public function index()
    {
        return view('cashier.material.index');
    }


    public function create()
    {
        return view('cashier.material.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:materials',
        ]);

        $material = Material::create($request->all());
        return redirect()->back()->with('success', 'Success');
    }


    public function show($id)
    {
        //
    }


    public function edit(Material $material)
    {
        return view('cashier.material.edit', compact('material'));
    }


    public function update(Request $request, Material $material)
    {
        $material->update($request->all());
        return redirect()->back()->with('success', 'Success');
    }


    public function destroy(Material $material)
    {
        $material->is_delete=1;
        $material->save();
        return 'Item Berhasil Di Hapus';
    }
}
