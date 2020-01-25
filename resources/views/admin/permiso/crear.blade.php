<!-- Aqui estoy extendiendo la vista que se encuentra en view/theme/lte/layout.blade.php-->
@extends("theme.$theme.layout")
<!-- Aqui estoy colocando un titulo a la vista muy diferente a cuando estoy en la Rais del Proyecto-->
@section('titulo')
    Permisos
@endsection
<!-- Aqui estoy extendiendo la vista enuna seccion de la vista de view/theme/lte/layout.blade.php -->

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Seccion de Crear Permisos </h3>
            </div>

            <div class="box-body ">

            </div>
        </div>
    </div>
</div>
@endsection
