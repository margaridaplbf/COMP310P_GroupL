<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script>
    $(function () {
        $("#slider").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 1000,
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

<!-- Calendar -->
<link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <script>
    $(function() {
        $( "#datepicker,#datepicker1" ).datepicker();
    });
</script>

<script src="js/jquery.chocolat.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.w3portfolioaits-item a').Chocolat();
    });
</script>

<script src="js/classie.js"></script>
    <script src="js/helper.js"></script>
    <script src="js/grid3d.js"></script>
    <script>
    new grid3D( document.getElementById( 'grid3d' ) );
</script>

<script src="js/SmoothScroll.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling-bottom-to-top -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
