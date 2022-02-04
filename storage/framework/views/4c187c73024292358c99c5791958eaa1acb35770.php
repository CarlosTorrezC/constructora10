<form method="POST" action="<?php echo e(route('proyecto.update',$item->id)); ?>" role="form" autocomplete="off">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?> 
    <div class="modal fade" id="modal_edit<?php echo e($item->id); ?>">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="colorfondo modal-content">
                <!--header-->
                <div class="modal-header">
                    <h2 class="modal-title">Proyecto</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!--body-->
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" required id="nombre" name="nombre" placeholder="nombre"
                                     class="form-control" value="<?php echo e($item->nombre); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" required id="descripcion" name="descripcion" placeholder="descripcion"
                                     class="form-control" value="<?php echo e($item->descripcion); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="stock">Costo</label>
                            <input type="text" required id="costo" name="costo" placeholder="costo"
                                     class="form-control" value="<?php echo e($item->costo); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="idempleado">Encargado</label>
                            <select  name="idempleado" placeholder="idempleado"
                                    class="form-control m-b">  
                                    <option value="-1" disabled selected> Seleccionar Encargados </option> 
                                <?php $__currentLoopData = $empleado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                                    <option value="<?php echo e($emp->id); ?>" <?php echo e($item->idempleado==$emp->id ? 'selected': ''); ?>> <?php echo e($emp->nombre. " ". $emp->apellido); ?>  </option>  
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
</form><?php /**PATH C:\datos\proylaravel\constructora\resources\views/proyecto/modaledit.blade.php ENDPATH**/ ?>