<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Crypto;
use App\News;

class CryptoController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all()->toArray();
        $news = News::all()->toArray();

        return view('crypto.index')->with([
            'cryptos' => $cryptos,
            'news' => $news,
        ]);
    }
}
