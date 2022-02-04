

<?php $__env->startSection('content'); ?>
    <div class="colorfondo wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="colorfondo ibox-content">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="d-flex justify-content-between align-items-center">
                                     <h2>Ingreso</h2>                                                                                                                    
                                </div>
                            </div>
                        </div>
                        <br>  
                        <form method="POST" action="<?php echo e(route('ingreso.store')); ?>" role="form" autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>                         
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="glosa">Glosa</label>
                                                <input name="glosa" id="glosa" type="text"  class="form-control" required></input>                          
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="fecha">Fecha</label>
                                                <input name="fecha" id="fecha" type="date" value="<?php echo e(date('Y-m-d')); ?>" class="form-control" required></input>                          
                                            </div>
                                        </div>     
                                        <div class="hr-line-dashed"></div> 
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" id="btnmaterial" class="btn btn-primary">Material</button>
                                                <button type="button" id="btnherramienta" class="btn btn-secondary">Herramienta</button>
                                                <button type="button" id="btndotacion" class="btn btn-warning">Dotacion</button>
                                            </div>                                          
                                        </div>
                                        <div class="form-group row">                                        
                                            <div id="divmaterial" class="col-sm-4" >  
                                                <br>                                          
                                                <label >Material</label>                                                   
                                                <select name="idmaterial" id="idmaterial" class="form-control" >
                                                    <?php $__currentLoopData = $material; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>"> <?php echo e($item->nombre); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>                       
                                            </div>
                                                                       
                                            <div id="divherramienta" class="col-sm-4"  style="display:none">   
                                            <br>                                           
                                                <label >Herramienta</label>                                                   
                                                <select name="idherramienta" id="idherramienta" class="form-control">
                                                    <?php $__currentLoopData = $herramienta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>"> <?php echo e($item->nombre); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>                       
                                            </div>
                                                                           
                                            <div id="divdotacion" class="col-sm-4" style="display:none">  
                                            <br>                                            
                                                <label >Dotacion</label>                                                   
                                                <select name="iddotacion" id="iddotacion" class="form-control">
                                                    <?php $__currentLoopData = $dotacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>"> <?php echo e($item->nombre); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>                       
                                            </div>
                                            <div class="col-sm-2">
                                            <br>  
                                                <label for="cantidad">Cantidad</label>
                                                <input name="cantidad" id="cantidad" type="number" class="form-control"  ></input>                          
                                            </div>
                                            <div class="col-sm-2">
                                            <br>  
                                                <label for="costo">Costo</label>
                                                <input name="costo" id="costo" type="text" class="form-control" ></input>                          
                                            </div>
                                            <div class="col-sm-2">
                                            <br>  
                                            <label for="agregar">&nbsp;</label> <br>
                                                <button type="button" class="btn btn-primary" id="btn_add">Agregar 
                                                </button>                                                
                                            </div>
                                        </div>  
                                                                                                     
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="colorletrathead">
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Ingreso</th>
                                        <th>Cantidad</th>                   
                                        <th>Costo</th> 
                                        <th>SubTotal</th>
                                        <th class="text-center" width="100px"> </th>                                    
                                    </tr>
                                </thead>
                                <tbody id="detalle">                                    
                                                             
                                </tbody>
                            </table>
                        </div>       
                            <br>
                            <div class="d-flex justify-content-center align-items-center">
                                <!--<button type="submit" class="btn btn-success">Guardar</button>-->
                                <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
                                &nbsp;
                                <button id="guardar" class="btn btn-primary" type="submit">Guardar</button>
                                &nbsp;
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                    </form>
                 </div>
                 </div>
             </div>
        </div>
    </div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
        tipo="material";
        $(document).ready(function () {
            $('#btnmaterial').click(function () {
                $('#divmaterial').show();
                $('#divherramienta').hide();
                $('#divdotacion').hide();
                tipo="material";
            });
            $('#btnherramienta').click(function () {
                $('#divherramienta').show();
                $('#divmaterial').hide();
                $('#divdotacion').hide();
                tipo="herramienta";
            });
            $('#btndotacion').click(function () {
                $('#divdotacion').show();
                $('#divmaterial').hide();
                $('#divherramienta').hide();
                tipo="dotacion";
            });
            
            $('#btn_add').click(function () {
                agregar();
            });
        });

        //var hoy = new Date();
        c = 0;
        
        //subtotal=0;
        $("#guardar").hide();

        function agregar() {            
            idingreso = $("#id"+ tipo).val();
            ingreso = $("#id"+ tipo + " option:selected").text();
       
            cantidad = $("#cantidad").val();
            var resp=validarCampo(cantidad,"cantidad");
            if(resp===true){
                return;
            }            
            costo = $("#costo").val();
            console.log(costo)
            resp=validarCampo(costo,"costo");
            if(resp===true){
                return;
            }  
            subtotal=cantidad*costo;

            //fecha = $("#FechaA2").val();

            //if( herramienta != "" && herramienta != "Escoger Herramienta..."  && cantidad != "" && cantidad > 0 && costo != ""){

                var fila = '<tr class="selected" id="fila'+c+'"><td><input id="tipo"  type="hidden" name="tipo[]" value="'+tipo+'">'+tipo+'</td> <td><input id="idingreso"  type="hidden" name="idingreso[]" value="'+idingreso+'">'+ingreso+'</td><td><input id="cant" type="number" name="cant[]" value="'+cantidad+'" ></td><td><input id="cost" type="number" name="cost[]" value="'+costo+'" ></td><td><input id="subtotal" type="number" value="'+subtotal+'" ></td><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');"><span class="fa fa-trash"> </span></button></td></tr>';

                c++;
                limpiar();
                evaluar();
                $('#detalle').append(fila);
            // }else{
            //     alert("Error al ingresar el detalle de prestamo, revise los datos");
            // }
        }

        function limpiar(){
            //$("#idmaterial").val("");
            $("#cantidad").val("");
            $("#costo").val("");
        }

        function evaluar(){
            if (c > 0){
                $("#guardar").show();
            }
            else{
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            $("#fila" + index).remove();
            c--;
            evaluar();
        }

        function validarCampo(dato,origen){
            var resp= false;
            switch(dato){
                case null : alert(origen+" elemento es nulo"); resp=true; break;
                case "" : alert(origen+" debe ingresar valor");resp=true; break;
                case 0 : alert(origen+" debe ser un valor mayor a cero");resp=true; break;
                case "0" : alert(origen+" debe ser un valor mayor a cero");resp=true; break;
            }
            if (dato<0){
                alert(origen+" debe ser un valor positivo mayor a cero");
                resp=true;
            }
            return resp;
        }

    </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\datos\proylaravel\constructora\resources\views/ingreso/create.blade.php ENDPATH**/ ?>