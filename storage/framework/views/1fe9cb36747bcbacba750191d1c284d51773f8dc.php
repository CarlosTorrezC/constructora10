
 <!-- modal Envelope-->
 <form method="POST" action="<?php echo e(route('usuario.store')); ?>" role="form" autocomplete="off">
    <?php echo csrf_field(); ?>
    <?php echo method_field('POST'); ?> 
    <div class="modal fade" id="modal_create">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="colorfondo modal-content">
                <!--header-->
                <div class="modal-header">
                    <h2 class="modal-title">Usuario</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>           
                <!--body-->
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="text" class="form-control" required></input>                          
                        </div>
                    </div>        
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="password" class="form-control" required></input>                          
                        </div>
                    </div>  
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="idrol">Rol</label>               
                            <select name="idrol" id="idrol"  class="form-control" required>>
                                <option value="1"> Cliente </option>
                                <option value="2"> Administrador </option>
                            </select>                       
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
<!-- modal--><?php /**PATH D:\Xammp\htdocs\constructora10\resources\views/usuario/modalcreate.blade.php ENDPATH**/ ?>