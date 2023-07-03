<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\ShipRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ShipRegistrationUserController extends Controller
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
    public function create(Request $request)
    {

        if ($request->ajax()) {
            $data = ShipRegistration::select('id', 'no_reg', 'company', 'npwp', 'siup', 'pic')->get();
            
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    return $row->DT_RowIndex;
                })
                ->addColumn('action', function ($row) {
                    $url = route('ship-registration-user.show', ['ship_registration_user' => $row->id]);


                    $editBtn = '<a href="'.route("ship-registration-user.edit", $row->id).'" class="btn btn-warning btn-sm mr-1" style="margin-right:0.1rem;"><i class="fa-solid fa-pen-to-square"></i></a>';
                    $btn = '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>' . $editBtn;
                    return $btn;
                })
                ->rawColumns(['number', 'action'])
                ->make(true);
        }

        return view('ship-registration-user.create');

        // return $dataTable->render('ship-registration-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company'   => 'required',
            'npwp'  => 'required',
            'no_pmku'   => 'required',
            'siup'  => 'required',
            'pic'   => 'required',
            'pic_email' => 'required',
            'name_ship' => 'required',
            'of_ship'   => 'required',
            'last_docking'  => 'required',
            'trade_area'    => 'required',
            'dnol' => 'required',
            'gross_tonage' => 'required',
            'classification' => 'required',
            'company_ship' => 'required',
            'registry'  => 'required',
            'keel_laid' => 'required',
            'galangan'  => 'required',
            'effective_power'   => 'required',
            'cert_expired'  => 'required',
            'owner_address' => 'required',
            'engine_no' => 'required',
            'class_expired' => 'required',
            'main_engine'   => 'required',
            'machine_number'    => 'required',
            'hull'  => 'required',
            'ship_type' => 'required',
            'dokumen_kapal' => 'required',
        ]);

        $check_number_distinct = true;
        while($check_number_distinct){
            $reg_value = "REQ-" . mt_rand(100000000, 999999999);

            if(! DB::table('ship_registration')->where('no_reg', $reg_value)->exists()){
                $check_number_distinct = false;
            }
        }

        // Dokumen Kapal
        $file = $request->file('dokumen_kapal');
        $file->storeAs('public/dokumen_kapal', $file->hashName());

        $result = ShipRegistration::create([
            'no_reg' => $reg_value, 
            'company' => $request->company,
            'npwp' => $request->npwp,
            'no_pmku' => $request->no_pmku,
            'siup' => $request->siup,
            'pic' => $request->pic,
            'pic_email' => $request->pic_email,
            'name_ship' => $request->name_ship,
            'of_ship' => $request->of_ship,
            'last_docking' => $request->last_docking,
            'trade_area' => $request->trade_area,
            'dnol' => $request->dnol,
            'gross_tonage' => $request->gross_tonage,
            'classification' => $request->classification,
            'company_ship' => $request->company_ship,
            'registry' => $request->registry,
            'keel_laid' => $request->keel_laid,
            'galangan' => $request->galangan,
            'effective_power' => $request->effective_power,
            'cert_expired' => $request->cert_expired,
            'owner_address' => $request->owner_address,
            'engine_no' => $request->engine_no,
            'class_expired' => $request->class_expired,
            'main_engine' => $request->main_engine,
            'machine_number' => $request->machine_number,
            'hull' => $request->hull,
            'ship_type' => $request->ship_type,
            'dokumen_kapal' => $file->hashName(),
        ]);

        if($result){
            return redirect()->route('ship-registration-user.create')->with(['success' => 'Data Berhasil Ditambah']);
        } else {
            return redirect()->route('ship-registration-user.create')->with(['error' => 'Data Gagal Ditambah']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ShipRegistration::findOrFail($id);

        return view('ship-registration-user.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ShipRegistration::findOrFail($id);


        return view('ship-registration-user.edit', compact('data', 'id'));
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
        $request->validate([
            'company'   => 'required',
            'npwp'  => 'required',
            'no_pmku'   => 'required',
            'siup'  => 'required',
            'pic'   => 'required',
            'pic_email' => 'required',
            'name_ship' => 'required',
            'of_ship'   => 'required',
            'last_docking'  => 'required',
            'trade_area'    => 'required',
            'dnol' => 'required',
            'gross_tonage' => 'required',
            'classification' => 'required',
            'company_ship' => 'required',
            'registry'  => 'required',
            'keel_laid' => 'required',
            'galangan'  => 'required',
            'effective_power'   => 'required',
            'cert_expired'  => 'required',
            'owner_address' => 'required',
            'engine_no' => 'required',
            'class_expired' => 'required',
            'main_engine'   => 'required',
            'machine_number'    => 'required',
            'hull'  => 'required',
            'ship_type' => 'required',
        ]);

        // cek file
        if ($request->dokumen_kapal == '') {
            $data = ShipRegistration::findOrFail($id);
            $data->update([
                'company' => $request->company,
                'npwp' => $request->npwp,
                'no_pmku' => $request->no_pmku,
                'siup' => $request->siup,
                'pic' => $request->pic,
                'pic_email' => $request->pic_email,
                'name_ship' => $request->name_ship,
                'of_ship' => $request->of_ship,
                'last_docking' => $request->last_docking,
                'trade_area' => $request->trade_area,
                'dnol' => $request->dnol,
                'gross_tonage' => $request->gross_tonage,
                'classification' => $request->classification,
                'company_ship' => $request->company_ship,
                'registry' => $request->registry,
                'keel_laid' => $request->keel_laid,
                'galangan' => $request->galangan,
                'effective_power' => $request->effective_power,
                'cert_expired' => $request->cert_expired,
                'owner_address' => $request->owner_address,
                'engine_no' => $request->engine_no,
                'class_expired' => $request->class_expired,
                'main_engine' => $request->main_engine,
                'machine_number' => $request->machine_number,
                'hull' => $request->hull,
                'ship_type' => $request->ship_type,
            ]);
        } else {
            $data = ShipRegistration::findOrFail($id);
            
            Storage::disk('local')->delete('public/dokumen_kapal/'.basename($data->dokumen_kapal));

            $file = $request->file('dokumen_kapal');
            $file->storeAs('public/dokumen_kapal', $file->hashName());
            
            $data->update([
                'company' => $request->company,
                'npwp' => $request->npwp,
                'no_pmku' => $request->no_pmku,
                'siup' => $request->siup,
                'pic' => $request->pic,
                'pic_email' => $request->pic_email,
                'name_ship' => $request->name_ship,
                'of_ship' => $request->of_ship,
                'last_docking' => $request->last_docking,
                'trade_area' => $request->trade_area,
                'dnol' => $request->dnol,
                'gross_tonage' => $request->gross_tonage,
                'classification' => $request->classification,
                'company_ship' => $request->company_ship,
                'registry' => $request->registry,
                'keel_laid' => $request->keel_laid,
                'galangan' => $request->galangan,
                'effective_power' => $request->effective_power,
                'cert_expired' => $request->cert_expired,
                'owner_address' => $request->owner_address,
                'engine_no' => $request->engine_no,
                'class_expired' => $request->class_expired,
                'main_engine' => $request->main_engine,
                'machine_number' => $request->machine_number,
                'hull' => $request->hull,
                'ship_type' => $request->ship_type,
                'dokumen_kapal' => $file->hashName(),
            ]);

        }
        

        if ($data) {
            return redirect()->route('ship-registration-user.create')->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect()->route('ship-registration-user.create')->with(['error' => 'Data Gagal Diupdate']);
        }
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

    public function filter(Request $request)
    {
        if ($request->ajax()) {
            $data_documentation = DB::table('ship_documentation')
            ->select(DB::raw('id, call_sign, reg_number, type_vessel, file'))
            ->get();

            return DataTables::of($data_documentation)
                ->addIndexColumn()
                ->addColumn('details', function ($row) {
                    $btn = '<button class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></button>';
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $url = str_replace('\\', '/', ($row->file));
                    $btn = '<button onClick="openPdf(\'' . $url . '\')" class="btn btn-success btn-sm"><i class="fa-solid fa-file"></i></button>';
                    return $btn;
                })
                ->rawColumns(['details', 'action'])
                ->make(true);
        }

    }
}
