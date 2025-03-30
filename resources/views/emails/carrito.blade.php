<table class="table" >        
    <th>Datos del Pedido</th>
        <tr><td>USUARIO</td>
            <td><a href="{{$carrito->email}}">{{$carrito->email}}</a></td>
        </tr>
        <tr><td>PRODUCTOS</td>
            <td>{{$carrito->pedido}}</td>
        </tr>

       <tr><td>PRODUCTOS</td>
            <td>{{$carrito->pedido}}</td>
        </tr>
        <tr><td>TOTAL</td>
            <td>{{$carrito->total_pedido}}</td>
        </tr>
        <tr><td>ENVIO</td>
            <td>{{$carrito->envio}}</td>
        </tr>
  
</table>