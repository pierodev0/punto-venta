@extends('layouts.admin')
@section('title','Registrar categoría')
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
            Registro de categorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de categorías</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf                     
                        @include('admin.category._form')
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('categories.index')}}" class="btn btn-light">
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
<script>
    function showInp(){
        getSelectValue = document.getElementById("type").value;
        if(getSelectValue=="PRODUCT"){
          document.getElementById("icon_div").style.display = "inline";
          document.getElementById("parent_div").style.display = "inline";
        }else if(getSelectValue=="POST"){
          document.getElementById("icon_div").style.display = "none";
          document.getElementById("parent_div").style.display = "none";
        }
      }
</script>
<script>
    $(document).ready(function () {
        document.getElementById("parent_div").style.display = "none";
        document.getElementById("icon_div").style.display = "none";
        
        $(document).on('change', '#parent_id', function(event) {
            parent_text = $("#parent_id option:selected").text();
            if(parent_text == '-- Ninguna --'){
                document.getElementById("icon_div").style.display = "inline";
            }else{
                document.getElementById("icon_div").style.display = "none";
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#parent_id').select2();
        $('#icon').select2();
    });
</script>
@endsection
