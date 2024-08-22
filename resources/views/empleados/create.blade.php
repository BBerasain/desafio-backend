@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Agregar Empleado</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/empleados/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" name="Nombre" id="Nombre" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label for="Apellido">Apellido</label>
                            <input type="text" name="Apellido" id="Apellido" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label for="Puesto">Puesto</label>
                            <input type="text" name="Puesto" id="Puesto" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label for="Area">Área</label>
                            <input type="text" name="Area" id="Area" class="form-control" value="">
                        </div>
                        
                        <dic class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" value="">
                            

                        <div class="form-group text-center">
                            <input type="submit" value="Agregar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
