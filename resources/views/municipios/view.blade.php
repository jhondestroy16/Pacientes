@extends('layouts.layout')

@section('titulo', 'Municipio')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Municipios</div>
                            <p class="card-category">Vista detallada de <b>{{ $municipio->nombre }} </b>
                            </p>
                        </div>
                        <!--body-->
                        <div class="card-body">
                            @if (session('exito'))
                                <div class="alert alert-success" role="success">
                                    {{ session('exito') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 my-3">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <p class="description">
                                                    <b>Municipio: </b> {{ $municipio->nombre }} <br>
                                                    <b>Departamento: </b> {{ $municipio->nombreDepartamento }} <br>
                                                </p>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="button-container">
                            <a href="{{ route('municipios.index') }}" class="btn btn-primary mt-3">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
