
 <!-- modal Envelope-->
 <form method="POST" action="<?php echo e(route('herramienta.store')); ?>" role="form" autocomplete="off">
    <?php echo csrf_field(); ?>
    <?php echo method_field('POST'); ?> 
    <div class="modal fade" id="modal_create">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="colorfondo modal-content">
                <!--header-->
                <div class="modal-header">
                    <h2 class="modal-title">Herramienta</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>           
                <!--body-->
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" id="nombre" type="text" class="form-control" required></input>                          
                        </div>
                    </div>   
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="descripcion">Descripcion</label>
                            <input name="descripcion" id="descripcion" type="text" class="form-control" required></input>                          
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
<!-- modal--><?php /**PATH C:\datos\proylaravel\constructora\resources\views/herramienta/modalcreate.blade.php ENDPATH**/ ?>