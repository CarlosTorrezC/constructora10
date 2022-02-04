
@extends ('layouts.normal')
@section ('content')
    <div class="colorfondo wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="colorfondo ibox-content">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="d-flex justify-content-between align-items-center">
                                     <h2>Prestamo</h2>                                                                                                                    
                                </div>
                            </div>
                        </div>
                        <br>  
                        <form method="POST" action="{{route('prestamo.store')}}" role="form" autocomplete="off">
                        @csrf
                        @method('POST')                         
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="glosa">Glosa</label>
                                                <input name="glosa" id="glosa" type="text"  class="form-control" required></input>                          
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="fecha">Fecha</label>
                                                <input name="fecha" id="fecha" type="date" value="{{date('Y-m-d')}}" class="form-control" required></input>                          
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="idproyecto">Proyecto</label>
                                                <select class="tag form-control" id="idproyecto" name="idproyecto" required>                         
                                                    @foreach($proyecto as $item)
                                                        <option value="{{$item->id}}" > {{$item->nombre}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>     
                                        <div class="hr-line-dashed"></div>                                        
                                        <div class="form-group row">                                        
                                            <div id="divherramienta" class="col-sm-4" >  
                                                <br>                                          
                                                <label >Herramienta</label>                                                   
                                                <select name="idherramienta" id="idherramienta" class="form-control">
                                                    @foreach($herramienta as $item)
                                                        <option value="{{$item->id}}"> {{$item->nombre}}</option>
                                                    @endforeach
                                                </select>                       
                                            </div>                                                                       
                                            <div class="col-sm-2">
                                            <br>  
                                                <label for="cantidad">Cantidad</label>
                                                <input name="cantidad" id="cantidad" type="number" class="form-control" ></input>                          
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
                                        <th>Herramienta</th>                                        
                                        <th>Cantidad</th>                                                           
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
                                <input name="_token" value="{{csrf_token()}}" type="hidden">
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
@endsection

@section('js')
<script>
        
        $(document).ready(function () {           
            $('#btn_add').click(function () {
                agregar();
            });
        });

        //var hoy = new Date();
        c = 0;
        
        //subtotal=0;
        $("#guardar").hide();

        function agregar() {            
            idherramienta = $("#idherramienta").val();
            herramienta = $("#idherramienta option:selected").text();
       
            cantidad = $("#cantidad").val();   
            resp=validarCampo(cantidad,"cantidad");
            if(resp===true){
                return;
            } 


            //if( herramienta != "" && herramienta != "Escoger Herramienta..."  && cantidad != "" && cantidad > 0 && costo != ""){

                var fila = '<tr class="selected" id="fila'+c+'">' +                        
                           '<td><input id="idherramienta"  type="hidden" name="idherramienta[]" value="'+idherramienta+'">'+herramienta+'</td>'+
                           '<td><input id="cant" type="number" name="cant[]" value="'+cantidad+'" ></td>'+                                                      
                           '<td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');"><span class="fa fa-trash"> </span></button></td></tr>';
                c++;
                limpiar();
                evaluar();
                $('#detalle').append(fila);
            // }else{
            //     alert("Error al ingresar el detalle de prestamo, revise los datos");
            // }
        }

        function limpiar(){
            //$("#idherramienta").val("");
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

    @endsection
