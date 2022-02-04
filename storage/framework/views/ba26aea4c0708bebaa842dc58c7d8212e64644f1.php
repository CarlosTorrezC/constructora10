


<?php $__env->startSection('content'); ?>
    <div class="colorfondo wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class= "colorfondo ibox-content">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="d-flex justify-content-between align-items-center">
                                     <h2>Usuario</h2>          
                                     <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal_create"> <span class="fa fa-plus">&nbsp;Nuevo
                                        </span> </button>                                         
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php echo $__env->make('usuario.modalcreate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(!empty($usuario)): ?>
                        <div class="table-responsive">
                            <table id="cliente" class="table table-striped">
                                <thead class="colorletrathead">
                                    <tr>
                                        <th>Id</th>
                                        <th>Email</th>                   
                                        <th>Rol</th>
                                          
                                        <th class="text-center" width="100px"> Accion </th>                                    
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($item->id); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->email); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->rol); ?>

                                        </td>
                                       
                                        <td class="text-center" width="100px">
                                            <form action="<?php echo e(route('usuario.destroy', $item->id)); ?>" method="POST">                           
                                                <a href="#" data-toggle="modal"
                                                            data-target="#modal_edit<?php echo e($item->id); ?>" title="edit">
                                                    <i class="fa fa-edit fa-lg" ></i>
                                                </a>
                                                <?php echo csrf_field(); ?>
                                                <?php echo e(method_field('DELETE')); ?>

                                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                    <i class="fa fa-trash fa-lg text-danger"></i>
                                                </button>
                                            </form>           
                                        </td>
                                    </tr>     
                                    <?php echo $__env->make('usuario.modaledit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                                            
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="alert alert-warning" role="alert">
                                No Existen Registros.
                            </div>     
                         </div>    
                        <?php endif; ?>
                    </div>
                 </div>
             </div>
        </div>       
    </div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xammp\htdocs\constructora10\resources\views/usuario/index.blade.php ENDPATH**/ ?>