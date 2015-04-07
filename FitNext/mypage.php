<?php 
    require("common.php"); 

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
                goal
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
?>

<!-- Header -->
<?php 
    $pageTitle = "My Page"; 
    include( 'headerprivate.php' ); 
?>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!--Twitter stuff-->

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>

<div id="twitter-feed" class="align-center"></div>

<!--End Twitter Stuff-->
<div align = "center">
   <h2>Welcome <?php echo $_SESSION['user']['name']; ?> </h2>
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
        <div class="box">
<!--            <span class="image featured"><img src="images/headerimg.jpg" alt="" /></span>-->
            <h3 class="align-center">Get Active!</h3>
            <p class="align-center">Here are some various workouts we found for you. Please select a body section to work on!</p>
    
            <div id="center" align = "center">       
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