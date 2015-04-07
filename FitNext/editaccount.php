<?php 
    require("common.php"); 

    if(empty($_SESSION['user'])) 
    { 
        header("Location: login.php?login=required");          
        die("Redirecting to login.php"); 
    } 

    $updateName = false;
    $updateEmail = false;
    $emailError = '';
    if(!empty($_POST)) {
        $changeName = false;
        $changeEmail = false;
        if($_POST['name'] != $_SESSION['user']['name']){
            $changeName = true;
        }    
        
        if($_POST['email'] != $_SESSION['user']['email']){
            $changeEmail = true;
        }
        if(!$changeName && !$changeEmail) {
            header("Location: editaccount.php?error=nochange"); 
            die("Redirecting to editaccount.php");  
        }
        else {
            $correct = false;
            
            if($changeEmail){
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
                } else {
                    $correct = true;   
                }
            }
            if($correct && $changeName && $changeEmail){
                $query = " 
                    UPDATE user_info
                    SET
                        name = :name,
                        email = :email  
                    WHERE 
                        username = :username 
                "; 
                $query_params = array( 
                    ':username' => $_SESSION['user']['username'],
                    ':name' => $_POST['name'],
                    ':email' => $_POST['email']
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
                $_SESSION['user']['name'] = $_POST['name']; 
                $_SESSION['user']['email'] = $_POST['email']; 
                header("Location: editaccount.php?error=updated"); 
                die("Redirecting to editaccount.php"); 
            } 
            else if($correct && $changeEmail && !$changeName){
                $query = " 
                    UPDATE user_info
                    SET
                        email = :email  
                    WHERE 
                        username = :username 
                "; 
                $query_params = array( 
                    ':username' => $_SESSION['user']['username'],
                    ':email' => $_POST['email']
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
                $_SESSION['user']['email'] = $_POST['email']; 
                header("Location: editaccount.php?error=updated"); 
                die("Redirecting to editaccount.php"); 
            }
            else if(!$changeEmail && $changeName){
                $query = " 
                    UPDATE user_info
                    SET
                        name = :name  
                    WHERE 
                        username = :username 
                "; 
                $query_params = array( 
                    ':username' => $_SESSION['user']['username'],
                    ':name' => $_POST['name']
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
                $_SESSION['user']['name'] = $_POST['name']; 
                header("Location: editaccount.php?error=updated"); 
                die("Redirecting to editaccount.php"); 
            }
        }
    }
?>

<!-- Header -->
<?php 
    $pageTitle = "Account"; 
    include( 'headerprivate.php' ); 
?>

<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2>Edit your account</h2>
        <?php
             if(isset($_GET['error'])){
                $msg = $_GET['error'];
                if ($msg == "updated"){
                    echo("<h3 class=\"no-error align-center\">Information updated successfully!</h3>");
                }
                if ($msg == "nochange"){
                    echo("<h3 class=\"error align-center\">No changes were made</h3>");
                }
                if ($msg == "noerror"){
                    echo("<h3 class=\"no-error align-center\">Password changed successfully!</h3>");
                }
             }
        ?>
    </header>
    <div class="box">
        <form method="post" action="editaccount.php">
            <div class="row uniform 50%">
                <div class="3u 12u(mobilep)">
                    <h3 class="editinfo">Username</h3>
                </div>
                <div class="9u 12u(mobilep)">
                    <input type="text" name="username" disabled id="username"  value="<?php echo $_SESSION['user']['username'];?>" placeholder="Username" />
                </div>
            </div>
            <h4 class="error align-center">(Cannot be changed)</h4>
             <div class="row uniform 50%">
                <div class="3u 12u(mobilep)">
                    <h3 class="editinfo">Name</h3>
                </div>
                 <div class="9u 12u(mobilep)">
                    <input type="text" name="name" id="name" value="<?php echo $_SESSION['user']['name'];?>" placeholder="Name" />
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="3u 12u(mobilep)">
                    <h3 class="editinfo">Email</h3>
                </div>
                <div class="9u 12u(mobilep)">
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['user']['email'];?>" placeholder="Email" />
                </div>
            </div>
            <p class="align-center"><span class="error"><?php echo $emailError;?></span></p>
             <div class="row uniform">
                <div class="12u">
                    <ul class="actions align-center">
                        <li>
                            <input type="submit" class="special" value="Update" />
                        </li>
                    </ul>
                </div>
            </div>
            <hr/>
        </form>
        <form method="post" id = "passwordform" action="changepassword.php"> 
            <h3 class="align-center">Change your password</h3>
            <?php 
            if(isset($_GET['error'])){
                $msg = $_GET['error'];
                if ($msg == "password"){
                    echo("<h3 class=\"error align-center\">The password you entered is incorrect. Please try again</h3>");
                }
                if ($msg == "empty"){
                    echo("<h3 class=\"error align-center\">The password fields cannot be empty</h3>");
                }
                if ($msg == "nomatch"){
                    echo("<h3 class=\"error align-center\">The passwords do not match, please try again</h3>");
                }
            }
            ?>
             <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $oldPasswordError;?></span>
                    <input type="password" name="password" id="password" value="" placeholder="Current Password" />
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $passwordError;?></span>
                    <input type="password" name="passwordNew" id="passwordNew" value="" placeholder="New Password" />
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <span class="error"><?php echo $passwordRepeatError;?></span>
                    <input type="password" name="passwordRepeat" id="passwordRepeat" value="" placeholder="Re-type your password" />
                </div>
            </div>
            <div class="row uniform">
                <div class="12u">
                    <ul class="actions align-center">
                        <li>
                            <input type="submit" class="special" value="Change Password" />
                        </li>
                    </ul>
                </div>
            </div>
        </form>
        <h1 class="align-right"><a href="delete_account.php" class="error">Delete account</a></h1>
    </div>
</section>

<!-- Footer -->
<?php 
    include( 'footer.php' ); 
?>