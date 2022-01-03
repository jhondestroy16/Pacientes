@extends('layouts.layout')

@section('titulo', 'Pacientes')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Pacientes</div>
                            <p class="card-category">Vista detallada de <b>{{ $paciente->primer_nombre }} </b>
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
                                                <h5 class="title mt-3"><strong>{{ $paciente->primer_nombre }}
                                                    </strong></h5>
                                                <p class="description">
                                                    <b>Primer nombre: </b> {{ $paciente->primer_nombre }} <br>
                                                    <b>Segundo nombre: </b> {{ $paciente->segundo_nombre }} <br>
                                                    <b>Primer apellido: </b> {{ $paciente->primer_apellido }} <br>
                                                    <b>Segundo apellido: </b> {{ $paciente->segundo_apellido }} <br>
                                                </p>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-3">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <p class="description">
                                                    <b>Tipo de documento: </b> {{ $paciente->nombreTipoDocumento }} <br>
                                                    <b>Numero de documento: </b> {{ $paciente->numero_documento }} <br>
                                                    <b>Genero: </b> {{ $paciente->nombreGenero }} <br>
                                                    <b>Departamento: </b> {{ $paciente->nombreDepartamento }} <br>
                                                    <b>Municipio: </b> {{ $paciente->nombreMunicipio }} <br>
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
                            <a href="{{ route('pacientes.index') }}" class="btn btn-primary mt-3">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
