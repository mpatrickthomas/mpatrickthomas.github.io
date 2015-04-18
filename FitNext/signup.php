<?php      
    require("common.php"); 
    $nameError = $emailError = $usernameError = $captchaError = $passwordError = $passwordRepeatError = $passwordNotSameError = '';

    if(!empty($_POST)) 
    { 
    	$correct = true;

        if(empty($_POST['name'])) 
        { 
            $nameError = "Please enter your name"; 
			$correct = false;
        } 
        
        if(empty($_POST['email'])) 
        { 
            $emailError = "Please enter an email"; 
			$correct = false;
        } else {
                
                $query = " 
		            SELECT 
		                id 
		            FROM user_info 
		            WHERE 
		                email = :email 
		        "; 
		         
		        $query_params = array( 
		            ':email' => $_POST['email'] 
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
		         
		        if($row) { 
					$emailError = "This email has already been registered, please try another one"; 
            		$correct = false;
		        }    
            
        }
        
        if(empty($_POST['username'])) 
        { 
            $usernameError = "Please enter a username"; 
            $correct = false;
        } else {
	        	$query = " 
		            SELECT 
		                id 
		            FROM user_info 
		            WHERE 
		                username = :username 
		        "; 
		         
		        $query_params = array( 
		            ':username' => $_POST['username'] 
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
		         
		        if($row) { 
					$usernameError = "This username is already registered, please try another one"; 
            		$correct = false;
		        } 
        	
        }
        
        if(empty($_POST['password'])) 
        { 
            $passwordError = "Please enter a password"; 
            $passwordRepeatError = "Please re-type your password"; 
            $correct = false;

        } 
        
        if(empty($_POST['passwordRepeat'])) 
        { 
            $passwordError = "Please enter a password"; 
            $passwordRepeatError = "Please re-type your password"; 
            $correct = false;

        } 
        if($_POST['password'] != $_POST['passwordRepeat'] && $correct){
            $passwordNotSameError = "Your passwords don't match. Please try again"; 
            $correct = false;
        }
        
        if(empty($_POST['question'])) 
        { 
            $questionError = "Please select a question"; 
			$correct = false;
        } 
        if(empty($_POST['answer'])) 
        { 
            $answerError = "Please type an answer";
            $correct = false;
        } 
        
        include_once 'securimage/securimage.php';
        $securimage = new Securimage();
        
        if ($securimage->check($_POST['captcha_code']) == false) {
            $captchaError = "The security code entered was incorrect";
            $correct = false;
        }

        if($correct){
	        $query = " 
	            INSERT INTO user_info ( 
                    name,
	                email,
	                username,
	                password,
                    securityQuestion,
                    securityAnswer,
                    salt
	            ) VALUES ( 
	                :name,
	                :email,
	                :username,
                    :password,
                    :securityQuestion,
                    :securityAnswer,
	                :salt 
	            ) 
	        "; 
	         
	        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 

	        $password = hash('sha256', $_POST['password'] . $salt); 
	          
	        for($round = 0; $round < 65536; $round++) 
	        { 
	            $password = hash('sha256', $password . $salt); 
	        } 
            
	        $query_params = array( 
	            ':name' => $_POST['name'],
	            ':email' => $_POST['email'],
	            ':username' => $_POST['username'],
	            ':password' => $password, 
	            ':securityQuestion' => $_POST['question'], 
	            ':securityAnswer' => $_POST['answer'], 
	            ':salt' => $salt
	        ); 
	        try 
	        { 
	            $stmt = $db->prepare($query); 
	            $result = $stmt->execute($query_params); 
	        } 
	        catch(PDOException $ex) 
	        { 
                echo $ex->getMessage();
                die("An error occured, please try again"); 
            }
	         
            $lastID = $db->lastInsertId();
			$date = date('Y-m-d');
            $query = " 
	            INSERT INTO user_data ( 
                    weight,
	                picture,
	                goal,
	                sex,
                    id,
					calBurned,
					calConsumed,
					Registered
	            ) VALUES ( 
	                :weight,
	                :picture,
	                :goal,
                    :sex,
                    :id,
					:calBurned,
					:calConsumed,
					:Registered
	            ) 
	        ";
            $query_params = array( 
	            ':weight' => '0',
	            ':picture' => 'profile/default.png',
	            ':goal' => '',
	            ':sex' => '', 
	            ':id' => $lastID,
				':calBurned' => '0',
				':calConsumed' => '0',
				':Registered' => $date
	        );
            try 
	        { 
	            $stmt = $db->prepare($query); 
	            $result = $stmt->execute($query_params); 
	        } 
	        catch(PDOException $ex) 
	        { 
                echo $ex->getMessage();
                die("An error occured inserting, please try again"); 
            }
            $query = " 
	            INSERT INTO user_workout ( 
                    id,
                    monday,
                    tuesday,
                    wednesday,
                    thursday,
                    friday,
                    saturday,
                    sunday
	            ) VALUES ( 
	                :id,
                    :monday,
                    :tuesday,
                    :wednesday,
                    :thursday,
                    :friday,
                    :saturday,
                    :sunday
	            ) 
	        ";
            $query_params = array( 
	            ':id' => $lastID,
	            ':monday' => '',
	            ':tuesday' => '',
	            ':wednesday' => '', 
	            ':thursday' => '',
				':friday' => '',
				':saturday' => '',
				':sunday' => ''
	        );
            try 
	        { 
	            $stmt = $db->prepare($query); 
	            $result = $stmt->execute($query_params); 
	        } 
	        catch(PDOException $ex) 
	        { 
                echo $ex->getMessage();
                die("An error occured inserting, please try again"); 
            }
            header("Location: login.php?account=created");          
	        die("Redirecting to login.php");
	    }
    } 
?> 

<!-- Header -->
<?php 
    $pageTitle = "Signup"; 
    include( 'header.php' ); 
?>

<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2>Sign up!</h2>
        <p>Let's get your account setup first.</p>
    </header>
    <div class="box">
        <form method="post" action="signup.php">
             <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $nameError;?></span>
                    <input type="text" name="name" id="name" value="<?php echo $_POST['name'];?>" placeholder="Name" />
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $emailError;?></span>
                    <!--- <input type="email" name="email" id="email" value="<?php //echo $_POST['email'];?>" placeholder="Email" /> --->
					<input type="email" name="email" id="email" value="<?php if(isset($_GET['email'])) { echo $_GET['email'];} else{echo $_POST['email'];} ?>" placeholder="Email" />
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $usernameError;?></span>
                    <input type="text" name="username" id="username" value="<?php echo $_POST['username'];?>" placeholder="Username" />
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="6u 12u(mobilep)">
                    <span class="error"><?php echo $passwordError;?></span>
                    <input type="password" name="password" id="password" value="" placeholder="Password" />
                </div>
                <div class="6u 12u(mobilep)">
                    <span class="error"><?php echo $passwordRepeatError;?></span>
                    <input type="password" name="passwordRepeat" id="passwordRepeat" value="" placeholder="Re-type your password" />
                </div>
                <div class="row uniform 50%">
                    <div class="12u">
                        <span class="error"><?php echo $passwordNotSameError;?></span>
                    </div>
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $questionError;?></span>
                    <select name = "question" style="font-size: 1.3em;">
                        <option value="" disabled selected>Select a question</option>
                        
                        <option value="What is the first name of the person you first kissed">What is the first name of the person you first kissed?</option>
                        <option value="What was your favorite sport in high school?">What was your favorite sport in high school?</option>
                        <option value="What is your favorite team?">What is your favorite team?</option>
                        <option value="What school did you attend for sixth grade?">What school did you attend for sixth grade?</option>
                        <option value="In what town was your first job?">In what town was your first job?</option>
                        <option value="In what city or town did your mother and father meet?">In what city or town did your mother and father meet?</option>
                        <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                    </select>
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $answerError;?></span>
                    <input type="text" name="answer" id="answer" value="<?php echo $_POST['answer'];?>" placeholder="Answer" />
                </div>
            </div>
            <br/>
            <p class="align-center">Just so we know that you are not a robot, enter the letters you see below</p>
            <div class="row uniform 50%">
                <div class="6u 12u(mobilep)">
                    <input type="text" name="captcha_code" size="10" maxlength="6" placeholder="Enter the captcha"/>
                </div>
                <div class="6u 12u(mobilep)">
                    <p class="align-center">
                        <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" /><br/>
                        <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a></p>
                </div>
                <span class="error"><?php echo $captchaError;?></span>
            </div>
            <div class="row uniform">
                <div class="12u">
                    <ul class="actions align-center">
                        <li>
                            <input type="submit" value="Sign me up!" class="special"/>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- footer -->
<?php include( 'footer.php') ?>