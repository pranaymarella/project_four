@extends('layouts.master')

@section('content')
<div class="row text-center">
    <h2> Add Currency </h2>
    <form method="POST" action="/addCrypto/add">
        {{ csrf_field() }}

        <label for="name">Cryptocurrency Name</label><br>
        <select name="name">
            @foreach ($cryptos as $crypto)
            <option value="{{ $crypto['currency_name'] }}">{{ $crypto['currency_name'] }}</option>
            @endforeach
        </select>
        <!-- <input type="text" name="name" placeholder="Name of Cryptocurrency"> -->
        <br><br>
        <label for="amount_owned">Amount Owned</label><br>
        <input type="text" name="owned" placeholder="Amount purchased">
        <br><br>
        <label for="price">Price Purchased</label><br>
        <input type="text" name="price" placeholder="price purchased at">
        <br>
        <br>
        <input type='submit' value='Add Crypto' class='btn btn-primary btn-small'>
        <br>
        <br>
    </form>
    <a href="/">Go Back</a>
    <br><br>
</div>
@endsection
