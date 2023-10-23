@extends('layouts.admin')
@section('title', 'Gestión de productos')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <a href="{{route('products.create')}}" type="button" class="btn btn-info ">
                            <i class="fas fa-plus"></i> Nuevo
                        </a>
                    </div>
                </div>
               </div>           
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
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
                                        <th>Stock</th>
                                        <th>Precio de venta</th>
                                        <th>Estado</th>
                                        <th>Categoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $product->id }}</th>
                                            <td>
                                                {{-- <a target="_blank" title="Vista previa" href="{{route('web.product_details',$product)}}">{{$product->name}}</a> --}}
                                                <a href="{{ route('products.show',$product) }}">{{ $product->name }}</a>
                                            </td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->sell_price }}</td>
                                            <td class="second_td">
                                                <a href="#" id="username" class="editable" data-type="select"
                                                    data-pk="{{ $product->id }}"
                                                    data-url="{{ url("/update_product_status/$product->id") }}"
                                                    data-title="Estado" data-value="{{ $product->status }}">
                                                    {{ $product->status }}
                                                </a>
                                            </td>

                                            <td>
                                                {{ isset($product->category->name) ? $product->category->name : '' }}
                                            </td>
                                            <td style="width: 20%;">

                                                <form method="POST" action="{{ route('products.destroy', $product) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a class="btn btn-outline-info"
                                                        href="{{ route('products.edit', $product) }}" title="Editar">
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
@section('scripts')
@endsection
