<!DOCTYPE html>
<html lang="en">
   <head>
      <title>WebUI for MHDDoS</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
         <div class="container my-3">
         <div class="row">
            <div class="col-md-12">
            <h1 class="text-center mt-3">Previous Attacks</h1>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Process ID</th>
                        <th scope="col">Attacking Method</th>
                        <th scope="col">Target URL</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">Finishing Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = new SQLite3('ddos.db');
                        $res = $db->query('SELECT * FROM attacks');
                        while ($row = $res->fetchArray()) {
                            ?>
                            <tr>
                                <th><?php echo $row['process_id'];?></th>
                                <td><?php echo $row['attacking_method'];?></td>
                                <td><?php echo $row['target_url'];?></td>
                                <td>
                                    <?php 
                                       $timestamp = $row['start_time'];
                                       $datetimeFormat = 'Y-m-d H:i:s';
                                       $date = new \DateTime();
                                       $date->setTimestamp($timestamp);
                                       echo $date->format($datetimeFormat);
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                       $timestamp = $row['start_time']+$row['duration_in_seconds'];
                                       $datetimeFormat = 'Y-m-d H:i:s';
                                       $date = new \DateTime();
                                       $date->setTimestamp($timestamp);
                                       echo $date->format($datetimeFormat);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                       if ($timestamp>=time()) {
                                          echo 'Running';
                                       }else{
                                          echo 'Finished';
                                       }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                       $pid = $row['process_id'];
                                       if ($timestamp>=time()) {
                                          echo "<a class='btn btn-danger btn-sm' href='kill_process.php?process_id=$pid'>Stop Attack</a>";
                                       }else{
                                          echo "<a class='btn btn-danger btn-sm' href='kill_process.php?process_id=$pid'>Delete Record</a>";
                                       }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
                </table>
            </div>
         </div>
      </div>
      
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

      <script>
         $(document).ready(function () {
            $('#example').DataTable();
         });
      </script>
   </body>
</html>