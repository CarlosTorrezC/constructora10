
 <!-- modal Envelope-->
 <form method="POST" action="{{route('produccion.store')}}" role="form" autocomplete="off">
    @csrf
    @method('POST') 
    <div class="modal fade" id="modal_create">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="colorfondo modal-content">
                <!--header-->
                <div class="modal-header">
                    <h2 class="modal-title">Produccion</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>           
                <!--body-->
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="idproyecto">Proyecto</label>
                            <select class="tag form-control" id="idproyecto" name="idproyecto">                         
                                @foreach($proyecto as $item)
                                    <option value="{{$item->id}}" > {{$item->nombre}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>   
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" id="nombre" type="text" class="form-control" required></input>                          
                        </div>
                    </div>        
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="cantidad">Cantidad</label>
                            <input name="cantidad" id="descripcion" type="number" class="form-control" required></input>                          
                        </div>
                    </div>                                                                                                
                </div>
                <!--footer-->
                <div class="modal-footer">
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">                        
                            <button class="btn btn-success btn-sm" type="submit"><span class="fa fa-save"> Guardar</span> 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- modal-->