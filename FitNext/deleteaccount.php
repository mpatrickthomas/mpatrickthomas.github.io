<?php 
    require("common.php"); 

    if(empty($_SESSION['user'])) 
    { 
        header("Location: login.php?login=required");          
        die("Redirecting to login.php"); 
    } 
    
    $checkerror = "";  
    
    if(isset($_POST['deleteaccount'])){
        $query = "
            DELETE
            FROM user_info 
            WHERE 
                username = :username 
        "; 
        $query_params = array( 
            ':username' => $_SESSION['user']['username'],
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
        $query = "
            DELETE
            FROM user_data 
            WHERE 
                id = :id 
        "; 
        $query_params = array( 
            ':id' => $_SESSION['user']['id'],
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
        header("Location: logout.php"); 
        die("Deleted Redirecting to logout.php"); 
    } else {
        header("Location: delete_account.php?error=notchecked"); 
        die("Deleted Redirecting to delete_account.php");
    }

?>