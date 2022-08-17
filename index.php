<?php
/**
 * get memory usage
 */
function get_server_memory_usage(){
   $exec_free = explode("\n", trim(shell_exec('free')));
   $get_mem = preg_split("/[\s]+/", $exec_free[1]);
   return round($get_mem[2]/$get_mem[1]*100, 0);
}

/**
 * get cpu usage
 */
function get_server_cpu_usage(){
   $exec_loads = sys_getloadavg();
   $exec_cores = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
   return round($exec_loads[1]/($exec_cores + 1)*100, 0);
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>WebUI for MHDDoS</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   </head>
   <body>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
               <a class="navbar-brand" href="/">WebUI for MHDDoS</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="attack.php">New Attack</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="previous-attacks.php">Previous Attacks</a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
         <div class="container-fluid mt-5">
         <div class="row">
            <div class="col-md-6">
               <canvas id="memory"></canvas>
            </div>
            <div class="col-md-6">
               <canvas id="cpu"></canvas>
            </div>
         </div>
         <div class="row mt-5">
            <div class="col-md-12">
               <p class="text-center">Attack targets based on your server performance</p>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script>
         var xValues = ["Used", "Free"];
         var yValues = [<?php echo get_server_memory_usage();?>, <?php echo (100-get_server_memory_usage());?>];
         var barColors = [
         "#b91d47",
         "#00aba9",
         ];

         new Chart("memory", {
         type: "pie",
         data: {
            labels: xValues,
            datasets: [{
               backgroundColor: barColors,
               data: yValues
            }]
         },
         options: {
            title: {
               display: true,
               text: "Server Memory Utilization"
            }
         }
         });
      </script>

      <script>
         var xValues = ["Used", "Free"];
         var yValues = [<?php echo get_server_cpu_usage();?>, <?php echo (100-get_server_cpu_usage());?>];
         var barColors = [
         "#b91d47",
         "#00aba9",
         ];

         new Chart("cpu", {
         type: "pie",
         data: {
            labels: xValues,
            datasets: [{
               backgroundColor: barColors,
               data: yValues
            }]
         },
         options: {
            title: {
               display: true,
               text: "Server CPU Utilization"
            }
         }
         });
      </script>

      <script>
         // keep the methods disabled untill the layer selection
         $( document ).ready(function() {
            $("#method").attr("disabled", "disabled");
         });

         // change the methods based on the layer selection
         $('#layer').change(function(){
            $("#method").removeAttr("disabled");
            $("#method").val();

            var layer = $("#layer").val();
            if(layer==''){
               $("#method").attr("disabled", "disabled");
               $("#requests_per_second").prop('required', false);
            }else{
               if(layer=='layer_7'){
                  $('option[layer="layer_4"]').hide();
                  $('option[layer="layer_7"]').show();

                  $('#requests_per_second_div').show();
                  $("#requests_per_second").prop('required', true);
            }else{
                  $('option[layer="layer_7"]').hide();
                  $('option[layer="layer_4"]').show();

                  $('#requests_per_second_div').hide(); 
                  $("#requests_per_second").prop('required', false);
            }
            }
         });
      </script>
   </body>
</html>