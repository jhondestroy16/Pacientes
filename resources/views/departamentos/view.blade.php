@extends('layouts.layout')

@section('titulo', 'Departamentos')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Departamentos</div>
                        <p class="card-category">Vista detallada del departamento del <b>{{ $departamento->nombre }}
                        </p>
                    </div>
                    <!--body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 my-3">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                            <h5 class="title mx-3 text-center"><b>Departamento</b></h5>
                                            <p class="description text-center">
                                                <b>Nombre del departamento: </b> {{ $departamento->nombre }} <br>
                                            </p>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end card user-->

                            <div class="col-md-5 my-3">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="author">
                                            <h5 class="title mx-3 text-center"><b>municipios</b></h5>
                                            <p class="description">
                                                @foreach ($municipios as $municipio)
                                                    <tr>
                                                        <td> <b>Nombre municipio: </b> {{ $municipio->nombre }} <br> </td>
                                                    </tr>
                                                @endforeach
                                            </p>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end card user 2-->

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <a href="{{ route('departamentos.index') }}" class="btn btn-primary mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
