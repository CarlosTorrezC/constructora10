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
    :root
    {
        --bg-black-100:#353535;
        --bg-black-50:#eef0f4;
        --bg-black-20:#414546;
        --bg-black-ibox:#eef0f4;
        --black: black;
    }
    
    *
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body
    {
        overflow: auto;
        color:#393432;
    }
    body.dark 
    {
        --bg-black-100:#fff;
        --bg-black-50:#000;
        --bg-black-20:#eef0f4;
        --bg-black-ibox:#000;
        color:gray;
    }
    thead{
        color:black;
    }
    .menu
    {
        position: absolute;
        width: 60px;
        height: 600px;
        background-color: var(--bg-black-50);
        z-index: 2;
        top: 0;
        bottom: 0;
        left: 10px;
        margin: auto;
        border-radius: 0.8rem;
        transition: 0.3s ease 0.15s;
        font-family: sans-serif;      
    }
    .menu.open
    {
        width: 240px;        
    }

    .menu ~ section{
        margin-left: 80px;
        margin-top: 40px; 
        margin-right: 10px; 
       
    } 

    .menu.open ~ section{
        margin-left: 260px;
        margin-top: 40px;       
        margin-right: 10px;   
       
    } 

    .menu a 
    {
        text-decoration: none;
    }
    .menu .actionbar
    {
        width: 100%;
        height: 10%;
        padding: 0.5rem;
        overflow: hidden;
    }
    .menu .actionbar div 
    {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        border-radius: 0.5rem;
        transition: 0.3s ease;
    }
    .menu .actionbar div button
    {
        background-color: transparent;
        outline: none;
        border: none;
        border-radius: 0.5rem;
        color: var(--bg-black-100);
        width: 45px;
        height: 45px;
        transition: 0.3s ease;
        font-size: 1rem;
    }
    .menu .actionbar div button:hover
    {
        background-color: rgb(132,0,255);
    }
    .menu .actionbar div h3
    {
        width: calc(100% - 45px);
        text-align: center;
    }
    .menu .optionsBar
    {
        overflow: hidden;
        display: flex;
        width: 100%;
        height: 75%;
        padding: 0 0.5rem;
        align-items: center;
        flex-direction: column;
    }
    .menu .optionsBar .menuItem
    {
        width: 100%;
        height: 45px;
        margin: 0.3rem;
    }
    .menu .menuItem .menuOption
    {
        font-size: 1rem;
        outline: none;
        border: none;
        background-color: transparent;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        border-radius: 0.5rem;
        transition: 0.3s ease;
    }
     .optionsBar
    {
        font-size: 1rem;
        outline: none;
        border: none;
        background-color: transparent;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        border-radius: 0.5rem;
        transition: 0.3s ease;
    }

    .menu .optionsBar .menuItem .menuOption:hover
    {
        background-color: rgb(132,0,255);
    }
    .menu .optionsBar .menuItem .menuOption i 
    {
        width: 45px;
        text-align: center;
        color: var(--bg-black-100);
    }
    .menu .optionsBar .menuItem .menuOption h5
    {
        width: calc(100% - 45px);
    }
    .menuText
    {
        color: var(--bg-black-20);
        transform: translateX(-250px);
        opacity: 0;
        transition: transform 0.3s ease 0.1s;
    }
    .menuText.open2
    {
        opacity: 1;
        transform: translateX(0);
    }
    .menu .menuBreak
    {
        width: 100%;
        height: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .menu .menuBreak hr
    {
        width: 50%;
        height: 3px;
        background-color: var(--bg-black-100);
        border: none;
        border-radius: 5px;
    }
    .menu .menuUser
    {
        width: 100%;
        height: 10px;
        padding: 4.5rem 0 3rem 0;
    }
    .menu .menuUser a 
    {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
        padding: 0.5rem;
        position: relative;
    }
    .menu .menuUser a div 
    {
        width: 45px;
        height: 45px;
        position: relative;
        border-radius: 0.5rem;
    }
    .menu .menuUser a div img 
    {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 0.5rem;
    }
    .menu .menuUser a .Username
    {
        width: calc(70% - 45px);
    }
    .menu .menuUser a p
    {
        width: calc(30% - 45px);
    }
    .menu .menuUser a:hover p
    {
        animation: animArrow 0.3s ease 2;
    }
    @keyframes animArrow
    {
        0%
        {
            transform: translateX(0);
        }
        50%
        {
            transform: translateX(5px);
        }
        100%
        {
            transform: translateX(0);
        }
    }
    .menu .menuUser .userInfo
    {
        position: absolute;
        width: 10rem;
        height: 8rem;
        opacity: 0;
        color: var(--bg-black-50);
        pointer-events: none;
        top: 58%;
        left: 1.5rem;
        transition: 0.3s ease;
        transform: scale(0);
        transform-origin: bottom left;
    }
    .menu .menuUser .userInfo div 
    {
        position: relative;
        width: 100%;
        height: calc(100% - 20px);
        box-shadow: 0px 0px 40px rgba(0,0,0,0.3);
        background-color: var(--bg-black-100);
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
        border-bottom-right-radius: 1rem;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-direction: column;
    }
    .menu .menuUser .userInfo div h1
    {
        font-size: 4rem;
    }
    .menu .menuUser .userInfo div::before
    {
        content: '';
        position: absolute;
        bottom: -18px;
        left: -2px;
        width: 0;
        height: 0;
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
        border-right: 15px solid var(--bg-black-100);
        transform: rotate(45deg);
    }
    .menu .menuUser:hover .userInfo
    {
        pointer-events: all;
        opacity: 1;
        transform: scale(1);
    }
    .menu .themeBar
    {
        overflow: hidden;
        width: 100%;
        height: 10%;
        padding: 0.5rem;
    }
    .menu .themeBar div 
    {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        border-radius: 0.5rem;
        transition: 0.3s ease;
    }
    .menu .themeBar div button
    {
        background-color: transparent;
        outline: none;
        border: none;
        border-radius: 0.5rem;
        color: var(--bg-black-100);
        width: 100%;
        height: 45px;
        transition: 0.3s ease;
        font-size: 1rem;
    }
    .menu .themeBar div button
    {
        background-color: rgb(132,0,255);
    }
    .menu .optionsBar .menuItem .menuOption:hover .menuText,
    .menu .optionsBar .menuItem .menuOption:hover i,
    .menu .actionbar div button:hover i,
    .menu .themeBar div button:hover i
    {
        color: #fff;
    }

    section{        
        background: url('Desert.jpg') no-repeat;
        background-position: center;
        background-size: cover;
        height: 100vh;  
        margin-bottom: 10px;
        
    }     
    
    .seccion{
        background-color: var(--bg-black-50);      
    }

    /* .seccionthead{
        color: var(--black);      
     }  */

     .seccionibox{
        background-color: var(--bg-black-ibox);      
     } 

    #fondo{
        background-repeat: no-repeat;      
        width: 100%;
        height:100%;
        border-radius: 10px;                
    }
</style>
    </head>
    <body>
    <nav id="menu" class="menu">
    <div class="actionbar">
        <div>
            <button id="menuBtn">
                <i class="fa fa-bars"></i>
            </button>
            <h3 class="menuText">Constructora</h3>
        </div>
    </div>
    <ul class="optionsBar">
        <li class="menuItem">
            <a href="{{route('inicio.index')}}" class="menuOption">
                <i class="fa fa-home"></i><h5 class="menuText">Inicio</h5>
            </a>
        </li>
        <li class="menuBreak">
            <hr>
        </li>
             
        @if(session()->get('sessionLoggedRol')=='2')
            <li class="menuItem">   
                <a href="{{route('usuario.index')}}" class="menuOption">
                    <i class="fas fa-user"></i><h5 class="menuText"> Gest. Usuario</h5>
                </a> 
            </li>                              
            <li class="menuItem">            
                <a href="{{route('reporte.index')}}" class="menuOption">
                        <i class="fas fa-chart-bar"></i><h5 class="menuText"> Estadisticas</h5>
                </a>              
            </li>   
            <li class="menuBreak">
                <hr>
            </li>
        @endif              
        <li class="menuItem">           
            <a href="{{route('material.index')}}" class="menuOption">
                <i class="fa fa-border-all"></i><h5 class="menuText">Gest. Material</h5>
            </a> 
        </li>
        <li class="menuItem">            
            <a href="{{route('herramienta.index')}}" class="menuOption">
                <i class="fas fa-tools"></i><h5 class="menuText">Gest. Herramienta</h5>
            </a> 
        </li>
        <li class="menuItem">           
            <a href="{{route('ingreso.index')}}" class="menuOption">
                 <i class="fa fa-shopping-bag"></i><h5 class="menuText">Reg. Ingreso</h5>
            </a>
        </li>
        <li class="menuBreak">
            <hr>
        </li>
        <li class="menuItem">          
            <a href="{{route('proyecto.index')}}" class="menuOption">
                <i class="fas fa-hard-hat"></i><h5 class="menuText">Gest. Proyecto</h5>
            </a>
        </li>
        <li class="menuItem">
            <a href="{{route('dotacion.index')}}" class="menuOption">
                <i class="fa fa-tag"></i><h5 class="menuText">Adm. Dotacion</h5>
            </a>           
        </li>
        <li class="menuItem">           
            <a href="{{route('produccion.index')}}" class="menuOption">
                <i class="fas fa-book"></i><h5 class="menuText">Reg. Produccion</h5>
            </a> 
        </li>
        <li class="menuItem">
            <a href="{{route('prestamo.index')}}" class="menuOption">
                <i class="fas fa-book"></i><h5 class="menuText">Gest. Prestamo</h5>
            </a>          
        </li>
        <li class="menuBreak">
            <hr>
        </li>
        <li class="menuItem">
            <a href="{{route('logout')}}" class="menuOption">
                <i class="fas fa-sign-out"></i><h5 class="menuText">Salir</h5>
            </a>          
        </li>
    </ul>   
    <div class="themeBar">
        <div>
            <button id="themeChangeBtn"><i class="fa "></i></button>
        </div>
    </div>
</nav>
    <section class="seccion">    
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
    const menuBtn = document.getElementById('menuBtn');
    const menu = document.getElementById('menu');
    const menuText = document.querySelectorAll('.menuText');

    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('open');
        menuText.forEach(function(text, index){
            setTimeout(() => {
                text.classList.toggle('open2');
            }, index * 50);
        })
    })
    // $(document).on('click', function(e) {
    //     if($(e.target).closest('#menu').length === 0){
    //         menu.classList.remove('open');
    //         menuText.forEach(function(text, index){
    //         setTimeout(() => {
    //             text.classList.toggle('open2');
    //         }, index * 50);
    //     })
    // }
    // })
    // dark light mode

    const dayNight = document.querySelector('#themeChangeBtn');
    dayNight.addEventListener("click", () => {
        document.body.classList.toggle("dark");
        if(document.body.classList.contains("dark"))
        {
            localStorage.setItem("theme","dark");
        }
        else
        {
            localStorage.setItem("theme","light");
        }
        updateIcon();
    })
    function themeMode(){
        if(localStorage.getItem("theme") !== null)
        {
            if(localStorage.getItem("theme") === "light")
            {
                document.body.classList.remove("dark");
            }
            else
            {
                document.body.classList.add("dark");
            }
        }
        updateIcon();
    }
    themeMode();
    function updateIcon(){
        if(document.body.classList.contains("dark"))
        {
            dayNight.querySelector("i").classList.remove("fa-moon");
            dayNight.querySelector("i").classList.add("fa-sun");
        }
        else
        {
            dayNight.querySelector("i").classList.remove("fa-sun");
            dayNight.querySelector("i").classList.add("fa-moon");
        }
    }
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