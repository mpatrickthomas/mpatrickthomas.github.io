<?php 

    require("common.php"); 
    session_start();

    if(empty($_SESSION)){
        header("Location: forgot.php"); 
        die("Redirecting to forgot.php"); 
    }
     

    $username = $_SESSION['username'];

    $securityError = '';
    
    $query = " 
        SELECT 
            securityQuestion,
            securityAnswer
        FROM user_info 
        WHERE 
            username = :username 
    "; 
    $query_params = array( 
        ':username' => $username
    ); 
    try 
    { 
        // Execute the query 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
    } 
    catch(PDOException $ex) 
    {  
        die("An error occured, please try again"); 
    } 
    
    $row = $stmt->fetch(); 
    
    $securityQuestion = $row['securityQuestion'];
    $securityAnswer = $row['securityAnswer'];
    
    $passwordError = $passwordRepeatError = $answerError = '';
    $correct = true;
    
    if(!empty($_POST)) 
    {   
        if(empty($_POST['password'])) 
        { 
            $passwordError = "Please enter a password"; 
            $passwordRepeatError = "Please re-type your password"; 
            $correct = false;

        } 
        if(empty($_POST['answer'])) 
        { 
            $answerError = "Please answer the security question"; 
            $correct = false;

        } 
        if(empty($_POST['passwordRepeat'])) 
        { 
            $passwordError = "Please enter a password"; 
            $passwordRepeatError = "Please re-type your password"; 
            $correct = false;

        } 
        if($_POST['password'] != $_POST['passwordRepeat'] && $correct){
            $passwordError = "Your passwords don't match. Please try again"; 
            $correct = false;
        }
        
        $updatePwd = false;

        if(strcasecmp($securityAnswer, $_POST['answer']) == 0){
            $updatePwd = true;
        }
        else {
            $answerError = "The answer doesn't match what we have in our records, please try again";
        }
        
        if($updatePwd && $correct){
             $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 

	        $password = hash('sha256', $_POST['password'] . $salt); 
	          
	        for($round = 0; $round < 65536; $round++) 
	        { 
	            $password = hash('sha256', $password . $salt); 
	        } 
            
            $query = " 
                UPDATE user_info
                SET
                    password = :password,
                    salt = :salt  
                WHERE 
                    username = :username 
            "; 
            $query_params = array( 
                ':username' => $username,
                ':password' => $password,
                ':salt' => $salt
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
            
            
            header("Location: login.php?login=reset"); 
            die("Redirecting to login.php"); 
        }
    } 
?>

<!-- Header -->
<?php 
    $pageTitle = "Login"; 
    include( 'header.php' ); 
?>

<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2>Reset password for <i><b><?php echo $username?></b></i></h2>
        <p>Answer the security question to reset your password</p>
    </header>
    <div class="box">
        <form method="post" action="reset.php">
            <h3><?php echo $securityQuestion;?></h3>
            <div class="row uniform 50%">
                <div class="12u">
                    <input type="text" name="answer" id="answer" value="<?php echo $_POST['answer'];?>" placeholder = "Answer"/>
                <span class="error"><?php echo $answerError;?></span>
                </div>
            </div>
            <hr/>
            <h3>Enter your new password</h3>
            <div class="row uniform 50%">
                <div class="6u 12u(mobilep)">
                    <input type="password" name="password" id="password" value="" placeholder="Password" />
                    <span class="error"><?php echo $passwordError;?></span>
                </div>
                <div class="6u 12u(mobilep)">
                    <input type="password" name="passwordRepeat" id="passwordRepeat" value="" placeholder="Re-type your password" />
                    <span class="error"><?php echo $passwordRepeatError;?></span>
                </div>
            </div>
            <div class="row uniform">
                <div class="12u">
                    <ul class="actions align-right">
                        <li>
                            <input type="submit" value="Reset" />
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>


<!-- footer -->
<?php include( 'footer.php') ?>