<?php require_once('inc/headerBlog.php'); ?>
<?php require_once('inc/SliderPost.php'); ?>


<?php
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    $views_query = "UPDATE `posts` SET `views` = views + 1 WHERE `posts`.`id` = $post_id";
    mysqli_query($con, $views_query);

    $query = "SELECT * FROM tbl_concurso WHERE id_con = $post_id";
    $run = mysqli_query($con, $query);
    if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_array($run);
        $id = $row['id_con'];
        $date = getdate($row['fecha_con']);
        $day = $date['mday'];
        $month = $date['month'];
        $year = $date['year'];
        $title = $row['titulo'];
        $image = $row['imagen'];
        $descripcion = $row['descripcion'];
        
    } else {
       // header('Location: blog.php');
    }
}
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post">
                    <div class="row">
                        <div class="col-md-2 post-date">
                            <div class="day"><?php echo $day; ?></div>
                            <div class="month"><?php echo $month; ?></div>
                            <div class="year"><?php echo $year; ?></div>
                        </div>
                        <div class="col-md-8 post-title">
                            <a href="post.php?post_id=<?php echo $id; ?>"><h2><?php echo $title; ?></h2></a>
                        </div>
                        
                        
                    </div>
                    <a href="img/<?php echo $image; ?>"><img src="img/<?php echo $image; ?>" alt="Imagen del post"></a>
                    <div class="desc">
                        <?php echo $descripcion; ?>
                    </div>

                    <div class="bottom">
                        <span class="sec"><i class="fa fa-comment"></i><a href="#"> Comentario</a></span>
                    </div>
                </div>

                

                
                <?php
                $c_query = "SELECT * FROM comments WHERE status = 'aprobado' and post_id = $post_id ORDER BY id DESC";
                $c_run = mysqli_query($con, $c_query);
                if (mysqli_num_rows($c_run) > 0) {
                    ?>
                    <div class="comment">
                        <h3><i class="fas fa-comment-dots"></i>  Comentario</h3>
                        <?php
                        while ($c_row = mysqli_fetch_array($c_run)) {
                            $c_id = $c_row['id'];
                            $c_name = $c_row['name'];
                            $c_username = $c_row['username'];
                            $c_image = $c_row['image'];
                            $c_comment = $c_row['comment'];
                            ?>
                            <hr>
                            <div class="row single-comment">
                                <div class="col-sm-2">
                                    <img src="img/<?php echo $c_image; ?>" alt="Imagen de perfil" class="img-circle">
                                </div>
                                <div class="col-sm-10">
                                    <h4><?php echo ucfirst($c_name); ?></h4>
                                    <p><?php echo $c_comment; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                }

                if (isset($_POST['submit'])) {
                    $cs_name = $_POST['name'];
                    $cs_email = $_POST['email'];
                    $cs_website = $_POST['website'];
                    $cs_comment = $_POST['comment'];
                    $cs_date = time();
                    if (empty($cs_name) or empty($cs_email) or empty($cs_comment)) {
                        $error_msg = "Los campos con (*) son requeridos";
                    } else {
                        $cs_query = "INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES (NULL, '$cs_date', '$cs_name', 'user', '$post_id', '$cs_email', '$cs_website', 'unknown-picture.png', '$cs_comment', 'pendiente')";
                        if (mysqli_query($con, $cs_query)) {
                            $msg = "Comentario enviado espere su Aprobación";
                            $cs_name = "";
                            $cs_email = "";
                            $cs_website = "";
                            $cs_comment = "";
                        } else {
                            $error_msg = "Comentario no enviado";
                        }
                    }
                }
                ?>

                <div class="comment-box">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="text-center"><i class="fas fa-comment-dots"></i>  Añadir Comentario</h1>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="full-name">Nombres:*</label>
                                    <input type="text" value="<?php
                                    if (isset($cs_name)) {
                                        echo $cs_name;
                                    }
                                    ?>" name="name" id="full-name" class="form-control" placeholder="Nombres">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:*</label>
                                    <input type="text" name="email" id="email" class="form-control" value="<?php
                                    if (isset($cs_email)) {
                                        echo $cs_email;
                                    }
                                    ?>" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="website">Red social:</label>
                                    <input type="text" name="website" id="website" class="form-control" value="<?php
                                    if (isset($cs_website)) {
                                        echo $cs_website;
                                    }
                                    ?>" placeholder="Sitio web">
                                </div>

                                <div class="form-group">
                                    <label for="comment">Mensaje:*</label>
                                    <textarea id="comment" name="comment" cols="30" rows="10" placeholder="Ingrese su mensaje..." class="form-control"><?php
                                        if (isset($cs_comment)) {
                                            echo $cs_comment;
                                        }
                                        ?></textarea>
                                </div>

                                <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
                                <?php
                                if (isset($error_msg)) {
                                    echo "<div class='alert alert-danger' style='color:red;><i class='fa fa-close'></i>$error_msg</div>";
//                                    echo "<span style='color:red;' class='pull-right'>$error_msg</span>";
                                } else if (isset($msg)) {
                                    echo "<div class = 'alert alert-success' role = 'alert' style = 'color:green;'><i class='fas fa-check'></i>$msg</div>";
//                                    echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <?php require_once('inc/sidebar.php'); ?>              
            </div>
        </div>
    </div>
</section>

<?php include_once './inc/contact_1.php'; ?>

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- /contact form -->	
<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
    });
</script>
<!-- //Calendar -->
<!-- gallery popup -->
<link rel="stylesheet" href="cssPaginaInicial/swipebox.css">
<script src="js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
    jQuery(function ($) {
        $(".swipebox").swipebox();
    });
</script>
<!-- //gallery popup -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- //flexSlider -->
<script src="js/responsiveslides.min.js"></script>
<script>
// You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!--search-bar-->
<script src="js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!--//tabs-->
<!-- smooth scrolling -->
<script type="text/javascript">
    $(document).ready(function () {

            * /
        $().UItoTop({easingType: 'easeOutQuart'});
        });
</script>

<div class="arr-w3ls">
    <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>

<div class="arr-w3ls">
    <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>
<?php require_once('inc/footer.php'); ?>
<?php include_once 'inc/revistaBlog.php'; ?>