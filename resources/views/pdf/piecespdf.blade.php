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
            <th class="border border-lg p-4">@lang('Nom piece')</th>
            <th class="border border-lg p-4">@lang('Reference')</th>
            <th class="border border-lg p-4">@lang('Prix')</th>
            <th class="border border-lg p-4">@lang('Fournisseur')</th>
        </tr>
        @foreach($pieces as $p)
            <tr class="border border-lg">
                <td class="border border-lg p-4">{{$p->id}}</td>
                <td class="border border-lg p-4">{{$p->nompiece}}</td>
                <td class="border border-lg p-4">{{ $p->referencep }}</td>
                <td class="border border-lg p-4">{{ $p->prix}}</td>
                <td class="border border-lg p-4">{{ $p->fournisseur }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>