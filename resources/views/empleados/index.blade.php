<!DOCTYPE html>
<html lang="es">
@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    @if (Auth::check())
    <a href="{{ url('/empleados/create') }}">
        <button type="button" style="font-weight: bold; padding: 5px 15px; border: 1px solid #8abf7e; background-color: #21702e; color: white; border-radius: 4px; cursor: pointer;">
            Cargar nuevo empleado
        </button>
    </a>
@else
    <a href="{{ url('/login') }}">
        <button type="button" style="font-weight: bold; padding: 5px 15px; border: 1px solid #8abf7e; background-color: #21702e; color: white; border-radius: 4px; cursor: pointer;">
            Inicia sesión para cargar un nuevo empleado
        </button>
    </a>
@endif

        <form method="GET" action="{{ route('empleados.index') }}" class="mb-3">
            <div class="form-group">
                <label for="Area">Seleccionar Área</label>
                <select name="area" id="Area" class="form-control">
                    <option value="">Todas las areas</option>
                    @foreach ($areas as $area)
                    <option value="{{ $area->area }}" 
                        @if ($area->area == $seleccionArea)
                            selected
                        @endif>
                        {{ $area->area }}
                    </option>                    
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Área</th>
                    <th>Puesto</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/'.'/'.$empleado->foto) }}" alt="" width="100">
                        </td>          
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->area }}</td>
                        <td>{{ $empleado->puesto }}</td>
                        <td>
                            <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}" class="btn btn-primary">
                                Editar
                            </a>
                            <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection