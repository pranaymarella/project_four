@extends('layouts.master')

@section('content')
<div class="row text-center">
    <h2> Add Currency </h2>
    <form method="POST" action="/addCrypto/add">
        {{ csrf_field() }}

        <label for="name">Cryptocurrency Name</label><br>
        <input type="text" name="name" placeholder="Name of Cryptocurrency">
        <br>
        <label for="amount_owned">Amount Owned</label><br>
        <input type="text" name="owned" placeholder="Amount purchased">
        <br>
        <label for="price">Price Purchased</label><br>
        <input type="text" name="price" placeholder="price purchased at">
        <br>
        <br>
        <input type='submit' value='Add Crypto' class='btn btn-primary btn-small'>
        <br>
        <br>
    </form>
</div>
@endsection
