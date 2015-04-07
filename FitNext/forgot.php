<?php 
    require("common.php"); 

    $usernameError = '';
    session_start();
    $_SESSION = $_POST;

    if(!empty($_POST)) 
    { 
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
            session_write_close();
            header("Location: reset.php"); 
            die("Redirecting to editaccount.php"); 
        } else {
            $usernameError = "Username not found, please try again"; 
        }
    } 
    session_write_close();
?>

<!-- Header -->
<?php 
    $pageTitle = "Login"; 
    include( 'header.php' ); 
?>

<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2>Reset your password</h2>
        <p>Enter your username to get started</p>
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
        <form method="post" action="forgot.php">
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $usernameError;?></span>
                    <input type="text" name="username" id="username" value="<?php echo $_POST['username'];?>" placeholder="Username" />
                </div>
            </div>
            <div class="row uniform">
                <div class="12u">
                    <ul class="actions align-right">
                        <li>
                            <input type="submit" value="Next" />
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>


<!-- footer -->
<?php include( 'footer.php') ?>