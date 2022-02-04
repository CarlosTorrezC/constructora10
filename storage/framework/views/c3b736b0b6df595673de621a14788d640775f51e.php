

<?php $__env->startSection('content'); ?>
    <div class="colorfondo wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="colorfondo ibox-content">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="d-flex justify-content-between align-items-center">
                                     <h2>Prestamo</h2>  
                                     <a class="btn btn-success" href="<?php echo e(route('prestamo.create')); ?>"> <span class="fa fa-plus">&nbsp;Nuevo
                                        </span> </a>        
                                                                         
                                </div>
                            </div>
                        </div>
                        <br>                       
                        <?php if(!empty($prestamo)): ?>
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
                                    <?php $__currentLoopData = $prestamo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($item->id); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->glosa); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->fecha); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->proyecto); ?>

                                        </td>                                         
                                        <td class="text-center">
                                            <a href="<?php echo e(route('prestamo.show', $item->id)); ?>" title="show">
                                                <i class="fa fa-eye text-success fa-lg"></i>
                                            </a>
                                        </td>                                     
                                    </tr>                                                                        
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

<?php echo $__env->make('layouts.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\datos\proylaravel\constructora\resources\views/prestamo/index.blade.php ENDPATH**/ ?>