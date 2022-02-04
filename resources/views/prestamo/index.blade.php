
@extends ('layouts.normal')
@section ('content')
    <div class="colorfondo wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="colorfondo ibox-content">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="d-flex justify-content-between align-items-center">
                                     <h2>Prestamo</h2>  
                                     <a class="btn btn-success" href="{{route('prestamo.create')}}"> <span class="fa fa-plus">&nbsp;Nuevo
                                        </span> </a>        
                                                                         
                                </div>
                            </div>
                        </div>
                        <br>                       
                        @if(!empty($prestamo))
                        <div class="table-responsive">
                            <table id="cliente" class="table table-striped">
                                <thead class="colorletrathead">
                                    <tr>
                                        <th>Id</th>
                                        <th>Glosa</th>                   
                                        <th>Fecha</th>       
                                        <th>Proyecto</th>                                     
                                        <th class="text-center" width="100px"> Accion </th>                                    
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($prestamo as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id}}
                                        </td>
                                        <td>
                                            {{ $item->glosa}}
                                        </td>
                                        <td>
                                            {{ $item->fecha}}
                                        </td>
                                        <td>
                                            {{ $item->proyecto}}
                                        </td>                                         
                                        <td class="text-center">
                                            <a href="{{ route('prestamo.show', $item->id) }}" title="show">
                                                <i class="fa fa-eye text-success fa-lg"></i>
                                            </a>
                                        </td>                                     
                                    </tr>                                                                        
                                    @endforeach                            
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="alert alert-warning" role="alert">
                                No Existen Registros.
                            </div>     
                         </div>    
                        @endif
                    </div>
                 </div>
             </div>
        </div>
       
    </div>    
@endsection
