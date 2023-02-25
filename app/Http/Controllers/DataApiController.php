<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DataApiController extends Controller
{
    public function index(){
        $headers = [
            'Content-Type' => 'application/json',
        ];
        $client = new Client([
            'headers' => $headers
        ]);
        $request = $client->get('https://reqres.in/api/users');
        $response = $request->getBody()->getContents();
        $data = json_decode($response);
        return view('dataapi', compact('data'));
    }
}
