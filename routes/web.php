<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'ROOT';
});

Route::middleware('auth')->group(function() {

    Route::get('/productos', function() {
        $productos = Producto::orderBy('created_at', 'desc')->get();
        return view('productos.index', compact('productos'));
    })->name('productos.index');
    
    Route::get('/productos/agregar', function() {
        return view('productos.agregar');
    })->name('productos.agregar');
    
    Route::post('/productos', function(Request $request) {
        $request->all();
        $newProducto = new Producto;
        $newProducto->descripcion = $request->input('descripcion');
        $newProducto->precio = $request->input('precio');
        $newProducto->save();
    
        return redirect()->route('productos.index')->with('info', 'Producto guardado con exito.');
    })->name('productos.guardar');
    
    Route::delete('/productos/{id}', function($id) {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('info', 'Producto eliminado con exito.');
    })->name('productos.eliminar');
    
    Route::get('/productos/{id}/editar', function($id) {
        $producto = Producto::findOrFail($id);
        return view('productos.editar', compact('producto'));
    })->name('productos.editar');
    
    Route::put('/productos/{id}', function(Request $request, $id) {
        $producto = Producto::findOrFail($id);
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->save();
        return redirect()->route('productos.index')->with('info', 'El producto se actualizó con exito');
    })->name('productos.actualizar');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
