@extends('layouts.main')
@section('contenido')
    <br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Producto
                    </div>
                    <div class="card-body">

                        <form action="{{ route('productos.actualizar', $producto->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input value="{{ $producto->descripcion }}" type="text" class="form-control" name="descripcion">
                            </div>

                            <div class="form-group">
                                <label for="">Precio</label>
                                <input value="{{ $producto->precio }}" type="number" class="form-control" name="precio">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Agregar</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-danger">Cancelar</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection