<!-- Aqui estoy extendiendo la vista que se encuentra en view/theme/lte/layout.blade.php-->
@extends("theme.$theme.layout")
<!-- Aqui estoy colocando un titulo a la vista muy diferente a cuando estoy en la Rais del Proyecto-->
@section('titulo')
    Sistema Menús
@endsection
<!--Aqui estoy colocando el script de javascript para la cuestion de la validacion de los campos que estan en el formularios -->
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>

@endsection
<!-- Aqui estoy extendiendo la vista enuna seccion de la vista de view/theme/lte/layout.blade.php -->

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Seccion de Crear Menús </h3>
            </div>
        <form action="{{route('guardar-menu')}}" method="POST" id="form-general" class="form-horizontal">
                @csrf
                <div class="box-body ">
                    @include('admin.menu.form')
                 </div>
                 <div class="box-footer">
                     <div class="col-lg-3"></div>
                     <div class="col-lg-6">
                        @include('includes.boton-form-crear')
                     </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
