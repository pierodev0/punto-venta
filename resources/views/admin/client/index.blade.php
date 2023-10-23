@extends('layouts.admin')
@section('title','Gestión de clientes')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
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
                    <a href="{{route('clients.create')}}" type="button" class="btn btn-info ">
                        <i class="fas fa-plus"></i> Nuevo
                    </a>
                </div>
            </div>
        </div>      
        <h3 class="page-title">
            Clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="clients_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Teléfono / Celular</th>
                                    <th>Correo electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td>
                                        <a href="{{route('clients.show',$client)}}">{{$client->name}}</a>
                                    </td>
                                    <td>{{$client->dni}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->email}}</td>
                                    <td style="width: 20%;">

                                      <form method="POST" action="{{ route('clients.destroy', $client) }}">
                                          @csrf
                                          @method('DELETE')

                                          <a class="btn btn-outline-info"
                                              href="{{ route('clients.edit', $client) }}" title="Editar">
                                              <i class="far fa-edit"></i>
                                          </a>

                                          <button class="btn btn-outline-danger delete-confirm" type="submit"
                                              title="Eliminar">
                                              <i class="far fa-trash-alt"></i>
                                          </button>

                                      </form>
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
