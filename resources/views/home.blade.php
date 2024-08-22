@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(Auth::user()->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Has iniciado sesión correctamente!') }}

                    <div class="mt-3">
                        <a href="{{ url('/empleados/index') }}">
                            <button type="button" style="font-weight: bold; padding: 5px 15px; border: 1px solid #8abf7e; background-color: #21702e; color: white; border-radius: 4px; cursor: pointer;">
                                Volver a la página principal
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

