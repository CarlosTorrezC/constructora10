<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{config('app.name', 'Constructora')}}</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.css') }}"> -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <style>
            /* :root
    {
        --bg-black-100:#353535;
        --bg-black-50:#eef0f4;
        --bg-black-20:#414546;
        --bg-black-ibox:#eef0f4;
        --black: black;
    } */

    :root
        {
            --section:#2f4050 ;
            --letra: #676A6C;
            --contenido:#ffffff;
            --fondothead:#F5F5F6;
            --letrathead:#676A6C;   
            --oscuro:#042331;
            --suave:#044444;  
            --ojo: black;       
            --colora:black;
        }

        body{
           font-family: 'Roboto', sans-serif;           
        }

        body.dark{
           --section:#121212;           
           --letra:#bdbdbd;           
           --contenido:#1f1b24;  
           --fondothead:#616161;
           --letrathead:#e0e0e0;       
           --oscuro:#121212;
           --suave:#1f1b24;   
           --ojo: white;  
        }

       *{
           margin: 0;
           padding: 0;
           list-style: none;
           text-decoration: none;
        }

       .sidebar{
           position: fixed;
           left:-300px;
           width: 300px;
           height: 100%;           
           background: var(--oscuro);
          
           transition: all .5s ease;
           overflow-y:auto;
       }

       .sidebar header{
           font-size: 22px;
           color:white;
           text-align: center;
           line-height: 70px;
           /* background: #063146; */
           /* background: #1f1b24; */
           color:var(--colora);
           user-select: none;
       }

       .sidebar ul a{
            display: block;
            height: 100%;
            width: 100%;
            line-height: 65px;
           font-size: 20px;
           /* color:white;            */
           color: var(--colora);
           
           padding-left: 40px;
           box-sizing: border-box;
           border-top: 1px solid rgba(255,255,255,.1);
           border-bottom:  1px solid black;   
           transition: .4s;   
       }

      
       .colorlink1{
            --colora:white;
        }

        .colorlink2{
            --colora:black;
        }

       ul li:hover a{
           padding-left: 50px;
       }

      .sidebar ul a ol li a{
           padding-left: 70px;           

       }

       /* ol li a{
           padding-left: 90px;
       } */

       ol li:hover a{
           padding-left: 70px;
       }

       .sidebar ul a i{
           margin-right: 16px;
       }

       .suave{           
           /* background: var(--suave); */
           padding-left: 5px;
       }

       #check{
        display:none;
       }

       label #btn, label #cancel{
           position: absolute;
           cursor:pointer;
           background: #042331;
           border-radius: 3px;
       }

       label #btn{
           left: 40px;
           top:25px;
           font-size: 35px;
           color:white;
           padding: 6px 12px;
           transition: all .5s;
       }

       label #cancel{
           z-index: 1111;
           left: -195px;
           top:17px;
           font-size: 30px;
           color:#0a5275;
           padding: 4px 9px;
           transition: all .5s ease;
       }

       #check:checked ~ .sidebar{
           left:0;           

       }

       #check:checked ~ label #btn{
           left:300px;
           opacity: 0;
           pointer-events: none;

       }

       #check:checked ~ label #cancel{
        left: 220px;

       } 

       #check:checked ~ section{
        margin-left: 300px;

       } 
       
       section{
         background: url('') no-repeat;
         background-position: center;
         background-size: cover;
         height: 100vh;  
         padding-top: 80px;
         padding-left: 10px;
         padding-right:10px;
         transition: all .5s;  
         background: var(--section);       
       }      

        #fondo{
            background-repeat: no-repeat;      
            width: 100%;
            height: 100%;
            border-radius: 20px;                
        }

        li div button {
            background-color: rgb(132,0,255);
            width:100%;
            height:45px;
        }

        .colorfondo{
            background-color: var(--contenido);
            color:var(--letra)
        }

        .form-control, 
        .form-control:hover, 
        .form-control:focus {
            background-color: var(--contenido);
            color:var(--letra);
        }
    
        .colorletrathead{
            background-color: var(--fondothead);
            color:var(--letrathead);
        }

        .divinfantil{            
            width:100;
            
            background-image: url("{{ asset('img/dibujo.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;      
              
        }

        .divjuvenil{            
            width:100;
            color:white;
            background-image: url("{{ asset('img/juvenil2.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;      
                 
        }

        .divadulto{            
            width:100;
            color:white;
            background-image: "";
            background-repeat: no-repeat;
            background-size: cover;    
           
        }

        .infantil {
            background-color: red;
            color:white;
            width:100%;
            height:45px;
        }

        .juvenil {
            background-color:yellow;
            color:white;
            width:100%;
            height:45px;
        }

        .adulto {
            background-color: green;
            color:white;
            width:100%;
            height:45px;
        }

    </style>
    </head>
    <body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
        <i class="fa fa-times" id="cancel"></i>
    </label>
    <div id="sidebar" class="sidebar divadulto">
        <header> Constructora </header>
        <ul>
            <li> <a href="{{route('inicio.index')}}" > <i></i> Inicio</a></li>            
            @if(session()->get('sessionLoggedRol')=='2')
            <li> 
                <a href="#" > <i></i> Administracion</a>
                <ol>                                
                     <li class="suave"> <a href="{{route('usuario.index')}}" > Gest. Usuario</a></li>                
                     <li class="suave"> <a href="{{route('reporte.index')}}" > Gest. Estadisticas</a></li>                     
                </ol> 
            </li>
            @endif
            <li> 
                <a href="#" > <i ></i> Inventario</a>
                <ol> 
                     <li class="suave"> <a href="{{route('material.index')}}" > Gest. Material</a></li>
                     <li class="suave"> <a href="{{route('herramienta.index')}}" > Gest. Herramienta</a></li>
                     <li class="suave"> <a href="{{route('ingreso.index')}}" > Reg. Ingreso</a></li>
                </ol> 
            </li>
            <li> 
                <a href="#" > <i></i> Proyecto</a>
                <ol> 
                     <li class="suave"> <a href="{{ route('proyecto.index')}}" > Gest. Proyecto</a></li>
                     <li class="suave"> <a href="{{ route('dotacion.index')}}" > Adm. Dotacion</a></li>
                     <li class="suave"> <a href="{{ route('produccion.index')}}" >  Reg. Produccion</a></li>
                     <li class="suave"> <a href="{{ route('prestamo.index')}}" >  Gest. Prestamo</a></li>
                </ol> 
            </li>
            <li> <a href="{{route('configuracion.index')}}" > <i></i> Configuracion</a></li>
            <li> <a href="{{route('logout')}}" > <i class="fa fa-sign-out"></i> Salir</a></li>               
        </ul>
    </div>
    <section> 
        @yield('content')
        @if(isset($contador))
            <div class="col-lg-12">
                <div class="d-flex justify-content-center align-items-center">
                    <br>
                        <span class="ojo fa fa-eye" style="color:white"> {{$contador}} </span>                                                                                                                    
                </div>
             </div>
        @endif      
    </section>
      
        <!-- Mainly scripts -->
        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>  
        <script>
            function themeMode(){
                if(localStorage.getItem("theme") !== null)
                {
                    if(localStorage.getItem("theme") === "light")
                    {
                        document.body.classList.remove("dark");                                        
                    }else{
                        document.body.classList.add("dark");                      
                    }                  
                }  
            }     
            themeMode();

            function temaSidebar(){
                if(localStorage.getItem("temasidebar") !== null)
                {
                    console.log(localStorage.getItem("temasidebar"));
                    if(localStorage.getItem("temasidebar") === "infantil")
                    {
                        document.getElementById("sidebar").classList.remove("divjuvenil");
                        document.getElementById("sidebar").classList.remove("divadulto");
                        document.getElementById("sidebar").classList.remove("colorlink1");
                        document.getElementById("sidebar").classList.add("divinfantil");
                        document.getElementById("sidebar").classList.add("colorlink2");
                    }else{
                        if(localStorage.getItem("temasidebar") === "juvenil"){
                            document.getElementById("sidebar").classList.remove("divinfantil");
                            document.getElementById("sidebar").classList.remove("divadulto");
                            document.getElementById("sidebar").classList.remove("colorlink2");
                            document.getElementById("sidebar").classList.add("divjuvenil");
                            document.getElementById("sidebar").classList.add("colorlink1");
                        }else{
                            document.getElementById("sidebar").classList.remove("divjuvenil");
                            document.getElementById("sidebar").classList.remove("divinfantil");
                            document.getElementById("sidebar").classList.remove("colorlink2");
                            document.getElementById("sidebar").classList.add("divadulto");
                            document.getElementById("sidebar").classList.add("colorlink1");
                        }                
                    }
                }       
            }
            temaSidebar(); 
    

    // setInterval(() => {
    //     let date= new Date();
    //     console.log(date.getHours());
    //     if(date.getHours()>= 0){
    //         if(date.getMinutes()>= 26){
    //             document.body.classList.remove("dark");
                
    //         }else{
    //             document.body.classList.add("dark");
    //         }
    //     }else{ 
    //         document.body.classList.add("dark");
    //     }

    // }, 15000);
    </script>        
        <script>
            function soloNumeros(e){
                var key = e.charCode;
                //console.log(key);
                return key >= 48 && key <= 57;
            }
        </script>
        @yield('js')
    </body>

</html>