<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\ShipRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ShipRegistrationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ship-registration-user.index');
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


                    $editBtn = '<a href="#" class="btn btn-warning btn-sm mr-1" style="margin-right:0.1rem;"><i class="fa-solid fa-pen-to-square"></i></a>';
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
        ]);

        $check_number_distinct = true;
        while($check_number_distinct){
            $reg_value = "REQ-" . mt_rand(100000000, 999999999);

            if(! DB::table('ship_registration')->where('no_reg', $reg_value)->exists()){
                $check_number_distinct = false;
            }
        }


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
