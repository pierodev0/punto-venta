@extends('layouts.admin')
@section('title','Registrar proveedores')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('providers.store') }}" method="POST">
                        @csrf                     
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                          <label for="email">Correo Electronico</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@gmail.com" required>
                        </div>
                        <div class="form-group">
                          <label for="ruc_number">Numero de RUC</label>
                          <input type="number" min="1000000000" class="form-control" name="ruc_number" id="ruc_number" required>
                        </div>
                        <div class="form-group">
                          <label for="address">Direccion</label>
                          <input type="text" class="form-control" name="address" id="address" required>
                        </div>
                        <div class="form-group">
                          <label for="phone">Numero de Contacto</label>
                          <input type="tel" class="form-control" name="phone" id="phone" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('providers.index')}}" class="btn btn-light">
                        Cancelar
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
