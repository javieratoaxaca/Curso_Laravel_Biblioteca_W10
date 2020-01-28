<!-- Aqui estoy extendiendo la vista que se encuentra en view/theme/lte/layout.blade.php-->
@extends("theme.$theme.layout")
<!-- Aqui estoy colocando un titulo a la vista muy diferente a cuando estoy en la Rais del Proyecto-->
@section('titulo')
 Menu
@endsection
<!--Aqui estoy colocando el script de css para el movimiento de los menus -->
@section("styles")
<link href="{{asset("assets/js/jquery_nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css"></script>
@endsection
<!--Aqui estoy colocando el script de javascript para el movimiento de los menus -->
@section("scriptsPlugins")
<script src="{{asset("assets/js/jquery_nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection
<!--Aqui estoy colocando el script de javascript para la cuestion de la validacion de los campos que estan en el formularios -->
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>
@endsection
<!-- Aqui estoy extendiendo la vista enuna seccion de la vista de view/theme/lte/layout.blade.php -->

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Menús</h3>
            </div>
            <div class="box-body">
                @csrf
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($menus as $key => $item)
                            @if ($item["menu_id"] != 0)
                                @break
                            @endif
                            @include("admin.menu.menu-item",["item" => $item])
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
