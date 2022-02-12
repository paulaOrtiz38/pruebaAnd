<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>



    </script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h4>Detalle Producto</h4>
        <div class="row">
            <div class="col-xl-12">
                <a href="javascript:history.back()">Regresar</a>
            </div>
            <div class="col-xl-12">
                @include('producto.map')
            </div>

            <div class="col-xl-12">
                    <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        {{$producto->nombre}}
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio: </label>
                        {{$producto->precio}}
                    </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones: </label>
                        {{$producto->observaciones}}
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad: </label>
                        {{$producto->cantidad}}
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado: </label>
                             @if($producto->estado == 'no_disponible') No Disponible @else {{$producto->estado}} @endif
                    </div>
                    <div class="form-group">
                       <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen: </label>
                            <img src="{{asset($producto->imagen)}}" width="30%" />
                        </div>
                    </div>

                    <div class="form-group">

                    </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
