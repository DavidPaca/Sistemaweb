<?php require_once('inc/headerBlog.php'); ?>
</head>
<body>
    <?php
    require_once('inc/SliderBlog.php');
/*
    $number_of_posts = 3;

    if (isset($_GET['page'])) {
        $page_id = $_GET['page'];
    } else {
        $page_id = 1;
    }

    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        $cat_query = "SELECT * FROM categories WHERE id = $cat_id";
        $cat_run = mysqli_query($con, $cat_query);
        $cat_row = mysqli_fetch_array($cat_run);
        $cat_name = $cat_row['category'];
    }


    if (isset($_POST['search'])) {
        $search = $_POST['search-title'];
        $all_posts_query = "SELECT * FROM posts WHERE status = 'publico'";
        $all_posts_query .= " and tags LIKE '%$search%'";
        $all_posts_run = mysqli_query($con, $all_posts_query);
        $all_posts = mysqli_num_rows($all_posts_run);
        $total_pages = ceil($all_posts / $number_of_posts);
        $posts_start_from = ($page_id - 1) * $number_of_posts;
    } else {
        $all_posts_query = "SELECT * FROM posts WHERE status = 'publico'";
        if (isset($cat_name)) {
            $all_posts_query .= " and categories = '$cat_name'";
        }
        $all_posts_run = mysqli_query($con, $all_posts_query);
        $all_posts = mysqli_num_rows($all_posts_run);
        $total_pages = ceil($all_posts / $number_of_posts);
        $posts_start_from = ($page_id - 1) * $number_of_posts;
    }*/
    ?>

    <br>
    <br>
    <br>
    <!--**************desde aqui se puede modificar*****************-->

    <!-- Gallery -->
<section class="portfolio-w3ls" id="gallery">
    <h3 class="title-w3-agileits title-black-wthree">Nuestra galería</h3>
    <!--            <div class="col-md-3 gallery-grid gallery1">
                    <a href="images/g1.jpg" class="swipebox"><img src="images/g1.jpg" class="img-responsive" alt="/">
                        <div class="textbox">
                            <h4>FÁBRICA IDEAS
                            </h4>
                            <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                        </div>
                    </a>
                </div>-->

    <?php
        $c_query = "SELECT * FROM tbl_media";
        $c_run = mysqli_query($con, $c_query);            
    ?>
        
    <?php
    while ($c_row = mysqli_fetch_array($c_run)) {
        $c_id = $c_row['id_media'];                           
        $c_image = $c_row['image'];
        //echo($c_id);
        //echo($c_image);      
        
    ?>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb gallery-grid gallery1" >
            <a href="media/<?php echo $c_image; ?>" class="swipebox">
                <img src="media/<?php echo $c_image; ?>" width="125px" height="205px" alt="/">
                <div class="textbox">
                    <h4>CDI
                    </h4>
                    <!--<p><img src="img/logoescudoGADM.png" width="525px" height="305px" ></p>-->
                </div>
            </a>
        </div>
    <?php } ?>
   
    <div class="clearfix"> </div>
</section>
<!-- //gallery -->
<br>
<br>


<?php require_once './inc/revistaBlog.php'; ?>
<?php require_once './inc/contact_1.php'; ?>


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

<!--search-bar para la barra de busqueda-->
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