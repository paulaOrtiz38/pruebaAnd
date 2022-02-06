<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Productos</title>

</head>
<body>
    <div class="container">
        <h4>Gestión Productos</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('producto.index')}}" method="GET">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                            <a href="{{route('producto.create')}}" class="btn btn-success">Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>NOMBRE</th>
                                <th>PRECIO</th>
                                <th>OBSERVACIONES</th>
                                <th>CANTIDAD</th>
                                <th>ESTADO</th>
                                <th>CIUDADES</th>

                            </tr>
                        </thead>
                        <tbody>
                        @if(count($productos)<=0)
                            <tr>
                                <td colspan="7">No hay resultados</td>
                            </tr>
                        @else

                            @foreach ($productos as $producto )
                                <tr>
                                    <td>
                                        <a href="{{route('producto.edit',$producto->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        |
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$producto->id}}">
                                            Eliminar
                                        </button>
                                    </td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td>{{$producto->observaciones}}</td>
                                    <td>{{$producto->cantidad}}</td>
                                    <td>{{$producto->estado}}</td>
                                    <td>
                                        <ul>
                                        @foreach ($producto->ciudades as $ciudad)
                                           <li> {{$ciudad->nombre}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                @include('producto.delete')
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{--$productos->links()--}}
                </div>
            </div>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
