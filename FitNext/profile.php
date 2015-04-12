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
    $pageTitle = $_SESSION['user']['name']; 
    include( 'headerprivate.php' ); 
?>

<!-- Main -->
    <section id="main" class="container">
    <header>
        <h2>Edit your profile</h2>
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
    </header>
        <div class ="row box">
            <div class="6u 12u(mobilep)">
                <h2 class="align-center"><strong><?php echo $_SESSION['user']['name'];?></strong></h2>
                <hr/>
                <img src="<?php echo $row['picture'];?>" class="image fit"/>
                <hr/>
                   <p class="align-center" style="margin-bottom:1em;margin-top:-1.5em;"><a href="editprofile.php">Update</a></p>
                <div class="row">
                    <div class="6u">
                        <h3 class="align-right">Birthdate:</h3>
                    </div>
                    <div class="6u">
                        <h3 class="align-left"><?php echo $row['date'];?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="6u">
                        <h3 class="align-right">Age:</h3>
                    </div>
                    <div class="6u">
                        <h3 class="align-left"><?php echo $row['age'];?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="6u">
                        <h3 class="align-right">Sex:</h3>
                    </div>
                    <div class="6u">
                        <h3 class="align-left"><?php echo $row['sex'];?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="6u">
                        <h3 class="align-right">Weight:</h3>
                    </div>
                    <div class="6u">
                        <h3 class="align-left"><?php echo $row['weight'];?> lbs</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="6u">
                        <h3 class="align-right">Goal Weight:</h3>
                    </div>
                    <div class="6u">
                        <h3 class="align-left"><?php echo $row['goal'];?></h3>
                    </div>
                </div>            
            </div>
            <div class="6u 12u(mobilep)">
                <h2 class="align-center">Badges Earned</h2>
                <hr/>
            </div>
        </div>
    </section>

<!-- footer -->
<?php include( 'footer.php') ?>
