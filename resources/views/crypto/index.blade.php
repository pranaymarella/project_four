@extends('layouts.master')

@section('content')
    <table class="table">
      <thead class="thead-inverse">
        <tr>
          <th>Cryptocurrency</th>
          <th>Amount Owned</th>
          <th>Price Purchased</th>
          <th>Date Purchased</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          @foreach($cryptos as $crypto)
          <tr>
              <td>{{ $crypto['currency_name' ] }}</td>
              <td>{{ $crypto['currency_amount']}}</td>
              <td>$ {{ $crypto['currency_price'] }}</td>
              <td>{{ $crypto['created_at'] }}</td>
              <td>
                  <form method="POST" action="/deleteC/{{ $crypto['id'] }}">
                      {{ method_field('delete') }}
                      {{ csrf_field() }}
                      <input type="submit" value="Delete" class="btn btn-primary btn-small btn-danger">
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>

    <div class="row text-center">
        <form method="GET" action="/addCrypto">
            <button type="submit" class="btn btn-success">Add New Purchase</button>
        </form>
        <br>
        <form method="GET" action="/addNewCrypto">
            <button type="submit" class="btn btn-success">List A New Cryptocurrency</button>
        </form>
    </div>

    <div class="row">
        <h3 class="text-center">Related News</h3>

        @foreach($news as $article)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="text-left">
                    <h2 class="panel-title">"{{ $article['title'] }}" News</h2>
                </div>
            </div>
            <div class="panel-body"><a href="{{ $article['link']}}">{{ $article['link']}}</a></div>
            <div class="panel-footer">Related to:
                @foreach($article['types'] as $currencies)
                {{ $currencies['currency_name'] }}
                @endforeach
                <div class="text-right">
                    <form method="GET" action="/editArticle/{{ $article['id'] }}">
                        <input type="submit" value="Edit" class="btn btn-primary btn-small btn-info">
                    </form>
                    <br>
                    <form method="POST" action="/deleteA/{{ $article['id'] }}">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <input type="submit" value="Delete" class="btn btn-primary btn-small btn-danger">
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row text-center">
        <form method="GET" action="/addArticle">
            <button type="submit" class="btn btn-success">Add Article</button>
        </form>
    </div>
    <br>

@endsection
