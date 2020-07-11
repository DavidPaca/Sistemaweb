<div class="widgets">
    <form action="blog.php" method="post">
        <div class="input-group">
            <input type="text" name="search-title" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <input type="submit" value="Buscar..." class="btn btn-default" name="search">
            </span>
        </div><!-- /input-group -->
    </form>
</div><!--widgets close-->

<div class="widgets">
    <div class="popular">
        <h4 class="text-center"><i class="fas fa-star"></i>  Destacados</h4>
        <?php
        $p_query = "SELECT * FROM tbl_eventos WHERE estado = 'publico' ";  /*ORDER BY views DESC LIMIT 5*/
        $p_run = mysqli_query($con, $p_query);
        if (mysqli_num_rows($p_run) > 0) {
            while ($p_row = mysqli_fetch_array($p_run)) {
                $p_id = $p_row['id_eventos'];
               /* $p_date = getdate($p_row['date']);
                $p_day = $p_date['mday'];
                $p_month = $p_date['month'];
                $p_year = $p_date['year'];*/
                $p_title = $p_row['titulo'];
                $p_image = $p_row['imagen_evento'];
                ?>
                <hr>
                <div class="row">
                    <div class="col-xs-4">
                        <a href="post.php?post_id=<?php echo $p_id; ?>"><img src="img/<?php echo $p_image; ?>" alt="Image 1"></a>
                    </div>
                    <div class="col-xs-8 details">
                        <a href="post.php?post_id=<?php echo $p_id; ?>"><h6><?php echo $p_title; ?></h6></a>
                     <!--   <p><i class="far fa-calendar-alt"></i>  <?php // echo "$p_day $p_month $p_year"; ?>  </p>  -->
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<h3>Información no disponible</h3>";
        }
        ?>

    </div>
</div><!--widgets close-->

<div class="widgets">
    <div class="popular">
        <h4 class="text-center"><i class="fas fa-clock"></i>  Recientes</h4>
        <?php
        $p_query = "SELECT * FROM tbl_eventos WHERE estado = 'publico' ORDER BY id_eventos DESC LIMIT 5";
        $p_run = mysqli_query($con, $p_query);
        if (mysqli_num_rows($p_run) > 0) {
            while ($p_row = mysqli_fetch_array($p_run)) {
                $p_id = $p_row['id_eventos'];
               /* $p_date = getdate($p_row['date']);
                $p_day = $p_date['mday'];
                $p_month = $p_date['month'];
                $p_year = $p_date['year'];*/
                $p_title = $p_row['titulo'];
                $p_image = $p_row['imagen_evento'];
                ?>
                <hr>
                <div class="row">
                    <div class="col-xs-4">
                        <a href="post.php?post_id=<?php echo $p_id; ?>"><img src="img/<?php echo $p_image; ?>" alt="Image 1"></a>
                    </div>
                    <div class="col-xs-8 details">
                        <a href="post.php?post_id=<?php echo $p_id; ?>"><h6><?php echo $p_title; ?></h6></a>
                       <!-- <p><i class="far fa-calendar-alt"></i>   <?php   //echo "$p_day $p_month $p_year"; ?>  </p>   -->
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<h3>Información no disponible</h3>";
        }
        ?>

    </div>
</div><!--widgets close-->

<div class="widgets">
    <div class="popular">
        <h4 class="text-center"><i class="fas fa-list-ul"></i> Categorías</h4>
        <hr>
        <div class="row">
            <div class="col-xs-6">
                <ul>
                    <?php
                    $c_query = "SELECT * FROM tbl_desc_evento";
                    $c_run = mysqli_query($con, $c_query);
                    if (mysqli_num_rows($c_run) > 0) {
                        $count = 2;
                        while ($c_row = mysqli_fetch_array($c_run)) {
                            $c_id = $c_row['id_descevento'];
                            $c_category = $c_row['descripcion'];
                            $count = $count + 1;

                            if (($count % 2) == 1) {
                                echo "<li><a href='blog.php?cat=" . $c_id . "'>" . (ucfirst($c_category)) . "</a></li>";
                            }
                        }
                    } else {
                        echo "<p>No hay categorías</p>";
                    }
                    ?>
                </ul>
            </div>
            <div class="col-xs-6">
                <ul>
                    <?php
                    $c_query = "SELECT * FROM tbl_desc_evento";
                    $c_run = mysqli_query($con, $c_query);
                    if (mysqli_num_rows($c_run) > 0) {
                        $count = 2;
                        while ($c_row = mysqli_fetch_array($c_run)) {
                            $c_id = $c_row['id_descevento'];
                            $c_category = $c_row['descripcion'];
                            $count = $count + 1;

                            if (($count % 2) == 0) {
                                echo "<li><a href='blog.php?cat=" . $c_id . "'>" . (ucfirst($c_category)) . "</a></li>";
                            }
                        }
                    } else {
                        echo "<p>No hay categorías</p>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--widgets close-->

<div class="widgets">
    <div class="categories">
        <h4 class="text-center"><i class="fas fa-users"></i>  Redes sociales</h4>
        <hr>
        <div class="row">
            <div class="col-xs-4">
                <a href="http://www.facebook.com"><i class="fab fa-facebook fa-3x"></i></a>
            </div>
            <div class="col-xs-4">
                <a href="http://www.twitter.com"><i class="fab fa-twitter-square fa-3x"></i></a>
            </div>
            <div class="col-xs-4">
                <a href="http://www.google.com"><i class="fab fa-google-plus-square fa-3x"></i></a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-4">
                <a href="http://www.linkedin.com"><i class="fab fa-linkedin fa-3x"></i></a>
            </div>
            <div class="col-xs-4">
                <a href="http://www.skype.com"><i class="fab fa-skype fa-3x"></i></a>
            </div>
            <div class="col-xs-4">
                <a href="http://youtube.com"><i class="fab fa-youtube fa-3x"></i></a>
            </div>
        </div>
    </div>
</div><!--widgets close-->      