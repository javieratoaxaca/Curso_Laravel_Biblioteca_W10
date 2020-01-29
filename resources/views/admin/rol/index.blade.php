<!-- Aqui estoy extendiendo la vista que se encuentra en view/theme/lte/layout.blade.php-->
@extends("theme.$theme.layout")
<!-- Aqui estoy colocando un titulo a la vista muy diferente a cuando estoy en la Rais del Proyecto-->
@section('titulo')
Roles
@endsection
@section("scripts")
<!-- <script src="//asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>-->
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
<!-- Aqui estoy extendiendo la vista en una seccion de la vista de view/theme/lte/layout.blade.php -->

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Roles</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('crear_rol')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i>Nuevo Registro
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                        <td>{{$data->nombre}}</td>
                            <td>
                                <!--Esto es atraves de la URL -->
                                <!--<a href="//url("admin/rol/$data->id/editar")}}" class="btn-accion-tabla tooltipsC" title="Editar este Registro"> -->
                                <!-- Esto es a traves de Route-->
                                <a href="{{route('editar_rol',['id'=> $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este Registro">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <!--Esto es atraves de la URL -->
                                <!--<form action="url("admin/rol/$data->id")}}" class="d-inline form-eliminar" method="POST"> -->
                                <!-- Esto es a traves de Route-->
                                <form action="{{route('eliminar_rol', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                        <i class="fa fa-fw fa-trash text-danger"></i>
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
@endsection
