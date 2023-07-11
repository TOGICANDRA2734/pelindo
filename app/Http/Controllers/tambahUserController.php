<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tambahUserController extends Controller
{
    public function step1()
    {
        return view('auth.register_1');
    }
    public function postStep1(Request $request)
    {
        // Process the data
        $client = new Client();

        try {
            $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi/' . $request->provinsi);
            $provinces = json_decode($response->getBody(), true);

            $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/kota/' . $request->kota);
            $kota = json_decode($response->getBody(), true);

            // Change Value
            $request->merge(['provinsi' => $provinces['nama']]);
            $request->merge(['kota' => $kota['nama']]);

            // Return the provinces as JSON response
        } catch (\Exception $e) {
            // Handle API request error
        }

        // Store the data in session
        session(['step1_data' => $request->all()]);

        return redirect()->route('tambahUser.step2');
    }

    public function step2()
    {
        return view('auth.register_2');
    }
    public function postStep2(Request $request)
    {

        $client = new Client();

        try {
            $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi/' . $request->provinsi_surat);
            $provinces = json_decode($response->getBody(), true);

            $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/kota/' . $request->kota_surat);
            $kota = json_decode($response->getBody(), true);

            // Change Value
            $request->merge(['provinsi_surat' => $provinces['nama']]);
            $request->merge(['kota_surat' => $kota['nama']]);
        } catch (\Exception $e) {
            // Handle API request error
        }

        $step1Data = session('step1_data');
        session()->forget('step1_data');
        $fileHashName = null;

        $requestData = $request->except('foto');
        $requestData['foto'] = $fileHashName;
        $requestData = array_merge($requestData, $step1Data);

        session(['step2_data' =>  $requestData]);

        return redirect()->route('tambahUser.step3');
    }

    public function step3()
    {
        return view('auth.register_3');
    }
    public function postStep3(Request $request)
    {
        

        $step2Data = session('step2_data');
        session()->forget('step2_data');

        // Store files
        $filePaths = [];
        $fileFields = ['dok_1', 'dok_2', 'dok_3', 'dok_4', 'dok_5', 'dok_6', 'dok_7', 'dok_8', 'dok_9'];

        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $filePath = $file->store('public/user_files');
                $filePaths[$fileField] = $filePath;
            }
        }


        // Create a new user
        $user = new User([
            'name' => $step2Data['name'],
            'username' => $step2Data['username'],
            'password' => $step2Data['password'],
            'email' => $step2Data['email'],
            'role' => 'kapal',
            'status_perkawinan' => $step2Data['status_perkawinan'],
            'agama' => $step2Data['agama'],
            'gol_darah' => $step2Data['gol_darah'],
            'alamat_surat' => $step2Data['alamat_surat'],
            'provinsi_surat' => $step2Data['provinsi_surat'],
            'kota_surat' => $step2Data['kota_surat'],
            'kode_pos' => $step2Data['kode_pos'],
            'telepon' => $step2Data['telepon'],
            'hp' => $step2Data['hp'],
            'tgl_lahir' => $step2Data['tgl_lahir'],
            'jenis_kelamin' => $step2Data['jenis_kelamin'],
        ]);

        // Save the user1
        $user->save();

        // Attach file paths to the user model
        // $user->filePaths()->createMany($filePaths);

        // Log in the user
        Auth::login($user);

        return redirect()->route('ship-registration-user.create');
    }

    public function complete()
    {
    }
}
