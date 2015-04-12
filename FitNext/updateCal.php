<?php 
    require("common.php"); 
	
    if(empty($_SESSION['user'])) 
    { 
        header("Location: login.php?login=required");          
        die("Redirecting to login.php"); 
    } 

 $query = " 
        SELECT 
            DATE_FORMAT(birthdate,'%Y-%m-%d') AS date,
            TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) AS age,
            calBurned,
	    calConsumed
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
        die("An error occurred, please try again"); 
    } 

    $row = $stmt->fetch(); 

    if(!empty($_POST)) {
        $correct = true;

	$correct = true;
        if(empty($_POST['bCal'])) {
	    $_POST['bCal'] = 0; 
        } 
        if(empty($_POST['cCal'])) { 
	    $_POST['cCal'] = 0;
        } 	
	
        if($correct){
            $query = " 
                UPDATE user_data
                SET
                    calBurned = calBurned + :bCal,
                    calConsumed = calConsumed + :cCal
                WHERE 
                    id = :id 
            "; 

			$query_params = array( 
						':bCal' => $_POST['bCal'],
						':cCal' => $_POST['cCal'],
						':id' => $_SESSION['user']['id']
			); 
			try { 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			catch(PDOException $ex) { 
				die("An error occurred, please try again". $ex->getMessage()); 
			}
			header("Location: mypage.php?error=updated"); 
			die("Redirecting to mypage.php");  
        }
    }

	
	
?>

<!-- Header -->
<?php 
    $pageTitle = "Update Calories"; 
    include( 'headerprivate.php' ); 
?>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<!-- Main -->
    <section id="main" class="container">
        <span id="user-weight" data-weight="<?php echo $row['weight'];?>"></span>
        <span id="user-age" data-age="<?php echo $row['age'];?>"></span>
        <span id="user-sex" data-sex="<?php echo $row['sex'];?>"></span>
        <header>
            <h2>How did you do today?</h2>
			<p>Keep track of your caloric intake!</p>
        </header>
		
        <div class="box">
			<h3 class="align-center">Let's see...</h3>
			<div class="center">
						<form enctype="multipart/form-data" method="post" action="updateCal.php">
						<div class="row uniform 50%">
							<div class="6u 12u(mobilep)">
								<p class="align-center">How many calories did you burn today?</p>
								<input type="text" name="bCal" id="bCal" value="<?php if(isset($_GET['bCal'])) { echo $_GET['bCal'];} else{echo $_POST['bCal'];} ?>" placeholder="<?php if (isset($_GET['bCal'])){echo $_GET['bCal'];}else{echo "0";} ?> " />
							</div>
							<div class="6u 12u(mobilep)">
								<p class="align-center">How many calories did you accumulate today?</p>
								<input type="text" name="cCal" id="cCal" value="<?php echo $_POST['cCal'];?>" placeholder="0" />
							</div>
						</div>
						<br />
						<p class="align-center"><input type="submit" value="Show me!" /></p>
					</form>
			</div>
		</div>
    </section>

<!-- footer -->
<?php include('footer.php') ?>
                                                                                                                        