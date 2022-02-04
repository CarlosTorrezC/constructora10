
<?php $__env->startSection('content'); ?>                                                                                                                        
<div class="colorfondo wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="colorfondo ibox-content">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="d-flex justify-content-between align-items-center">
                                     <h2>Configuracion</h2>          
                                                      
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <span> Temas </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <img id="temainfantil" width="100" height="100" src="<?php echo e(asset('img/tema1.jpg')); ?>">

                                </img>
                            </div>
                            <div class="col-sm-4 text-center">
                                <img id="temajuvenil" width="100" height="100" src="<?php echo e(asset('img/tema2.jpg')); ?>">

                                </img>
                            </div>
                            <div class="col-sm-4 text-center">
                                <img id="temaadulto" width="100" height="100" src="<?php echo e(asset('img/tema3.jpg')); ?>">

                                </img>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>                                         
                        <div class="row">
                            <div class="col-sm-12">
                                <span> Dia/Noche </span>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-12 text-center">
                                <img id="temadn" width="100" height="100">

                                </img>
                            </div>                           
                        </div>   
                        <!-- <div class="row">                    
                        <div class="card-body">
                            <div class="col-sm-12 padding-0 chico">
                                <input type="radio" name="tamano" value="1">
                                    Small
                            </div>
                            <div class="col-sm-12 padding-0 mediano">
                                <input type="radio" name="tamano" value="2">
                                    
                                    Medium
                            </div>
                            <div class="col-sm-12 padding-0 grande">
                                <input type="radio" name="tamano" value="3">
                                   
                                    Large
                            </div>
                        </div>
                        </div>
                        <div class="hr-line-dashed"></div>    -->
                    </div>
                 </div>
             </div>
        </div>                      
    </div>   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    function themeMode2(){
        if(localStorage.getItem("theme") !== null)
        {
            var source;
            if(localStorage.getItem("theme") === "light")
            {
                document.body.classList.remove("dark");
                source="<?php echo asset('img/temanoche.jpg'); ?>" ;                     
            }else{
                document.body.classList.add("dark");
                source="<?php echo asset('img/temadia.jpg'); ?>" ;
            }
            $('#temadn').attr('src', source);
        }  
    }     
    themeMode2();

    $(document).on("click","#temadn",function(){
        document.body.classList.toggle("dark");
        if(document.body.classList.contains("dark"))
        {
            localStorage.setItem("theme","dark");
        }else{
            localStorage.setItem("theme","light");
        }
        themeMode2();
    });

    $(document).on("click","#temainfantil",function(){
        localStorage.setItem("temasidebar","infantil");       
        temaSidebar();
    });
    $(document).on("click","#temajuvenil",function(){
        localStorage.setItem("temasidebar","juvenil");       
        temaSidebar();
    });
    $(document).on("click","#temaadulto",function(){
        localStorage.setItem("temasidebar","adulto");       
        temaSidebar();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xammp\htdocs\constructora10\resources\views/configuracion/index.blade.php ENDPATH**/ ?>