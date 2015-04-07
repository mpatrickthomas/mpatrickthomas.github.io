<?php
    require("common.php"); 
     
    if(empty($_SESSION['user'])) 
    { 
        header("Location: login.php?login=required"); 
        die("Redirecting to login.php"); 
    } 

    $incorrect = false;

    if(!empty($_POST)) 
    { 
        $query = " 
            SELECT 
                password,
                salt
            FROM user_info 
            WHERE 
                username = :username 
        "; 
         
        $query_params = array( 
            ':username' => $_SESSION['user']['username'] 
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
            $updatePwd = false;

            
            if(!empty($_POST['passwordNew']) && !empty($_POST['passwordRepeat'])){
                if($_POST['passwordNew'] == $_POST['passwordRepeat']) {
                    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
                    $password = hash('sha256', $_POST['passwordRepeat'] . $salt); 
                    for($round = 0; $round < 65536; $round++) { 
                        $password = hash('sha256', $password . $salt); 
                    } 
                    $updatePwd = true;
                } else {
                    header("Location: editaccount.php?error=nomatch"); 
                    die("Redirecting to editaccount.php");
                }
            }
            else { 
                header("Location: editaccount.php?error=empty"); 
                die("Redirecting to editaccount.php");          
            } 

            if($updatePwd){

                $query = " 
                    UPDATE user_info
                    SET
                        password = :password,
                        salt = :salt  
                    WHERE 
                        username = :username 
                "; 
                $query_params = array( 
                    ':username' => $_SESSION['user']['username'],
                    ':password' => $password,
                    ':salt' => $salt
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

                header("Location: editaccount.php?error=noerror"); 
                die("Redirecting to editaccount.php"); 
            }
        } 
        else 
        { 
            header("Location: editaccount.php?error=password"); 
            die("Redirecting to editaccount.php");  
        } 
    }
   
?> 