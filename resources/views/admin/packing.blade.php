<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="font-size: 30px;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Winkel - Scouting Raamsdonksveer</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    @foreach($orders as $order)
        <div class="container m-5" style="page-break-after: always;">
            
            <h1>Bestelling #{{ $order-> slug}}</h1>
            <p class="lead">
                {{ ucfirst($order->speltak) }} - {{ $order->name }}
            </p>

            <table class="table mt-5">
                @foreach($order->rules as $rule)
                    <tr>
                        <td>{{ $rule->product }}</td>
                        <td>{{ $rule->type }} {{ $rule->size }}</td>
                        <td><small><em>{{ $rule->description }}</em></small></td>
                    </tr>
                @endforeach
            </table>            
        </div>
    @endforeach
    
    <script type="text/javascript">window.print()</script>
</body>
</html>
