<?php

namespace App\Http\Controllers;

use App\Models\ShipRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ShipRegistrationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataStats = DB::table('ship_registration')
            ->select(
                DB::raw("COUNT(*) AS total,
            SUM(CASE WHEN status_admin = 0 THEN 1 ELSE 0 END) AS status_0,
            SUM(CASE WHEN status_admin = 1 THEN 1 ELSE 0 END) AS status_1,
            SUM(CASE WHEN status_admin = 2 THEN 1 ELSE 0 END) AS status_2"),
            )
            ->get();

        if ($request->ajax()) {
            $status_admin = $request->input('status_admin', 'all');

            if ($status_admin == 'all') {
                $data = DB::table('ship_registration')
                    ->select(DB::raw('id, company, no_reg, DATE_FORMAT(created_at, "%d-%m-%Y") created_at, CASE status_admin WHEN 0 THEN "Request" WHEN 1 THEN "Approved" WHEN 2 THEN "Waiting Approval" ELSE "Invalid status" END AS status_admin'))
                    ->get();
            } else {
                $data = DB::table('ship_registration')
                    ->select(DB::raw('id, company, no_reg, DATE_FORMAT(created_at, "%d-%m-%Y") created_at, CASE status_admin WHEN 0 THEN "Request" WHEN 1 THEN "Approved" WHEN 2 THEN "Waiting Approval" ELSE "Invalid status" END AS status_admin'))
                    ->where('status_admin', $status_admin)
                    ->get();
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url = route('ship-registration-user.show', ['ship_registration_user' => $row->id]);
                    $btn = '<a href="' . $url . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>';
                    return $btn;
                })
                ->rawColumns(['number', 'action'])
                ->make(true);
        }

        return view('ship-registration-admin.index', compact('dataStats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
