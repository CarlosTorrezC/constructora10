
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
                                     <h2>Produccion</h2>          
                                     <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal_create"> <span class="fa fa-plus">&nbsp;Nuevo
                                        </span> </button>                                         
                                </div>
                            </div>
                        </div>
                        <br>
                        @include('produccion.modalcreate')
                        @if(!empty($produccion))
                        <div class="table-responsive">
                            <table id="cliente" class="table table-striped">
                                <thead class="colorletrathead">
                                    <tr>
                                        <th>Id</th>
                                        <th>Proyecto</th>                   
                                        <th>Nombre</th>
                                        <th>Cantidad</th>                                        
                                        <th class="text-center" width="100px"> Accion </th>                                    
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($produccion as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id}}
                                        </td>
                                        <td>
                                            {{ $item->proyecto}}
                                        </td>
                                        <td>
                                            {{ $item->nombre}}
                                        </td>
                                        <td>
                                            {{ $item->cantidad}}
                                        </td>                                        
                                        <td class="text-center" width="100px">
                                            <form action="{{ route('produccion.destroy', $item->id) }}" method="POST">                           
                                                <a href="#" data-toggle="modal"
                                                            data-target="#modal_edit{{$item->id}}" title="edit">
                                                    <i class="fa fa-edit fa-lg" ></i>
                                                </a>
                                                @csrf
                                                {{ method_field('DELETE')}}
                                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                    <i class="fa fa-trash fa-lg text-danger"></i>
                                                </button>
                                            </form>           
                                        </td>
                                    </tr>     
                                    @include('produccion.modaledit')                                            
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
