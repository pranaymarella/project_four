<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>
        @yield('title', 'Crypto')
    </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="/css/styles.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn+SC" rel="stylesheet">

    @stack('head')

</head>

<body>
    <div class="container">
        <header>
            <div class="row text-center">
                <h1>Cryptocurrency Tracker</h1>
            </div>
        </header>

        @if(session('alert'))
            <div class='row alert text-center'>
                {{ session('alert') }}
            </div>
        @endif

        <section id="main">
            <div class="row">
                @yield('content')
            </div>
        </section>

        <footer class="text-center">
            <div class="row">
                <a href='https://github.com/pranaymarella/project_four'>Github<i class='fa fa-github'></i></a>&nbsp; &copy; {{ date('Y') }}
            </div>
        </footer>
    </div>

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='/js/crypto.js'></script>
    <script>
      (function(b,i,t,C,O,I,N) {
        window.addEventListener('load',function() {
          if(b.getElementById(C))return;
          I=b.createElement(i),N=b.getElementsByTagName(i)[0];
          I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
        },false)
      })(document,'script','https://widgets.bitcoin.com/widget.js','btcwdgt');
    </script>

    @stack('body')

</body>
</html>
