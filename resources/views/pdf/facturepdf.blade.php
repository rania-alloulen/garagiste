<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css" integrity="sha512-h+jxHd1kXOv1UbYfS8+kZXRwACrzoi2Lvc4hHa4Jbb4xGd7yXHlGgYzq3KjMkVt+ZABsTynT7iC2Q1yV7skacQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .ul{
            list-style-type: none;
        }
    </style>

</head>
<body>
        <ul class="ul">
            @foreach ($factures as $fc)
                <li>{{$fc->chargeSupp}}</li>
                <li>{{$fc->montant}}</li>
                <li>{{$fc->client_nom}} - {{$fc->client_prenom}} </li>
            @endforeach
            <li></li>
        </ul>

    </table>
</body>
</html>
