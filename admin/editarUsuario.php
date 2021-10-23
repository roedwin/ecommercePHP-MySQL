<?php 
    include_once "db_conexion.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    if(isset($_REQUEST['guardar'])){
        
        $nombre = mysqli_real_escape_string($con,$_REQUEST['nombre']??'');
        $email = mysqli_real_escape_string($con,$_REQUEST['email']??'');
        $password = md5(mysqli_real_escape_string($con,$_REQUEST['pass']??''));
        $id = mysqli_real_escape_string($con,$_REQUEST['id']??'');

        $query = "UPDATE usuarios SET 
        nombre='" . $nombre . "', email='" .$email. "', pass='" . $password . "' WHERE id='$id'";
        $res=mysqli_query($con,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$nombre.' actualizado correctamente" />';
        }else{
            ?>
                <div class="alert alert-danger" role="alert">
                    Error al crear usuario <?php echo mysqli_error($con); ?>
                </div>
            <?php
        }
    }
    $id = mysqli_real_escape_string($con, $_REQUEST['id']??'');
    $query = "SELECT id,nombre,email,pass FROM usuarios WHERE id='$id';";
    $res = mysqli_query($con,$query);
    if(!$res){
        var_dump(mysqli_error($con));
        exit;
      }
    $row = mysqli_fetch_assoc($res);

    $varNombre = isset($row['nombre']) ? $row['nombre'] : '';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Usuario</h1>
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
                  <form action="panel.php?modulo=editarUsuario" method="post">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $varNombre; ?>">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="pass" class="form-control" >
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                      </div>
                  </form>
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