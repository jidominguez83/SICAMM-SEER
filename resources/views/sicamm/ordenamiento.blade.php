@extends('layouts.app')

@section('content')

<?php $num_participantes = count($participantes); ?>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Lista de ordenamiento de {{ $proceso->nombre }}
                </div>
                <div class="card-body">
                    <a href="{{ asset('docs/Layout_Ordenamiento_Admisión.xlsx') }}" class="btn btn-outline-success"><i class="bi bi-file-earmark-spreadsheet"></i>&nbsp;Descargar layout</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCargaOrdenamiento"><i class="bi bi-file-earmark-plus"></i>&nbsp;Cargar listado de ordenamiento</button>
                    <div class="form-floating mt-3">
                        <select class="form-select" id="select_ciclo" aria-label="Ciclo escolar">
                            <option value="0" @if ($ciclo_id==0) {{ "selected" }} @endif>- Seleccione el ciclo escolar -</option>
                            @foreach($ciclos as $ciclo)
                            <option value="{{ $ciclo->id }}" @if ($ciclo_id==$ciclo->id) {{ "selected" }} @endif>{{ $ciclo->ciclo }}</option>
                            @endforeach
                        </select>
                        <label for="select_ciclo">Ciclo escolar</label>
                    </div>

                    <form name="valoracion_id" id="form_valoracion_id" method="GET" action="#">
                        @csrf
                        <div class="form-floating mt-3">
                            <select class="form-select" id="select_valoracion_id" aria-label="Tipo de valoración">
                                <option value="0" @if ($valoracion_id==0) {{ "selected" }} @endif>- Seleccione el tipo de valoración -</option>
                                @foreach ($valoraciones as $valoracion)
                                <option value="{{ $valoracion->id }}" @if ($valoracion_id==$valoracion->id) {{ "selected" }} @endif>
                                    {{ $valoracion->nombre }}
                                </option>
                                @endforeach
                            </select>
                            <label for="select_valoracion_id">Tipo de valoración</label>
                        </div>
                        <input type="hidden" value="{{ $proceso->id }}" name="select_proceso_id" id="select_proceso_id">
                    </form>

                    <table class="table table-striped table-hover mt-3">
                        @if (isset($participantes) && $num_participantes > 0)
                        <thead>
                            <tr>
                                <th scope="col">CURP</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">#</th>
                                <th scope="col">Puntaje global</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        @endif
        
                        <tbody>
                            @foreach ($participantes as $participante)
                            <tr>
                                <th scope="row">{{ $participante->curp }}</th>
                                <td>{{ $participante->nombre." ".$participante->apellido_paterno."
                                    ".$participante->apellido_materno }}</td>
                                <td>{{ $participante->posicion }}</td>
                                <td>{{ $participante->p_global }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="{{-- route('participantes.detail-proceso',['participacion_id'=>$participante->participacion_id]) --}}"
                                            class="btn btn-success btn-sm"><i class="bi bi-eye-fill" title="Ver detalle"></i>
                                        </a>
                                        <a href="{{-- route('participantes.details',['participante_id'=>$participante->participante_id]) --}}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-person-fill" title="Ver datos completos del participante"></i>
                                        </a>
                                        <a href="{{-- route('participantes.incidencias',['participante_id'=>$participante->participante_id,'participacion_id'=>$participante->participacion_id]) --}}"
                                            class="btn btn-secondary btn-sm"><i class="bi bi-exclamation-circle-fill" title="Incidencias"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    {{ $participantes->links('pagination::bootstrap-5') }}
                    
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalCargaOrdenamiento" tabindex="-1" aria-labelledby="modalCargaOrdenamientoLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCargaOrdenamientoLabel">Cargar listado de ordenamiento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('cargar-ordenamiento') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Subir layout</label>
                                <input class="form-control" type="file" id="file_ordenamiento" name="file_ordenamiento" accept=".xlsx">
                            </div>
                        </div>

                        <input type="hidden" name="proceso_id" id="proceso_id" value="{{ $proceso->id }}">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-arrow-bar-up"></i>&nbsp;
                                Cargar layout
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
@endsection