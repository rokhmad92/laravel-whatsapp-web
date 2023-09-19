<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $nomer = $request->input('nomer');
        // $pesan = $request->input('pesan');
        $data = User::all();
        foreach ($data as $value) {
            $response = Http::post('http://localhost:3000/api/post', [
                'nomer' => $value->phone,
                'pesan' => "Hallo word",
            ]);
        }
        return back();
    }
}
