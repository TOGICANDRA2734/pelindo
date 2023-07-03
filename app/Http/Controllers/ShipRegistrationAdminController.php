<?php

namespace App\Http\Controllers;

use App\Models\ShipRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function approveDokumenKapal($id){
        $data = ShipRegistration::findOrFail($id);

        $data->update([
            'status_admin' => 1,
            'status_galangan' => 1,
        ]); 
        
        if($data){
            return redirect()->route('ship-registration-admin.index')->with(['success' => 'Data telah disetujui']);
        } else{
            return redirect()->route('ship-registration-admin.index')->with(['success' => 'Data gagal disetujui']);
        }
    }


    public function tambahGalangan($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);
        
        $request->validate([
            'proses_galangan' => 'required',
        ]);

        // Dokumen Kapal
        $file = $request->file('proses_galangan');
        $file->storeAs('public/proses_galangan', $file->hashName());

        $result = $data->update([
            'proses_galangan' => $file->hashName(),
            'sertifikat_doc' => 1,
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Proses Galangan Berhasil Ditambah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Proses Galangan Gagal Ditambah']);
        }
    }

    public function editGalangan($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'proses_galangan' => 'required',
        ]);

        // Hapus Dokumen
        Storage::disk('local')->delete('public/proses_galangan/' . basename($data->proses_galangan));

        // Dokumen Kapal
        $file = $request->file('proses_galangan');
        $file->storeAs('public/proses_galangan', $file->hashName());

        $result = $data->update([
            'proses_galangan' => $file->hashName(),
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Proses Galangan Berhasil Diubah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Proses Galangan Gagal Diubah']);
        }
    }

    public function tambahSertifikatDoc($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'sertifikat_doc' => 'required',
        ]);

        // Dokumen Kapal
        $file = $request->file('sertifikat_doc');
        $file->storeAs('public/sertifikat_doc', $file->hashName());

        $result = $data->update([
            'sertifikat_doc' => $file->hashName(),
            'proses_end' => 1,
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Sertifikat Dok. Berhasil Ditambah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Sertifikat Dok. Gagal Ditambah']);
        }
    }

    public function editSertifikatDoc($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'sertifikat_doc' => 'required',
        ]);

        // Hapus Dokumen
        Storage::disk('local')->delete('public/sertifikat_doc/' . basename($data->sertifikat_doc));

        // Dokumen Kapal
        $file = $request->file('sertifikat_doc');
        $file->storeAs('public/sertifikat_doc', $file->hashName());

        $result = $data->update([
            'sertifikat_doc' => $file->hashName(),
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Sertifikat Dok. Berhasil Diubah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Sertifikat Dok. Gagal Diubah']);
        }
    }


    public function tambahEnd($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'proses_end' => 'required',
        ]);

        // Dokumen Kapal
        $file = $request->file('proses_end');
        $file->storeAs('public/proses_end', $file->hashName());

        $result = $data->update([
            'proses_end' => $file->hashName(),
            'status_laporan' => 1,
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Proses Endorsment Berhasil Ditambah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Proses Endorsment Gagal Ditambah']);
        }
    }

    public function editEnd($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'proses_end' => 'required',
        ]);

        // Hapus Dokumen
        Storage::disk('local')->delete('public/proses_end/' . basename($data->proses_end));

        // Dokumen Kapal
        $file = $request->file('proses_end');
        $file->storeAs('public/proses_end', $file->hashName());

        $result = $data->update([
            'proses_end' => $file->hashName(),
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Proses Endorsment Berhasil Diubah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Proses Endorsment Gagal Diubah']);
        }
    }


    public function tambahLaporan($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'laporan' => 'required',
        ]);

        // Dokumen Kapal
        $file = $request->file('laporan');
        $file->storeAs('public/laporan', $file->hashName());

        $result = $data->update([
            'laporan' => $file->hashName(),
            'status_sertifikat' => 1,
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Laporan Marine Inspector Berhasil Ditambah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Laporan Marine Inspector Gagal Ditambah']);
        }
    }

    public function editLaporan($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'laporan' => 'required',
        ]);

        // Hapus Dokumen
        Storage::disk('local')->delete('public/laporan/' . basename($data->laporan));

        // Dokumen Kapal
        $file = $request->file('laporan');
        $file->storeAs('public/laporan', $file->hashName());

        $result = $data->update([
            'laporan' => $file->hashName(),
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Laporan Marine Inspector Berhasil Diubah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Laporan Marine Inspector Gagal Diubah']);
        }
    }

    public function tambahSertifikat($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'sertifikat_ins' => 'required',
        ]);

        // Dokumen Kapal
        $file = $request->file('sertifikat_ins');
        $file->storeAs('public/sertifikat_ins', $file->hashName());

        $result = $data->update([
            'sertifikat_ins' => $file->hashName(),
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Sertifikat Marine Inspector Berhasil Ditambah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Sertifikat Marine Inspector Gagal Ditambah']);
        }
    }

    public function editSertifikat($id, Request $request)
    {
        $data = ShipRegistration::findOrFail($id);

        $request->validate([
            'sertifikat_ins' => 'required',
        ]);

        // Hapus Dokumen
        Storage::disk('local')->delete('public/sertifikat_ins/' . basename($data->sertifikat_ins));

        // Dokumen Kapal
        $file = $request->file('sertifikat_ins');
        $file->storeAs('public/sertifikat_ins', $file->hashName());

        $result = $data->update([
            'sertifikat_ins' => $file->hashName(),
        ]);

        if ($result) {
            return redirect()->route('ship-registration-user.show', $id)->with(['success' => 'Data Sertifikat Marine Inspector Berhasil Diubah']);
        } else {
            return redirect()->route('ship-registration-user.show', $id)->with(['error' => 'Data Sertifikat Marine Inspector Gagal Diubah']);
        }
    }
}
