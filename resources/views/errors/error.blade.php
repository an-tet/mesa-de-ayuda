@isset($error)
    <script>
        console.log("code error -> " + {{ $error->getCode() }});

    </script>
    @switch($error->getCode())
        @case(2002)
        error en la conexion base de datos
        @break
        @default
        Error contectese con el administradores
    @endswitch
@endisset

@empty($error)
    Error contectese con el administradores
@endempty
