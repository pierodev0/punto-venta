@extends('layouts.admin')
@section('title','Registro de compra')
@section('styles')
{{-- {!! Html::style('select/dist/css/bootstrap-select.min.css') !!} --}}
<link rel="stylesheet" href="{{ asset('select/dist/css/bootstrap-select.min.css') }}">
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de compra</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <form action="{{ route('purchases.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @include('admin.purchase._form')
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{ URL::previous() }}" class="btn btn-light">
                        Cancelar
                    </a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
 @section('scripts')
{{-- <script src="{{ asset('melody/js/alerts.js') }}"></script>
<script src="{{ asset('melody/js/avgrund.js') }}"></script>

<script src="{{ asset('select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script> --}}

{{-- <script src="{{ asset('js/purchase.js') }}"></script> --}}
<script>
    $(document).ready(function () {
  $("#agregar").click(function () {
      agregar();
  });
});

var cont = 0;
total = 0;
subtotal = [];

$("#guardar").hide();


var product_id1 = $('#product_id1');
$(document).on('keyup', '#code', function(){
  var valorResultado = $(this).val();
  if(valorResultado!=""){
      obtener_registro(valorResultado);
  }else{
      obtener_registro();
  }
})


function agregar() {

  product_id = $("#product_id1").val();
  producto = $("#product_id1 option:selected").text();
  quantity = $("#quantity").val();
  price = $("#price").val();
  impuesto = $("#tax").val();

  if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
      subtotal[cont] = quantity * price;
      total = total + subtotal[cont];
      var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled> </td> <td align="right">s/' + subtotal[cont] + ' </td></tr>';
      cont++;
      limpiar();
      totales();
      evaluar();
      $('#detalles').append(fila);
  } else {
      Swal.fire({
          type: 'error',
          text: 'Rellene todos los campos del detalle de la compras',

      })
  }
}

function limpiar() {
  $("#quantity").val("");
  $("#price").val("");
}

function totales() {
  $("#total").html("PEN " + total.toFixed(2));
  total_impuesto = total * impuesto / 100;
  total_pagar = total + total_impuesto;
  $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2));
  $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2));
  $("#total_pagar").val(total_pagar.toFixed(2));
}

function evaluar() {
  if (total > 0) {
      $("#guardar").show();
  } else {
      $("#guardar").hide();
  }
}

function eliminar(index) {
  total = total - subtotal[index];
  total_impuesto = total * impuesto / 100;
  total_pagar_html = total + total_impuesto;
  $("#total").html("PEN" + total);
  $("#total_impuesto").html("PEN" + total_impuesto);
  $("#total_pagar_html").html("PEN" + total_pagar_html);
  $("#total_pagar").val(total_pagar_html.toFixed(2));
  $("#fila" + index).remove();
  evaluar();
}
</script>

@endsection 
