@extends('layouts.master')

@section('content')
<div class="row text-center">
    <h2> Add Currency </h2>
    <form method="POST" action="/addNewCrypto/add">
        {{ csrf_field() }}

        <label for="name">Cryptocurrency Name</label><br>
        <input type="text" name="name" placeholder="Name of Cryptocurrency">
        <br><br>
        <input type='submit' value='Add Crypto' class='btn btn-primary btn-small'>
        <br>
        <br>
    </form>
    <a href="/">Go Back</a>
    <br><br>
</div>
@endsection
