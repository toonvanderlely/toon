<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>4Shop - Toon van der lely</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/narrow-jumbotron.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ mix('/js/app.js') }}"></script>
</head>
<body>
    <div class="container">
      <header class="header d-flex justify-content-between align-items-center">
        <h3 class="text-muted"><a href="{{ route('home') }}" class="no-link">4Shop</a></h3>
        <a href="{{ route('cart') }}"><img class="cart" src="{{ url('img/cart.png') }}" alt=""></a>
      </header>
      <main role="main">
        @if (session('status'))
            <div class="alert alert-{{ session('status')[0] }}">
                {!! session('status')[1] !!}
            </div>
        @endif
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
        @yield('content')
      </main>

      <footer class="footer">
        <p>Een winkel van 4S. Terheijdenseweg 350, Breda. Mail bij vragen: <a href="mailto:info@4s.nl">info@4s.nl</a></p>
      </footer>

    </div>
</body>
</html>
