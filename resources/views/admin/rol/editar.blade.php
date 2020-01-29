<!-- Aqui estoy extendiendo la vista que se encuentra en view/theme/lte/layout.blade.php-->
@extends("theme.$theme.layout")
<!-- Aqui estoy colocando un titulo a la vista muy diferente a cuando estoy en la Rais del Proyecto-->
@section('titulo')
Roles
@endsection
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
                <h3 class="box-title">Editar Rol</h3>
                <div class="box-tools pull-right">
                <a href="{{route('rol')}}" class="btn btn-block btn-info btn-sm">
                    <i class="fa fa-fw fa-reply-all"></i>Volver al Listado
                </a>
                </div>
            </div>

            <form action="{{route('actualizar_rol',['id'=>$data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf @method("put")
                <div class="box-body">
                @include('admin.rol.form')
                </div>
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                       @include('includes.boton-form-editar')
                    </div>
               </div>
            </form>
        </div>
    </div>
</div>
@endsection
