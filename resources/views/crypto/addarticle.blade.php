@extends('layouts.master')

@section('content')
<div class="row text-center">
    <h2> Add Article </h2>
    <form method="POST" action="/addArticle/add">
        {{ csrf_field() }}

        <label for="name">Article Name</label><br>
        <input type="text" name="name" placeholder="Name of Article">
        <br>
        <label for="article_link">Article Link</label><br>
        <input type="text" name="article_link" placeholder="Article Link">
        <br>
        <label for="crypto">Cryptocurrency Relation</label><br>
        <input type="text" name="crypto" placeholder="Cryptocurrency Link">
        <br>
        <br>
        <input type='submit' value='Add Article' class='btn btn-primary btn-small'>
        <br>
        <br>
    </form>
</div>
@endsection
