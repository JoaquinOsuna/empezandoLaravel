
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primera vista</title>
</head>
<body>
    <h1>Mundo Laravel - {{ "Hola mundo $nombre $apellido" }}  </h1>

    <ul>
        @isset($posts2)
            isset
        @endisset

        @empty($posts2)
            empty
        @endempty


        @forelse ($posts as $post)
        <li>
            
            @if ($loop->first)
                Primero:
            @endif


            @if ($loop->last)
            Ultimo:
            @endif

            {{ $post }}
        </li>
        @empty
        <li>Vacio</li>

        @endforelse
    </ul>
</body>
</html>


