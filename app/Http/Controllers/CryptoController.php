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

    public function addC()
    {
        return view('crypto.addcrypto');
    }

    public function addCrypto(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'owned' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $crypto = new Crypto();
        $crypto->currency_name = $request->input('name');
        $crypto->currency_amount = $request->input('owned');
        $crypto->currency_price = $request->input('price');
        $crypto->save();

        return redirect('/')->with('alert', $request->input('name').'was added!');
    }

    public function addA()
    {
        return view('crypto.addarticle');
    }

    public function addArticle(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'article_link' => 'required|url',
            'crypto' => 'required',
        ]);

        $article = new News();
        $article->title = $request->input('name');
        $article->link = $request->input('article_link');
        $article->cryptocurrency = $request->input('crypto');
        $article->save();

        return redirect('/')->with('alert', $request->input('name').'was added!');
    }

    public function deleteC($id) {
        Crypto::destory($id);
        return view('crypto.index');
    }
}
