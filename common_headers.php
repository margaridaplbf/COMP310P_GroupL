
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Music for All| Home :: &copy; w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Snow tour Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <script type="text/javascript"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Chocolat-CSS -->
    <link rel="stylesheet" href="assets/css/chocolat.css" type="text/css" media="all">
    <link href="//fonts.googleapis.com/css?family=Montserrat+Alternates:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">


    <link href="assets/css/sweetalert.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="assets/js/sweetalert.min.js"></script>

    <!--//fonts-->
    <!-- Supportive-JavaScript -->
    <script src="assets/js/modernizr.js"></script>

</head>
<body>
<!--Header-->
<div class="header" id="home">
    <!--Top-Bar-->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="header-nav">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="navbar-brand" href="index.php">Music for All<sup><i class="fa fa-calendar"
                                                                                          aria-hidden="true"></i><sup></a>
                        </h1>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav class="cl-effect-15" id="cl-effect-15">
                            <ul>
                                <li><a href="index.php#home" data-hover="Home">Home</a></li>
                                <li><a href="artist_view.php" data-hover="Artists">Artists</a></li>
                                <li><a href="upcomming_event_view.php" data-hover="Events">Events</a></li>
                                <li><a href="category_view.php" data-hover="Categories">Categories</a></li>
                                <li><a href="index.php#contact" data-hover="Contact">Contact</a></li>

                                <?php
                                if (!isset($_SESSION['user_id'])) {
                                    echo "
                                            
                                        ";
                                }

                                else {

                                    switch ($user_data[0]['user_type']) {
                                        case "participant":
                                            echo "
                                                        <li class=\"dropdown\">
                                                            <a data-toggle=\"dropdown\" class=\"dropdown-toggle\"><span class=\"glyphicon glyphicon-user\"></span> ".$user_data[0]['first_name']." ".$user_data[0]['last_name']." <b class=\"caret\"></b></a>
                                                            <ul class=\"dropdown-menu\">
                                                                <li><a href=\"profile.php\"><span class=\"glyphicon glyphicon-user\"></span> Profile</a></li>
                                                                <li><a href=\"reviews.php\"><span class=\"glyphicon glyphicon-eye-open\"></span> Your Reviews</a></li>
                                                                <li><a href=\"view_tickets.php\"><span class=\"glyphicon glyphicon-stats\"></span> Tickets Bought</a></li>
                                                                <li><a href=\"sign_out.php\"><span class=\"glyphicon glyphicon-off\"></span> Logout</a></li>
                                                            </ul>
                                                        </li>
                                                    ";
                                            break;

                                        case "host":
                                            echo "
                                                        <li class=\"dropdown\">
                                                            <a data-toggle=\"dropdown\" class=\"dropdown-toggle\"><span class=\"glyphicon glyphicon-user\"></span> ".$user_data[0]['first_name']." ".$user_data[0]['last_name']." <b class=\"caret\"></b></a>
                                                            <ul class=\"dropdown-menu\">
                                                                <li><a href=\"profile.php\"><span class=\"glyphicon glyphicon-user\"></span> Profile</a></li>
                                                                <li><a href=\"reviews.php\"><span class=\"glyphicon glyphicon-eye-open\"></span> Your Reviews</a></li>
                                                                <li><a href=\"view_events.php\"><span class=\"glyphicon glyphicon-music\"></span> Event Hosting</a></li>
                                                                <li><a href=\"sign_out.php\"><span class=\"glyphicon glyphicon-off\"></span> Logout</a></li>
                                                            </ul>
                                                        </li>
                                                    ";
                                            break;

                                        case "both":
                                            echo "
                                                        <li class=\"dropdown\">
                                                            <a data-toggle=\"dropdown\" class=\"dropdown-toggle\"><span class=\"glyphicon glyphicon-user\"></span> ".$user_data[0]['first_name']." ".$user_data[0]['last_name']." <b class=\"caret\"></b></a>
                                                            <ul class=\"dropdown-menu\">
                                                                <li><a href=\"profile.php\"><span class=\"glyphicon glyphicon-user\"></span> Profile</a></li>
                                                                <li><a href=\"reviews.php\"><span class=\"glyphicon glyphicon-eye-open\"></span> Your Reviews</a></li>
                                                                <li><a href=\"view_tickets.php\"><span class=\"glyphicon glyphicon-stats\"></span> Tickets Bought </a></li>
                                                                <li><a href=\"view_events.php\"><span class=\"glyphicon glyphicon-music\"></span> Event Hosting</a></li>
                                                                <li><a href=\"sign_out.php\"><span class=\"glyphicon glyphicon-off\"></span> Logout</a></li>
                                                            </ul>
                                                        </li>
                                                    ";
                                            break;
                                    }


                                }
                                ?>


                            </ul>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>
    </div>
