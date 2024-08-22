@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Editar Empleado</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/empleados/'.$empleados->id.'/edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $empleados->nombre }}">
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $empleados->apellido }}">
                        </div>

                        <div class="form-group">
                            <label for="puesto">Puesto</label>
                            <input type="text" name="puesto" id="puesto" class="form-control" value="{{ $empleados->puesto }}">
                        </div>

                        <div class="form-group">
                            <label for="area">Área</label>
                            <input type="text" name="area" id="area" class="form-control" value="{{ $empleados->area }}">
                        </div>

                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" value="{{ $empleados->foto }}">

                        <div class="form-group text-center">
                            <input type="submit" value="Confirmar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
