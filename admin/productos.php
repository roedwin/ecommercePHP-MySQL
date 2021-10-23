<?php 
  include_once "db_conexion.php";
  $con = mysqli_connect($host, $user, $pass, $db);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tablaProductos" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                      <?php                         
                        $query = "SELECT id,nombre,precio,existencias FROM productos";
                        $res=mysqli_query($con,$query);
                        if(!$res){
                          var_dump(mysqli_error($con));
                          exit;
                        }
                        while($row=mysqli_fetch_assoc($res)){
                      ?>
                      <tr>
                          <td><?php echo $row['nombre'] ?></td>                          
                          <td><?php echo $row['precio'] ?></td>
                          <td><?php echo $row['existencias'] ?></td>
                      </tr>
                    <?php
                        }
                    ?>
                  </tr>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>