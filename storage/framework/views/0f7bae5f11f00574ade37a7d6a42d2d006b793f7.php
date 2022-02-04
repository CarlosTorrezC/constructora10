
<?php $__env->startSection('content'); ?>
    <div class="colorfondo wrapper wrapper-content">
        <canvas id="canvas" width="400" height="400"></canvas>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>   
    var cu = <?php echo $cu; ?>;
    var vista = <?php echo $vista; ?>;
    var barChartData = {
        labels: cu,
        datasets: [{
            label: 'Visitas',     
            data: vista,
            backgroundColor:[
                'rgba(255,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(255,206,86,0.6)',
                'rgba(75,192,192,0.6)',
                'rgba(56,99,132,0.6)',
                'rgba(231,99,132,0.6)',
                'rgba(34,99,132,0.6)',
                'rgba(78,99,132,0.6)',
                'rgba(123,99,132,0.6)',
                'rgba(43,12,76,0.6)'
            ],
            borderWidth:2
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'pie',
            data: barChartData,
            options: {
                plugins:{
                    legend:{
                        display:true
                    }
                },
                legend:{
                        display:true
                    },
                elements: {
                    // rectangle: {
                    //     borderWidth: 2,
                    //     borderColor: '#c1c1c1',
                    //     borderSkipped: 'bottom'
                    // }
                },
                responsive: true,
                maintainAspectRatio:false,
                title: {
                    display: true,
                    text: 'Vistas por Pagina'
                },
                // scales: {
                // xAxes: [{
                //     ticks: {
                //         fontColor: "gray",
                //         fontSize: 14,
                //         stepSize: 1,
                //         beginAtZero: true
                //     }
                // }] 
                // }             
            }
        });
    };
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xammp\htdocs\constructora10\resources\views/reporte/index.blade.php ENDPATH**/ ?>