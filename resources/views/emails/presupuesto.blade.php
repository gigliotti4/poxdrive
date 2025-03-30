<table class="table" >
    <th>Datos del pedido de presupuesto</th>
    <tr><td>Nombre</td><td>{{$dataRequest['nombre']}}</td></tr>
    <tr><td>Correo</td><td>{{$dataRequest['email']}}</td></tr>
    @if(isset($dataRequest['telefono'] ))
    <tr><td>Telefono</td><td>{{$dataRequest['telefono']}}</td></tr>
    @endif

    @if(isset($dataRequest['servicio'] ))
         @switch($dataRequest['servicio'])
        @case(1)
        <tr><td>Servicio</td><td>Limpieza y adecuaciÃ³n del material</td></tr>
            @break
        @case(2)
        <tr><td>Servicio</td><td>Mecanizado</td></tr>
            @break
         @case(3)
            <tr><td>Servicio</td><td>Tratamiento tÃ©rmico</td></tr>
            @break
             @case(4)
            <tr><td>Servicio</td><td>Recteficacion</td></tr>
            @break
             @case(5)
            <tr><td>Servicio</td><td>Afilaci¨®n</td></tr>
            @break
        @default
            
        @endswitch
    @endif

@if(isset($dataRequest['empresa'] ))
    <tr><td>Empresa</td><td>{{$dataRequest['empresa']}}</td></tr>
    @endif
    <tr><td>Mensaje</td><td>{{$dataRequest['mensaje']}}</td></tr>
</table>
