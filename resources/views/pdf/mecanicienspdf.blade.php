<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css" integrity="sha512-h+jxHd1kXOv1UbYfS8+kZXRwACrzoi2Lvc4hHa4Jbb4xGd7yXHlGgYzq3KjMkVt+ZABsTynT7iC2Q1yV7skacQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <img src="{{ public_path($logo) }}" class="w-24">
    <table class="border border-lg text-center">
        <tr class="border border-lg">
            <th class="border border-lg p-4">#</th>
            <th class="border border-lg p-4">@lang('Nom')</th>
            <th class="border border-lg p-4">@lang('prenom')</th>
            <th class="border border-lg p-4">@lang('telephone')</th>
            <th class="border border-lg p-4">@lang('adresse')</th>
        </tr>
        @foreach($mecaniciens as $m)
            <tr class="border border-lg">
                <td class="border border-lg p-4">{{$m->id}}</td>
                <td class="border border-lg p-4">{{$m->nom}}</td>
                <td class="border border-lg p-4">{{ $m->prenom }}</td>
                <td class="border border-lg p-4">{{ $m->telephone }}</td>
                <td class="border border-lg p-4">{{ $m->adresse }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>