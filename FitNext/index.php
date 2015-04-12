<!-- Header -->
<!DOCTYPE HTML>
<html>
	<head>
		<title>FitNext</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="Fitness" content="" />
		<meta name="Fitness Tracking" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/myscript.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
        <link rel="stylesheet" href="css/mystyle.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.php">FitNext</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="signup.php" class="button special">Sign Up</a></li>
						<li><a href="login.php" class="button icon fa-sign-in">Login</a></li>
					</ul>
				</nav>
			</header>

<!-- Banner -->
    <section id="banner">
        <video preload="auto" autoplay="autoplay" loop="loop" id="bgvideo">
            <source src="video/headervideo.webm" type="video/webm">
            <source src="video/headervideo.mp4" type="video/mp4">
        </video>
        <div id="bgvideoblur"></div>
        <h2>FitNext</h2>
        <p>The healthiest site on the internet</p>
        <ul class="actions">
            <li><a href="signup.php" class="button special">Sign Up</a></li>
            <li><a href="#moreinfo" class="button">Learn More</a></li>
        </ul>
    </section>

<!-- Main -->
    <section id="main" class="container">

        <section class="box special">
            <header class="major">
                <h2>Introducing the ultimate web app
                <br />
                for doing stuff with your health and fitness</h2>
                <p>Fitness just got personal. We access several different services across the web to bring you the best and the finest ways to change your life.</p>
            </header>
            <span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
        </section>

        <section id="moreinfo" class="box special features">
            <div class="features-row">
                <section>
                    <span class="icon major fa-cutlery accent2"></span>
                    <h3>Healthy eating</h3>
                    <p>Given your diatary preferences and an immense level of recipes, Work it will generate amazing meals that meet your intake levels!</p>
                </section>
                <section>
                    <span class="icon major fa-bicycle accent3"></span>
                    <h3>Exercise it</h3>
                    <p>As you build your health portfolio, your routine will adjust to you like your favorite pair of jeans.</p>
                </section>
            </div>
            <div class="features-row">
                <section>
                    <span class="icon major fa-users accent4"></span>
                    <h3>Share away</h3>
                    <p>Connecting with social media is easier than ever. View your friend's status and be inspired back!</p>
                </section>
                <section>
                    <span class="icon major fa-heart accent5"></span>
                    <h3>Track your progress</h3>
                    <p>See how far you've come from the day you started by tracking your progress</p>
                </section>
            </div>
        </section>

        <div class="row">
            <div class="6u 12u(narrower)">

                <section class="box special">
                    <span class="image featured"><img src="images/pic02.jpg" alt="" /></span>
                    <h3>Sed lorem adipiscing</h3>
                    
                    <ul class="actions">
                        <li><a href="#" class="button alt">Learn More</a></li>
                    </ul>
                </section>

            </div>
            <div class="6u 12u(narrower)">

                <section class="box special">
                    <span class="image featured"><img src="images/pic03.jpg" alt="" /></span>
                    <h3>Accumsan integer</h3>
                    <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Learn More</a></li>
                    </ul>
                </section>

            </div>
        </div>

    </section>

<!-- CTA -->
    <section id="cta">

        <h2>Sign up for our fitness tips newsletter</h2>
        <p>We pinky promise not to share your email with others</p>

        <form method="get" action="signup.php">
            <div class="row uniform 50%">
                <div class="8u 12u(mobilep)">
                    <input style="font-size:1em;" type="email" name="email" id="email" placeholder="Email Address" />
                </div>
                <div class="4u 12u(mobilep)">
                    <input type="submit" value="Sign Up" class="fit" />
                </div>
            </div>
        </form>

    </section>
    <script>
        $( document ).ready(function() {
            $('#bgvideo').get(0).play();
        });
    </script>

<!-- Footer -->
<?php include('footer.php'); ?>
