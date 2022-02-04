

<?php $__env->startSection('content'); ?>

 <!-- corte-->
 <div class="colorfondo wrapper wrapper-content">
 <div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="colorfondo ibox-content">
            <div class="row">
        <div class="col-lg-12 ">
            <ol class="breadcrumb">
                        <li class="breadcrumb-item ">
                            <a href="<?php echo e(route('ingreso.index')); ?>">Inicio</a>
                        </li>     
                        <li class="breadcrumb-item active">
                            <b>Ver</b>
                        </li>                                           
                    </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 ">
            <div class="d-flex justify-content-between align-items-center">
                <h2> Ingreso : <?php echo e($ingreso[0]->id); ?></h2>               
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <b>Glosa:</b>
                <?php echo e($ingreso[0]->glosa); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <b>Fecha:</b>
                <?php echo e($ingreso[0]->fecha); ?>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <b>Total:</b>
                <?php echo e($ingreso[0]->total); ?>

            </div>
        </div>
        
        <div class="hr-line-dashed"></div>
        <?php if(!empty($detalle)): ?>
            <div class="col-xs-8 col-sm-8 col-md-8">
            <table class="table table-responsive-lg">
                <thead class="colorletrathead">
                    <tr>
                        <th> Tipo</th> 
                        <th> Ingreso </th>   
                        <th> Cantidad </th>             
                        <th> Costo </th>
                        <th> Total </th>
                    </tr>
                </thead>
                <tbody>
            <?php $__currentLoopData = $detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr> 
                  <td> <?php echo e($item->tipo); ?> </td>  
                  <td> <?php echo e($item->ingreso); ?> </td>  
                  <td> <?php echo e($item->cantidad); ?> </td> 
                  <td> <?php echo e($item->costo); ?> </td> 
                  <td> <?php echo e($item->total); ?> </td> 
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">               
                    <span> <i> Registrado por <?php echo e($ingreso[0]->usuario); ?> en fecha <?php echo e($ingreso[0]->created_at); ?> <i></span>
                </div>     
            </div>
        <?php else: ?>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="alert alert-warning" role="alert">
                        Sin Registros.
                </div>     
            </div>      
        <?php endif; ?>        
    </div>

    </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\datos\proylaravel\constructora\resources\views/ingreso/show.blade.php ENDPATH**/ ?>