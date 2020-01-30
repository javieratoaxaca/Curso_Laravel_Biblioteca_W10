<!-- Aqui estoy extendiendo la vista que se encuentra en view/theme/lte/layout.blade.php-->
@extends("theme.$theme.layout")
<!-- Aqui estoy colocando un titulo a la vista muy diferente a cuando estoy en la Rais del Proyecto-->
@section('titulo')
 Administrador
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">Bienvenidos</div>
</div>
@endsection
