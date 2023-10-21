@extends('layouts.admin')
@section('title','Gestion de categorias')
@section('styles')
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
                <a href="{{route('categories.create')}}" type="button" class="btn btn-info ">
                    <i class="fas fa-plus"></i> Nuevo
                </a>
            </div>
        </div>
       </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="products_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>                                   
                                    <td><a href="{{ route('categories.show',$category) }}">{{$category->name}}</a></td>
                                    <td>{{$category->description}}</td>
                                   
                                    <td style="width: 20%;">

                                        <form method="POST" action="{{route('categories.destroy',$category)}}" id="delete-item_{{$category->id}}">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-outline-info" href="{{route('categories.edit', $category)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="btn btn-outline-danger delete-confirm"
                                        type="submit"  title="Eliminar">
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
@section('scripts')
<script src="{{ asset('melody/js/data-table.js')}}"></script>
@endsection