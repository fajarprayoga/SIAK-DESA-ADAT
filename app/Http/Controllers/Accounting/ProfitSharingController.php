<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfitSharingRequest;
use App\Incomestatement;
use App\ProfitSharing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class ProfitSharingController extends Controller
{
    public function index()
    {
        return view('accounting.profit-sharing.index');
    }


    public function profitSharingData(Request $request)
    {
        if ($request->ajax()) {
            $data = ProfitSharing::latest()->get();

            return DataTables::of($data)
                ->editColumn('status', function ($row) {
                    if ($row->status == 'pending') {
                        $class = 'bg-warning';
                    } else if ($row->status == 'approved') {
                        $class = 'bg-primary';
                    } else {
                        $class = 'bg-danger';
                    }
                    return '<span class="badge ' . $class . '"> ' . $row->status . '</span>';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (Auth::user()->can('isEmployes')) {
                        if ($row->status != 'approved') {
                            $btn .= ' <a href="javascript:void(0)" id="delete" onClick="removeItem(' . $row->id . ')" class=" btn btn-danger btn-md my-1">Delete</a>';
                        }
                    }
                    $btn .= ' <a href="' . route('accounting.profit-sharing.report', $row->id) . '" class=" btn btn-info btn-md my-1">View</a>';
                    return $btn;
                })

                ->rawColumns(['details', 'action', 'status'])
                ->make(true);
        }
    }

    public function create()
    {
        $incomestatements = Incomestatement::get();

        return view("accounting.profit-sharing.create", compact("incomestatements"));
    }

    public function store(StoreProfitSharingRequest $request)
    {
        $payload = $request->validated();

        $incomestatement = Incomestatement::query()->where("id", $payload["incomestatement_id"])->first();

        $incomestatementTotal = $incomestatement->incomestatement_detail->sum(fn ($detail) => $detail->amount - $detail->expense);

        $totalEmployee = User::query()->whereIn("role", [
            "employes"
        ])->get();

        $details = [
            "incomestatement" => $incomestatementTotal,
            "share" => [
                [
                    "name" => "punggung-village-share",
                    "qty" => 1,
                    "value" => 0.5 * $incomestatementTotal
                ],
                [
                    "name" => "deprecation_cost",
                    "qty" => 1,
                    "value" => 0.05 * $incomestatementTotal
                ],
                [
                    "name" => "employee_share",
                    "qty" => $totalEmployee->count(),
                    "value" => 0.45 * $incomestatementTotal
                ]
            ]
        ];

        ProfitSharing::query()
            ->create($payload + [
                "details" => $details
            ]);

        return redirect()->route("accounting.profit-sharing.index");
    }

    public function show()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function report(ProfitSharing $profit_sharing)
    {
        dd($profit_sharing);
        $pdf = PDF::loadview('accounting.profit-sharing.report', compact("profit_sharing"));
        return $pdf->stream();
    }

    public function destroy(Request $request, ProfitSharing $profitSharing)
    {
        $profitSharing->delete();

        if ($request->ajax()) {
            return response()
                ->json([
                    "message" => "Hapus data sukses!"
                ]);
        }

        return redirect()->route('accounting.profit-sharing.index')->with("message", "Delete Success");
    }
}
