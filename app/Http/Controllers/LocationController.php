<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getProvinces()
    {
        $client = new Client();

        try {
            $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi');
            $provinces = json_decode($response->getBody(), true);

            // Return the provinces as JSON response
            return response()->json($provinces);
        } catch (\Exception $e) {
            // Handle API request error
            return response()->json(['error' => 'Failed to fetch provinces.'], 500);
        }
    }

    public function getCities($provinceId)
    {
        $client = new Client();

        try {
            $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $provinceId);
            $cities = json_decode($response->getBody(), true);

            // Return the cities as JSON response
            return response()->json($cities);
        } catch (\Exception $e) {
            // Handle API request error
            return response()->json(['error' => 'Failed to fetch cities.'], 500);
        }
    }
}
