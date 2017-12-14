@extends('layouts.master')

@section('content')
<div class="row text-center">
    <h2> Add New Article </h2>
    <form method="POST" action="/editArticle/{{ $article['id'] }}/edit">
        {{ csrf_field() }}

        <label for="name">Article Title</label><br>
        <input type="text" name="name" value="{{ $article['title'] }}" placeholder="Name of Article">
        <br>
        <label for="article_link">Link</label><br>
        <input type="text" name="article_link" value="{{ $article['link'] }}" placeholder="Link to Article">
        <br>
        <label for="relation">Related To:</label><br>
        @foreach ($typesForCheckboxes as $id => $currency_name)
        <input
            type="checkbox"
            value="{{ $id }}"
            name="relations[]"
            {{ (in_array($currency_name, $typesForThisArticle)) ? 'CHECKED' : '' }}
        > {{ $currency_name }} <br>
        @endforeach
        <br>
        <input type='submit' value='Update Article' class='btn btn-primary btn-small'>
        <br>
        <br>
    </form>
    <a href="/">Go Back</a>
    <br><br>
</div>
@endsection
