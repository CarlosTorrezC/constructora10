<form method="POST" action="<?php echo e(route('material.update',$item->id)); ?>" role="form" autocomplete="off">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?> 
    <div class="modal fade" id="modal_edit<?php echo e($item->id); ?>">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="colorfondo modal-content">
                <!--header-->
                <div class="modal-header">
                    <h2 class="modal-title">Material</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!--body-->
                <div class="modal-body">
                <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" id="nombre" type="text" class="form-control" value="<?php echo e($item->nombre); ?>" required></input>                          
                        </div>
                    </div>   
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="descripcion">Descripcion</label>
                            <input name="descripcion" id="descripcion" type="text" class="form-control" value="<?php echo e($item->descripcion); ?>" required></input>                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="idmedida">Medida</label>
                            <select class="tag form-control" id="idmedida" name="idmedida">                         
                                <?php $__currentLoopData = $medida; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($unid->id); ?>" <?php echo e($item->idmedida==$unid->id ? 'selected': ''); ?>> <?php echo e($unid->nombre); ?> </option>                                      
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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
</form><?php /**PATH C:\datos\proylaravel\constructora\resources\views/material/modaledit.blade.php ENDPATH**/ ?>