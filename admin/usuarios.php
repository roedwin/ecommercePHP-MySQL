<?php 
  include_once "db_conexion.php";
  $con = mysqli_connect($host, $user, $pass, $db);
  if(isset($_REQUEST['idBorrar'])){
    $id = mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
    $query = "DELETE FROM usuarios WHERE id = '$id'";
    $res = mysqli_query($con, $query);
    if($res){
      ?>
        <div class="alert alert-warning float-right" role="alert">
          Usuario eliminado exitosamente
        </div>
      <?php
    }else{
      ?>
        <div class="alert alert-danger float-right" role="alert">
          Error!!! <?php echo mysqli_error($con); ?>
        </div>
      <?php
    }
  }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones
                        <a href="panel.php?modulo=crearUsuario"><i class="fa fa-plus"></i></a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  
                      <?php                         
                        $query = "SELECT id,nombre,email FROM usuarios";
                        $res=mysqli_query($con,$query);
                        if(!$res){
                          var_dump(mysqli_error($con));
                          exit;
                        }
                        while($row=mysqli_fetch_assoc($res)){
                      ?>
                      <tr>
                          <td><?php echo $row['nombre'] ?></td>                          
                          <td><?php echo $row['email'] ?></td>
                          <td>
                              <a href="panel.php?modulo=editarUsuario&id=<?php echo $row['id'] ?>" style="margin-right: 10px;"><i class="fas fa-edit"></i></a>
                              <a href="panel.php?modulo=usuarios&idBorrar=<?php echo $row['id'] ?>" class="text-danger borrar"><i class="fa fa-trash"></i></a>
                          </td>
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