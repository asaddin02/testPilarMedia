<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function setApi()
    {
        $data = [
            ['id_pengirim' => 'PJ01', 'id_penerima' => 'CS01', 'alamat' => 'Surabaya -
            osowilangon', 'priority' => 4],
            ['id_pengirim' => 'PJ02', 'id_penerima' => 'CS02', 'alamat' => 'Surabaya -
            pasarturi', 'priority' => 3],
            ['id_pengirim' => 'PJ03', 'id_penerima' => 'CS03', 'alamat' => 'Gresik -
            Kebomas', 'priority' => 5],
            ['id_pengirim' => 'PJ04', 'id_penerima' => 'CS04', 'alamat' => 'Sidoarjo -
            Aloha', 'priority' => 1],
            ['id_pengirim' => 'PJ05', 'id_penerima' => 'CS05', 'alamat' => 'Surabaya -
            Rungkut', 'priority' => 2]
        ];
        return response()->json($data);
    }
}
