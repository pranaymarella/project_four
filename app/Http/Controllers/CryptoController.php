<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\Crypto;
use App\Article;
use App\Types;

class CryptoController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all()->toArray();
        $news = Article::with('types')->orderBy('created_at', 'desc')->limit(3)->get()->toArray();
        $types = Types::all();

        return view('crypto.index')->with([
            'cryptos' => $cryptos,
            'news' => $news,
            'types' => $types
        ]);
    }

    // FUNCTION TAKE YOU TO THE PAGE OF ADDINE NEW CRYPTOCURRENCIES
    public function addNewCrypto() {
        return view('crypto.addnewcrypto');
    }

    // FUNCTION FOR ADDING NEW CRYPTOCURRENCIES
    public function addNewC(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $checkIfExists = Types::where('currency_name', '=', $request->input('name'))->first();

        if ($checkIfExists != null) {
            $validate = "This currency already exists";
            // dd($validate);
            return redirect()->back()->with('alert', $validate);
        }

        $currency = new Types();
        $currency->currency_name = $request->input('name');
        $currency->save();

        return redirect('/')->with('alert', $request->input('name').' is added to list of currencies');
    }

    // FUNCTION TAKES YOU TO THE PAGE OF ADDING CRYPTO PURCHASES
    public function addCrypto()
    {
        $types =Types::all();
        return view('crypto.addcrypto')->with([
            'cryptos' => $types
        ]);
    }

    // FUNCTION FOR ADDING CRYPTO PURCHASES
    public function addC(Request $request)
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

    // FUNCTION TAKES YOU TO THE PAGE OF ADDING ARTICLES
    public function addA()
    {
        $types = Types::all()->toArray();
        $typesForCheckboxes = Types::getForCheckboxes();
        return view('crypto.addarticle')->with([
            'currencies' => $types,
            'typesForCheckboxes' => $typesForCheckboxes
        ]);
    }

    // FUNCTION FOR ADDING ARTICLES
    public function addArticle(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'article_link' => 'required|url'
        ]);

        $article = new Article();
        $article->title = $request->input('name');
        $article->link = $request->input('article_link');
        $article->save();

        $article->types()->sync($request->input('relations'));

        return redirect('/')->with('alert', $request->input('name').' was added!');
    }

    // FUNCTION FOR DELETING CRYPTO
    public function deleteC($id) {
        $crypto = Crypto::find($id);

        if (!$crypto) {
            return redirect('/')->with('alert', 'Not Found');
        }

        $crypto->delete();
        return redirect('/')->with('alert', $crypto->currency_name.'was removed.');
    }

    public function deleteA($id) {
        $article = Article::find($id);

        if (!$article) {
            return redirect('/')->with('alert', 'Not Found');
        }

        $article->types()->detach();
        $article->delete();

        return redirect('/')->with('alert', $article->title.'was deleted');
    }
}
