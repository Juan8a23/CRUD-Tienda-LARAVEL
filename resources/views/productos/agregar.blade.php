@extends('layouts.main')
@section('contenido')
    <br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Agregar Producto
                    </div>
                    <div class="card-body">

                        <form action="{{ route('productos.guardar') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" name="descripcion">
                            </div>

                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" class="form-control" name="precio">
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