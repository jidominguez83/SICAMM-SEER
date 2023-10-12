@extends('layouts.app')

@section('content')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Historial de asignaciones</div>

                <div class="card-body">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCargaAsignados"><i class="bi bi-plus-square"></i>&nbsp;Agregar asignaciones</button>

                    @if(count($asignaciones) > 0)
                        <table class="table table-striped table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Proceso</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Fecha de carga</th>
                                    <th scope="col">No. asignados</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>5</td>
                                    <td>
                                        <a href="{{ route('rh.asignados', ['asignacion_id' => 1]) }}" class="btn btn-secondary">
                                            <i class="bi bi-eye"></i>&nbsp;
                                            Ver asignados
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>8</td>
                                    <td>
                                        <a href="{{ route('rh.asignados', ['asignacion_id' => 2]) }}" class="btn btn-secondary">
                                            <i class="bi bi-eye"></i>&nbsp;
                                            Ver asignados
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

            <!-- Modal -->
            <div class="modal fade" id="modalCargaAsignados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear grupo de asignaciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option>- Seleccione-</option>
                                @foreach ($procesos as $proceso)
                                <option value="{{ $proceso->id }}" >
                                    {{ $proceso->nombre }}
                                </option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Proceso</label>
                        </div>
                        <div class="form-floating mt-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>- Seleccione -</option>
                                <option value="1">Temporal</option>
                                <option value="2">Definitiva</option>
                            </select>
                            <label for="floatingSelect">Tipo de contratación</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="number" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="test@example.com">
                            <label for="floatingInputValue">No. de oficio de Oficialía Mayor</label>
                        </div> 
                        <div class="form-floating mt-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Descripción</label>
                        </div> 
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-floppy"></i>&nbsp;
                        Guardar
                    </button>
                    </div>
                </div>
            </div>     
@endsection