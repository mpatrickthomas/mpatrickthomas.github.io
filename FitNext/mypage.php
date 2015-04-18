<?php 
   //This test page is to tryout new layouts for mypage.php 
    require("common.php"); 

	$date = date('l, M d, Y');
	$tDate = date('Y-m-d');
	$curdate = new DateTime($tDate);
	
    if(empty($_SESSION['user'])) 
    { 
        header("Location: login.php?login=required");          
        die("Redirecting to login.php"); 
    } 

$query = " 
            SELECT 
                DATE_FORMAT(birthdate,'%m-%d-%Y') AS date,
                TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) AS age,
                weight,
                sex,
                picture,
                goal,
				calBurned,
				calConsumed,
				Registered
            FROM user_data 
            WHERE 
                id = :id 
        "; 
         
        $query_params = array( 
            ':id' => $_SESSION['user']['id'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("An error occured, please try again"); 
        } 

        $row = $stmt->fetch();
		
		$regdate = new DateTime($row['Registered']);
		
		//$rawNumDays = floor(($curdate - $row['Registered'])/(60*60*24));
		$interval = $regdate->diff($curdate);
		$rawNumDays = $interval->days;
		if($rawNumDays < 1){
			$numDays = 1;
		}
		else{
			$numDays = $rawNumDays;
		}
		
		$nBurn = (double) $row['calBurned'];
		$nCons = (double) $row['calConsumed'];
		$avgBurn = (double) ($nBurn / $numDays);
		$avgCon = (double) ($nCons / $numDays);
		$profilePic = $row['picture'];	
?>

<!-- Header -->
<?php 
    $pageTitle = "My Page"; 
    include( 'headerprivate.php' ); 
?>

<link rel="stylesheet" href="css/tabModule.css">
<script type="text/javascript" src="js/twitterfeed.js"></script>
<script src="js/tabModule.js"></script>
<script src="js/youtubesearch.js"></script>

<script> $(document).ready(function(){
	tabModule.init();
});</script>

<!-- Main -->
<section id="main" class="container">
	<span id="user-weight" data-weight="<?php echo $row['weight'];?>"></span>
        <span id="user-age" data-age="<?php echo $row['age'];?>"></span>
        <span id="user-sex" data-sex="<?php echo $row['sex'];?>"></span>
	<header>
		<div id="welcome">
			<div class="row">
				<div class="2u 12u(mobilep)">
                    <div id = "profilePictureDiv" style = 'background-image: url(<?php if(!empty($profilePic)){ echo $profilePic;} else { echo 'profile/default.png'; }?>)'>

                     </div>
				</div>
				<div class="8u 12u(mobilep)">
					<h2>Welcome, <?php echo $_SESSION['user']['name']; ?> !</h2>
					<a href="#main" class="button alt">Track your Calories</a>
					<a href="#videos" class="button alt">Start a Workout</a>
				</div>
				<div class="2u 12u(mobilep)">
					<p></p>
				</div>
			</div>
				<?php
					if(isset($_GET['error'])){
						$msg = $_GET['error'];
						if ($msg == "updated"){
								echo("<h3 class=\"no-error align-center\">Information updated successfully!</h3>");
						}
						if ($msg == "nochange"){
								echo("<h3 class=\"error align-center\">No changes were made</h3>");
						}
					}
				?>
        </div>
	</header>
	<section style="padding-top: 0;"id="main" class="container 80%">
        <div id="twitter-feed"></div> 
		<div class="tab tab-horiz">
			<ul class="tab-legend">
				<li class="active">Today</li>
				<li>Snapshot</li>
				<li>Totals</li>
				<li>Averages</li>
				<li>Get Active</li>
                <li>Get Healthy</li>
			</ul>
			<div class="12u">
				<ul class="tab-content">
					<li>
						<input type="hidden" name="menu" value="today">
						<h3 class="align-center">Here's your workout for today!</h3>
						<p class="align-center"><?php echo $date ?></p>
						<hr />
						<h4 class="align-center">Today is...</h4>
						<p class="align-center"><input type="button" class="select_input" value="ab day"></p>
						<a href="workoutplanner.php"><p class="align-center">Edit Workout Plan</p></a>
					</li>
					<li>
						<input type="hidden" name="menu" value="snapshot">
						<h3 class="align-center">How have you been doing so far?</h3>
                        <p class="align-center">As of today - <?php echo $date ?>:</p>
						<hr />
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
									<p class="align-center"><span class="icon major fa-heart accent4"></span></p>
									<p class="align-center">Current weight: <?php echo $row[ 'weight']; ?> lbs </p>
								</div>
								<div class="6u 12u(mobilep)">
									<p class="align-center"><span class="icon major fa-leaf accent2"></span></p>
									<p class="align-center">Goal weight: <?php echo $row[ 'goal']; ?> lbs </p>
								</div>
							</div>
						<br />
						<p class="align-center">Has this changed? Go ahead and <a href="profile.php">update your profile</a> so we can continue to find the best results for you!<p>
					</li>
					<li>
						<input type="hidden" name="menu" value="totals">
						<h3 class="align-center">Cumulative Stats</h3>
						<hr />
						<div class="row uniform 50%">
							<div class="6u 12u(mobilep)">
								<p class="align-center"><span class="icon major fa-bolt accent3"></span></p>
								<p class="align-center">You have burned</p>
								<h3 class ="align-center"><?php echo $row['calBurned']; ?></h3>
								<p class="align-center">Calories</p>
							</div>
							<div class="6u 12u(mobilep)">
								<p class="align-center"><span class="icon major fa-user-plus accent4"></span></p>
								<p class="align-center">You have accumulated</p>
								<h3 class ="align-center"><?php echo $row['calConsumed']; ?></h3>
								<p class="align-center">Calories</p>
							</div>
						</div>
					</li>
					<li>
						<input type="hidden" name="menu" value="averages">
						<h3 class="align-center">Averaged Stats</h3>
						<hr />
						<div class="row uniform 50%">
							<div class="6u 12u(mobilep)">
									<p class="align-center"><span class="icon major fa-fire accent2"></span></p>
									<p class="align-center">You have burned</p>
									<h3 class ="align-center"><?php echo sprintf("%.2f", $avgBurn); ?></h3>
									<p class="align-center">Calories</p>
							</div>
							<div class="6u 12u(mobilep)">
								<p class="align-center"> <span class="icon major fa-pie-chart accent5"></span></p>
								<p class="align-center">You have accumulated</p>
								<h3 class ="align-center"><?php echo sprintf("%.2f", $avgCon); ?></h3>
								<p class="align-center">Calories</p>
							</div>
						</div>
					</li>
                    <li>
						<input type="hidden" name="menu" value="getactive">
                        <h3 class="align-center">Get Active!</h3>
                        <p class="align-center">Here are some various workouts we found for you. Please select a body section to work on!</p>
                        <hr />
						<div id="videos">
                            <div class="row">
                                <div class="12u">
                                    <p class="align-center">
                                        <input type="button" class='search_input' value='Abs' />
                                        <input type="button" class='search_input' value='Chest' />
                                        <input type="button" class='search_input' value='Legs' />
                                        <input type="button" class='search_input' value='Arms' />
                                    </p>
                                </div>
                            </div>
                                <div class="row" id="youtube">
                                </div>
                            <p class="align-center" id="moreButton" style="display:none;"><input type="button" class="button alt search_more" value="More"></p>
                        </div>
					</li>
                    <li>
                        <h3 class = "align-center">Get Healthy!</h3>
                        <p class = "align-center">Do you know what's in the food you eat?</p>
                        
                        <script src="http://platform.fatsecret.com/js?key=b964306dc55c40e4891fb745c9fbf096&theme=blue"></script>

                        <script> 
                            fatsecret.setCanvasUrl('food.get', 'http://www.mpatrickthomas.github.io/FitNext/food.html'); 
                        </script>
                    </li>
				</ul>
			</div>
		</div>
	</section>
</section>

<!-- footer -->
<?php include('footer.php') ?>
