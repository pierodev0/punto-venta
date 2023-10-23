@extends('layouts.admin')
@section('title', 'Editar productos')
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
                Edicion de productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edicion de Products</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data"
                            novalidate>
                            <x-errors />
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-8 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}"
                                                    aria-describedby="helpId" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="code">Código de barras</label>
                                                        <input type="text" name="code" id="code"
                                                            class="form-control">
                                                        <small id="helpId" class="text-muted">Campo opcional</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sell_price">Precio de venta</label>
                                                        <input type="number" name="sell_price" id="sell_price" 
                                                            class="form-control" value="{{ $product->sell_price }}" aria-describedby="helpId" required>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="form-group">
                                          <label for="short_description">Extracto</label>
                                          <textarea class="form-control" name="short_description" id="short_description"
                                              rows="3"></textarea>
                                      </div> --}}
                                            {{--                   
                                      <div class="form-group">
                                          <label for="long_description">Descripción</label>
                                          <textarea class="form-control" name="long_description" id="long_description"
                                              rows="10"></textarea>
                                      </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="category">Categoría</label>
                                                <select class="select2" id="category" style="width: 100%"
                                                    name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option {{ ($category->id == $product->category_id) ? 'selected': '' }} value="{{ $category->id }}">{{ $category->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- <div class="form-group">
                                          <label for="subcategory_id">Subcategoría</label>
                                          <select class="select2" name="subcategory_id" id="subcategory_id" style="width: 100%">
                                              @foreach ($categories as $category)
                                              <option value="{{$category->id}}">{{$category->name}}</option>
                                              @endforeach
                                          </select>
                                      </div> --}}

                                            <div class="form-group">
                                                <label for="provider_id">Proveedor</label>
                                                <select class="select2" name="provider_id" id="provider_id"
                                                    style="width: 100%">
                                                    @foreach ($providers as $provider)
                                                        <option {{ ($provider->id == $product->provider_id) ? 'selected': '' }} value="{{ $provider->id }}">{{ $provider->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tags">Etiquetas</label>
                                                <select class="select2" name="tags[]" id="tags" style="width: 100%"
                                                    multiple>
                                                    {{-- @foreach ($tags as $tag)
                                              <option value="{{$tag->id}}">{{$tag->name}}</option>
                                              @endforeach --}}

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Imágenes del producto</h4>
                                            <input type="file" name="image" />
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary mr-2">Editar</button>
                            <a href="{{ route('products.index') }}" class="btn btn-light">
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
