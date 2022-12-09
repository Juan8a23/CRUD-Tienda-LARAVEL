@extends('layouts.main')
@section('contenido')
    <br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                        <a href="{{ route('productos.agregar') }}" class="btn btn-success btn-sm float-right">Agregar producto</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                            <div class="alert alert-success" role="alert">
                                {{ session('info') }}
                            </div>
                        @endif

                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr>
                                    <td>
                                        {{ $producto->descripcion }}
                                    </td>
                                    <td>
                                        {{ $producto->precio }}
                                    </td>
                                    <td>
                                        <a href="{{ route('productos.editar', $producto->id) }}" class="btn btn-warning tn-sm">Editar</a>
                                        <a href="javascript: document.getElementById('delete-{{ $producto->id }}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{ $producto->id }}" action="{{ route('productos.eliminar', $producto->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        Bienvenido {{ auth()->user()->name }}
                        <a href="javascript:document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-right">Cerrar sesión</a>
                        <form method="POST" action="{{ route('logout') }}" id="logout" style="display:none">
                        @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
