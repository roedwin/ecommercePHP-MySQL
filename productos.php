<div class="row mt-1">
                    <?php                         
                        //buscador
                        $where="where 1=1";
                        $nombre =mysqli_real_escape_string($con,$_REQUEST['nombre']??'');
                        if(empty($nombre)==false){
                            $where = "AND nombre like '%$nombre%'";
                        }

                        //paginador
                        $queryCuenta="SELECT COUNT(*) AS cuenta FROM productos $where";
                        $resCuenta = mysqli_query($con, $queryCuenta);
                        $rowCuenta = mysqli_fetch_assoc($resCuenta);
                        $totalRegistros = $rowCuenta['cuenta'];

                        $elementosPorPagina=6;
                        $totalPaginas = ceil($totalRegistros/$elementosPorPagina);
                        $paginaSelec = $_REQUEST['pagina'] ?? false;
                        if($paginaSelec==false){
                            $inicioLimite = 0;
                            $paginaSelec = 1;
                        }else{
                            $inicioLimite = ($paginaSelec-1) * $elementosPorPagina;
                        }
                        $limite=" limit $inicioLimite,$elementosPorPagina ";

                        //Mostrar productos
                        $query = "SELECT 
                        p.id,
                        p.nombre,
                        p.precio,
                        p.existencias,
                        f.web_path
                        FROM productos AS p
                        INNER JOIN productos_files AS pf ON pf.producto_id = p.id
                        INNER JOIN files AS f ON f.id=pf.file_id
                        $where
                        GROUP BY p.id
                        $limite";
                        $res = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($res)){
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card border-primary">
                                      <img class="card-img-top img-thumbnail" src="<?php echo $row['web_path'] ?>" alt="">
                                      <div class="card-body">
                                        <h2 class="card-title"><?php echo $row['nombre'] ?></h2>
                                        <p class="card-text"><strong>Precio: </strong><?php echo $row['precio'] ?></p>
                                        <p class="card-text"><strong>Existencias: </strong><?php echo $row['existencias'] ?></p>
                                        <a href="index.php?modulo=detalleProducto&id=<?php echo $row['id'] ?>" class="btn btn-primary">Ver</a>
                                      </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
                <?php 
                //Vista del paginador
                    if($totalPaginas>0){
                        ?>
                            <nav aria-label="Page navigation">
                              <ul class="pagination">
                                  <?php 
                                    if($paginaSelec!=1){
                                  ?>
                                <li class="page-item ">
                                  <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSelec-1); ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Anterior</span>
                                  </a>
                                </li>
                                <?php } ?>

                                <?php 
                                    for($i=1;$i<=$totalPaginas;$i++){
                                ?>
                                <li class="page-item <?php echo ($paginaSelec==$i)? "active":""; ?>">
                                    <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php } ?>
                                
                                <?php 
                                    if($paginaSelec!=$totalPaginas){
                                  ?>
                                <li class="page-item">
                                  <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSelec+1); ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Siguiente</span>
                                  </a>
                                </li>
                                <?php } ?>
                              </ul>
                            </nav>
                        <?php
                    }
                ?>