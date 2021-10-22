<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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

        <div class="container m-5">
            
            <h1>Bestelling Scouting Raamsdonksveer</h1>
            <p class="lead">Afgedrukt op {{ date('d-m-Y') }}</p>
            <p><em>Let op: enkel volledig betaalde bestelling staan in dit overzicht.</em></p>

            <table class="table table-striped table-hover mt-5">
                <tr>
                    <th>Aantal</th>
                    <th>Product / instructie</th>
                    <th>Maat</th>
                </tr>
                @foreach($rules as $rule)
                    <tr>
                        <td>{{ $rule->count }}</td>
                        <td>{{ $rule->description }}</td>
                        <td>{{ $rule->size }}</td>
                    </tr>
                @endforeach
            </table>
            
        </div>
    
    <script type="text/javascript">window.print()</script>
</body>
</html>
