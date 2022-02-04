<form method="POST" action="{{route('dotacion.update',$item->id)}}" role="form" autocomplete="off">
    @csrf
    @method('PUT') 
    <div class="modal fade" id="modal_edit{{$item->id}}">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="colorfondo modal-content">
                <!--header-->
                <div class="modal-header">
                    <h2 class="modal-title">Dotacion</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!--body-->
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" required id="nombre" name="nombre" placeholder="nombre"
                                     class="form-control" value="{{$item->nombre}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" required id="descripcion" name="descripcion" placeholder="descripcion"
                                     class="form-control" value="{{$item->descripcion}}">
                        </div>
                    </div>                   
                </div>
                <!--footer-->
                <div class="modal-footer">
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">                        
                            <button class="btn btn-success btn-xl" type="submit"><span class="fa fa-edit"> Editar</span> 
                            </button>
                        </div>
                    </div>
                </div>                                         
            </div>
        </div>
    </div>
</form>