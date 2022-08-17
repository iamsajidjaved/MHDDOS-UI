<!DOCTYPE html>
<html lang="en">
   <head>
      <title>WebUI for MHDDoS</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
         <div class="container-fluid my-3">
         <div class="row">
            <div class="col-md-4 offset-md-4">
               <h1 class="text-center mt-3">New Attack</h1>
               <form action="attack-target.php" method="post">
                  <div class="mb-3">
                     <label for="layer" class="form-label">Choose layer:</label>
                     <select class="form-select form-select-lg mb-3" name="layer" id="layer">
                        <option value=''>Select Layer</option>
                        <option value="layer_4">Layer 4</option>
                        <option value="layer_7">Layer 7</option>
                     </select>
                  </div>
                  <div class="mb-3">
                     <label for="method" class="form-label">Choose method:</label>
                     <select class="form-select form-select-lg mb-3" id="method" name="method">
                        <option value=''>Select Method</option>
                        <option value="GET" layer="layer_7">GET</option>
                        <option value="POST" layer="layer_7">POST</option>
                        <option value="OVH " layer="layer_7">OVH </option>
                        <option value="RHEX" layer="layer_7">RHEX</option>
                        <option value="STOMP" layer="layer_7">STOMP</option>
                        <option value="STRESS" layer="layer_7">STRESS</option>
                        <option value="DYN" layer="layer_7">DYN</option>
                        <option value="DOWNLOADER" layer="layer_7">DOWNLOADER</option>
                        <option value="SLOW" layer="layer_7">SLOW</option>
                        <option value="HEAD" layer="layer_7">HEAD</option>
                        <option value="NULL" layer="layer_7">NULL</option>
                        <option value="COOKIE" layer="layer_7">COOKIE</option>
                        <option value="PPS" layer="layer_7">PPS</option>
                        <option value="EVEN" layer="layer_7">EVEN</option>
                        <option value="GSB" layer="layer_7">GSB</option>
                        <option value="DGB" layer="layer_7">DGB</option>
                        <option value="AVB" layer="layer_7">AVB</option>
                        <option value="BOT" layer="layer_7">BOT</option>
                        <option value="APACHE" layer="layer_7">APACHE</option>
                        <option value="XMLRPC" layer="layer_7">XMLRPC</option>
                        <option value="CFB" layer="layer_7">CFB</option>
                        <option value="CFBUAM" layer="layer_7">CFBUAM</option>
                        <option value="BYPASS" layer="layer_7">BYPASS</option>
                        <option value="BOMB" layer="layer_7">BOMB</option>
                        <option value="KILLER" layer="layer_7">KILLER</option>
                        <option value="TOR" layer="layer_7">TOR</option>
                        <option value="TCP" layer="layer_4">TCP</option>
                        <option value="UDP" layer="layer_4">UDP</option>
                        <option value="SYN" layer="layer_4">SYN</option>
                        <option value="CPS" layer="layer_4">CPS</option>
                        <option value="ICMP" layer="layer_4">ICMP</option>
                        <option value="CONNECTION" layer="layer_4">CONNECTION</option>
                        <option value="VSE" layer="layer_4">VSE</option>
                        <option value="TS3" layer="layer_4">TS3</option>
                        <option value="FIVEM" layer="layer_4">FIVEM</option>
                        <option value="MEM" layer="layer_4">MEM</option>
                        <option value="NTP" layer="layer_4">NTP</option>
                        <option value="MCBOT" layer="layer_4">MCBOT</option>
                        <option value="MINECRAFT" layer="layer_4">MINECRAFT</option>
                        <option value="MCPE" layer="layer_4">MCPE</option>
                        <option value="DNS" layer="layer_4">DNS</option>
                        <option value="CHAR" layer="layer_4">CHAR</option>
                        <option value="CLDAP" layer="layer_4">CLDAP</option>
                        <option value="ARD" layer="layer_4">ARD</option>
                        <option value="RDP" layer="layer_4">RDP</option>
                     </select>
                  </div>
                  <div class="mb-3">
                     <label for="target" class="form-label">Target</label>
                     <input type="text" class="form-control" id="target" name="target" placeholder="https://google.com" required>
                  </div>
                  <div class="mb-3">
                     <label for="threads" class="form-label">Threads</label>
                     <input type="number" class="form-control" id="threads" name="threads" placeholder="100" required>
                  </div>
                  <div class="mb-3" id="requests_per_second_div">
                     <label for="requests_per_second" class="form-label">Requests per seconds</label>
                     <input type="number" class="form-control" id="requests_per_second" name="requests_per_second" placeholder="100" required>
                  </div>
                  <div class="mb-3">
                     <label for="duration" class="form-label">Duration(in seconds)</label>
                     <input type="number" class="form-control" id="duration" name="duration" placeholder="100" required>
                  </div>
                  <input type="submit" class="btn btn-primary btn-block" name="submit" value="Attack Target">
               </form>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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