@extends('layouts.admin')
@section('title','Gestión de compras')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
@endsection
@section('create')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <div class="card">
        <div class="d-flex justify-content-between">
            <h4 class="card-title"></h4>
            <div class="btn-group">
                <a href="{{route('purchases.create')}}" type="button" class="btn btn-info ">
                    <i class="fas fa-plus"></i> Nuevo
                </a>
            </div>
        </div>
    </div>      
    <h3 class="page-title">
        Compras
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
            <li class="breadcrumb-item active" aria-current="page">Compras</li>
        </ol>
    </nav>
</div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="purchases_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('purchases.show', $purchase)}}">{{$purchase->id}}</a>
                                    </th>
                                    <td>
                                        {{\Carbon\Carbon::parse($purchase->purchase_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$purchase->total}}</td>

                                    @if ($purchase->status == 'VALID')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{ route('change.status.purchases',$purchase) }}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{ route('change.status.purchases',$purchase) }}" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td style="width: 20%;">
                                        <a href="{{ route('purchases.pdf',$purchase) }}" class="btn btn-outline-danger"
                                        title="Generar PDF"
                                        ><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('purchases.show', $purchase)}}" class="btn btn-outline-info"
                                        title="Ver detalles"
                                        ><i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('scripts')
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#purchases_listing').DataTable({
            responsive: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            dom:
			"<'row'<'col-sm-2'l><'col-sm-7 text-right'B><'col-sm-3'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>", 
            buttons: [
                {
                    text: '<i class="fas fa-plus"></i> Nuevo',
                    className: 'btn btn-info',
                    action: function ( e, dt, node, conf ) {
                        window.location.href = "{{route('purchases.create')}}"
                    }
                }
            ]
        });
    });
</script>
@endsection --}}
