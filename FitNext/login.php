<?php 
    require("common.php"); 
     
    if(!empty($_SESSION['user'])) 
    { 
        header("Location: mypage.php"); 
        die("Redirecting to mypage.php"); 
    } 

    $incorrect = false;

    if(!empty($_POST)) 
    { 
        $query = " 
            SELECT 
                id,
                name,
                username,
                password,
                email,
                name,
                salt
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
 
        $login_ok = false; 

        $row = $stmt->fetch(); 
        if($row) 
        {  
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
            if($check_password === $row['password']) 
            { 
                $login_ok = true; 
            } 
        } 

        if($login_ok) 
        { 
            unset($row['salt']); 
            unset($row['password']); 
            
            $_SESSION['user'] = $row; 

            header("Location: mypage.php"); 
            die("Redirecting to: mypage.php"); 
        } 
        else 
        { 
        	$incorrect = true;
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
        <h2>Login</h2>
        <p>Enter your credentials</p>
            <?php
             if(isset($_GET['account'])){
                $msg = $_GET['account'];
                if ($msg == "created"){
                    echo("<h3 class=\"no-error align-center\">Account created successfully</h3>");
                }
             }
            ?>
    </header>
    <div class="box">
        <form method="post" action="login.php">
            <?php
                if($incorrect){
                    echo("<h1 class=\"loginError\">Incorrect username or password. Please try again</h1>");
                }   
                if(isset($_GET['login'])){
                    $msg = $_GET['login'];
                    if ($msg == "required"){
                        echo("<h1 class=\"loginError\">You must be logged in to access this page</h1>");
                    }
                    if ($msg == "reset"){
                        echo("<h1 class=\"loginNoError\">Password reset successfully</h1>");
                    }
                }
            ?>
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $usernameError;?></span>
                    <input type="text" name="username" id="username" value="<?php echo $_POST['username'];?>" placeholder="Username" />
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $passwordError;?></span>
                    <input type="password" name="password" id="password" value="" placeholder="Password" />
                </div>
            </div>
            <div class="row uniform">
                <div class="12u">
                    <a href="forgot.php">Forgot password?</a>
                </div>
            </div>
            <div class="row uniform">
                <div class="6u 12u(mobilep)">
                    <ul class="actions align-left">
                        <li>
                            <input type="submit" value="Login" />
                        </li>
                    </ul>
                </div>
                <div class="6u 12u(mobilep)">
                    <ul class="actions align-right">
                        <li>
                            <a href = "signup.php" class="button special">Sign up</a>                  </li>
                    </ul>
                </div>
            </div>
          
        </form>
    </div>
</section>


<!-- footer -->
<?php include( 'footer.php') ?>