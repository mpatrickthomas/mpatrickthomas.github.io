
<?php 
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
		
?>

<!-- Header -->
<?php 
    $pageTitle = "My Page"; 
    include( 'headerprivate.php' ); 
?>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<!-- Main -->

<div id="twitter-feed"></div>

<!--Goal stuff-->
<div id="snapshot">
    <h3>My Snapshot</h3>
    <p>Current:
        <?php echo $row[ 'weight']; ?>lb </p>
    <p>Goal:
        <?php echo $row[ 'goal']; ?>lb </p>
    <p>Calories:
        <?php echo $row[ 'calConsumed']; ?>cal </p>

</div>

<!--End Goal Stuff-->

    <section id="main" class="container">
        <span id="user-weight" data-weight="<?php echo $row['weight'];?>"></span>
        <span id="user-age" data-age="<?php echo $row['age'];?>"></span>
        <span id="user-sex" data-sex="<?php echo $row['sex'];?>"></span>
        <header>
            
            
            
            <!--Twitter stuff-->

            <script type="text/javascript" src="js/twitterfeed.js"></script>

            <!--End Twitter Stuff-->
            
            
            <div id="welcome">
                <h2>Welcome, <?php echo $_SESSION['user']['name']; ?>! </h2>

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
                <a href="#stats" class="button alt">Track your Calories</a>
                <a href="#videos" class="button alt">Start a Workout</a>
            </div>
        </header>
		<section id="stats" class="box special features">
             <div class="row">
                 <div class="8u 12u(mobilesp)">
                     <h3 class="align-center">Track your Calories!</h3>
			         <p class="align-center">As of <?php echo $date; ?></p>
                        <div class="features-row">
                            <section>
                                <span class="icon major fa-bolt accent3"></span>
                                <p class="align-center">You have burned</p>
                                <h3 class ="align-center"><?php echo $row['calBurned']; ?></h3>
                                <p class="align-center">Calories</p>
                            </section>
                            <section>
                                <span class="icon major fa-user-plus accent4"></span>
                                <p class="align-center">You have accumulated</p>
                                <h3 class ="align-center"><?php echo $row['calConsumed']; ?></h3>
                                <p class="align-center">Calories</p>
                            </section>
                        </div>
                        <div class="features-row">
                            <section>
                                <span class="icon major fa-fire accent2"></span>
                                <p class="align-center">On average, you burn</p>
                                <h3 class ="align-center"><?php echo $avgBurn; ?></h3>
                                <p class="align-center">Calories per day</p>
                            </section>
                            <section>
                                <span class="icon major fa-pie-chart accent5"></span>
                                <p class="align-center">On average, you consume</p>
                                <h3 class ="align-center"><?php echo $avgCon; ?></h3>
                                <p class="align-center">Calories per day.</p>
                            </section>
                        </div>
                     </div>
                 <div class="4u 12u(mobilep)">
                     <h4 class="align-center">Here's your today's workout!</h4>
			         <a href="workoutplanner.php"><p class="align-center">Edit Workout Plan</p></a>
                     <ul class="tab-legend">
                        <li>
                            <input type="button" class="button fit" value='ab day' />
                        </li>
                     </ul>
                 </div>
            </div>
		</section>
		
		<hr />
		
			<div id="videos" class="box">
            <h3 class="align-center">Get Active!</h3>
            <p class="align-center">Here are some various workouts we found for you. Please select a body section to work on!</p>
    
            <div id="center">       
                <script src="/FinalProject/js/youtubesearch.js"></script>
                <input type="button" class='search_input' value='abs' />
                <input type="button" class='search_input' value='chest' />
                <input type="button" class='search_input' value='legs' />
                <input type="button" class='search_input' value='arms' />
                <hr/>
            </div>   


            <div class="row" id="youtube"> 

            </div>

            <p class="align-center" id="moreButton" style="display:none;"><input type="button" class="button alt search_more" value="More"></p>	
            
        </div>
    </section>

<!-- footer -->
<?php include('footer.php') ?>