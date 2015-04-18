<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $pageTitle ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
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
        <link rel="stylesheet" href="css/tabModule.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="profile.php" class="button small icon fa-user"><?php echo explode (' ',$_SESSION['user']['name'])[0];?></a></h1>
				<nav id="nav">
					<ul>
                        <li><a href="mypage.php" class="button icon fa-home">Home</a></li>
                        <li><a href="editaccount.php" class="button icon fa-cog">Settings</a></li>
                        <li><a href="logout.php" class="button icon fa-sign-out">Logout</a></li>			
					</ul>
				</nav>
			</header>