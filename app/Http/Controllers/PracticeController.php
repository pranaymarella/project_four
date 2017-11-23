<?php

nameespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Crypto;

class PracticeController extends Controller {
    public function practice1() {
        $newCrypto = new Crypto();
    }
}
