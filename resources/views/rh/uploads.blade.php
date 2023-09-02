@extends('layouts.app')

@section('content')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Historial de asignaciones</div>

                <div class="card-body">
                    <a href="{{ asset('docs/Layout_Ordenamiento_Admisión.xlsx') }}" class="btn btn-outline-success"><i class="bi bi-file-earmark-spreadsheet"></i>&nbsp;Descargar layout</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCargaAsignados"><i class="bi bi-file-earmark-plus"></i>&nbsp;Cargar listado de asignaciones</button>
                    <table class="table table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Proceso</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha de carga</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>
                                    <button type="button" class="btn btn-secondary">
                                        <i class="bi bi-eye"></i>&nbsp;
                                        Ver asignados
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>
                                    <button type="button" class="btn btn-secondary">
                                        <i class="bi bi-eye"></i>&nbsp;
                                        Ver asignados
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <!-- Modal -->
            <div class="modal fade" id="modalCargaAsignados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cargar listado de asignaciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Subir layout</label>
                            <input class="form-control" type="file" id="formFile" accept=".xlsx">
                        </div>
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>- Seleccione-</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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
                            <label for="floatingTextarea">Descripción breve del archivo</label>
                        </div> 
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-arrow-bar-up"></i>&nbsp;
                        Cargar layout
                    </button>
                    </div>
                </div>
            </div>     
@endsection