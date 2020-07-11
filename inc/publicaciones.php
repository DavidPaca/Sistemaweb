<!-- publicaciones & concursos -->


<div class="plans-section" id="rooms">
    <div class="container">
        <h3 class="title-w3-agileits title-black-wthree">Concursos
        </h3>
        <!--consulta y hallar valores-->
        <?php
            $cont;
            $sqlcon="SELECT * FROM tbl_concurso ";
            $result4=$con->query($sqlcon);
            //$row4 = mysqli_fetch_assoc($result4);
            //echo($row4['id_doc']);
            while ($row4 = mysqli_fetch_assoc($result4)) {
                $id_con=$row4['id_con'];
                $titulo=$row4['titulo'];
                $descripcion=$row4['descripcion'];
                $imagen=$row4['imagen'];
                $fecha_con=$row4['fecha_con'];
                /*echo($id_con);
                echo($titulo);
                echo($descripcion);
                echo($imagen);
                echo($fecha_con);*/ 
            
            
        ?>
        <div class="priceing-table-main">
            <div class="col-md-3 price-grid">
                <div class="price-block agile">
                    <div class="price-gd-top">
                        <img src="img/<?php echo $imagen; ?>" alt=" imagen " width="50px" height="160px" >
                        

                        <h4><?php echo($titulo) ?></h4>
                    </div>

                    <div class="price-gd-bottom">
                        
                        <div class="price-list">
                        
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>

                            </ul>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="price-selet">
                            <!--<h3 class="text-justify"><span> Pro</span>Ciencia</h3>-->
                            <!--<h3><span>$</span>320</h3>-->	

                            <a href="concurso.php?post_id=<?php echo $id_con; ?>" class="btn btn-primary">Ver más</a>
                            <!--<a href="revista.php" > Ver más </a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php } ?>
            <div class="clearfix"> </div>
            

    </div>
</div>
<!--// publicaciones & concursos-->
