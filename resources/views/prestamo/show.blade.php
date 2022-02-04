@extends('layouts.normal')

@section('content')

 <!-- corte-->
 <div class="colorfondo wrapper wrapper-content">
 <div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="colorfondo ibox-content">
            <div class="row">
        <div class="col-lg-12 ">
            <ol class="breadcrumb">
                        <li class="breadcrumb-item ">
                            <a href="{{route('prestamo.index')}}">Inicio</a>
                        </li>     
                        <li class="breadcrumb-item active">
                            <b>Ver</b>
                        </li>                                           
                    </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 ">
            <div class="d-flex justify-content-between align-items-center">
                <h2> Prestamo : {{ $prestamo[0]->id }}</h2>               
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <b>Glosa:</b>
                {{ $prestamo[0]->glosa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <b>Fecha:</b>
                {{ $prestamo[0]->fecha }}
            </div>
        </div>       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <b>Proyecto:</b>
                {{ $prestamo[0]->proyecto }}
            </div>
        </div>     
        
        <div class="hr-line-dashed"></div>
        @if(!empty($detalle))
            <div class="col-xs-8 col-sm-8 col-md-8">
            <table class="table table-responsive-lg">
                <thead class="colorletrathead">
                    <tr>
                        <th> Herramienta</th>                        
                        <th> Cantidad </th>                                   
                    </tr>
                </thead>
                <tbody>
            @foreach($detalle as $item)
                <tr>  
                  <td> {{$item->herramienta}} </td>  
                  <td> {{$item->cantidad}} </td>                
                </tr>
            @endforeach
                </tbody>
            </table>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">               
                    <span> <i> Registrado por {{ $prestamo[0]->usuario }} en fecha {{ $prestamo[0]->created_at }} <i></span>
                </div>     
            </div>
        @else
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="alert alert-warning" role="alert">
                        Sin Registros.
                </div>     
            </div>      
        @endif


        
    </div>

    </div>
        </div>
    </div>
</div>


@endsection