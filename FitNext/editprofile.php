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

    if(!empty($_POST)) {
        $correct = true;
        $changePicture = true;
        if(empty($_POST['birthdate'])) { 
            $birthdateError = "Please select your birthdate"; 
			$correct = false;
        } 
        if(empty($_POST['weight'])) { 
            $weightError = "Please your weight"; 
			$correct = false;
        } 
        if(empty($_POST['sex'])) { 
            $sexError = "Please select your gender"; 
			$correct = false;
        } 
        if(empty($_POST['goal'])) { 
            $goalError = "Please enter what your goal is"; 
			$correct = false;
        } 
        if(empty($_FILES["uploaded_image"]['tmp_name'])) {
            $changePicture = false;
	    }
        if($correct && $changePicture){
            $query = " 
                UPDATE user_data
                SET
                    birthdate = :birthdate,
                    weight = :weight,
                    sex = :sex,
                    goal = :goal,
                    picture = :path
                WHERE 
                    id = :id 
            "; 

            $valid_formats = array("jpg", "png", "gif", "jpeg", "bmp");
            $max_file_size = 1024*5000; //5MB Limit
            $path = "profile/"; // Upload directory
            $count = 0;
            
            if (($_FILES["uploaded_image"]["size"] < $max_file_size)) {
                $ext = pathinfo($_FILES['uploaded_image']['name'], PATHINFO_EXTENSION);
                $uniq_name = uniqid() . '.' .$ext;
                if ((move_uploaded_file($_FILES['uploaded_image']['tmp_name'],$path . $uniq_name))) {
                    $query_params = array( 
                                ':birthdate' => $_POST['birthdate'],
                                ':weight' => $_POST['weight'],
                                ':sex' => $_POST['sex'],
                                ':goal' => $_POST['goal'],
                                ':path' => $path . $uniq_name,
                                ':id' => $_SESSION['user']['id']
                    ); 
                    try { 
                        $stmt = $db->prepare($query); 
                        $result = $stmt->execute($query_params); 
                    } 
                    catch(PDOException $ex) { 
                        die("An error occured, please try again". $ex->getMessage()); 
                    }
                    header("Location: profile.php?error=updated"); 
                    die("Redirecting to profile.php"); 
                } 
                else {
                   echo "Error: A problem occurred during file upload!";
                }    
            } 
            else {
                echo "Error: Only .jpg images under 350Kb are accepted for upload";
            }
        }
        else if($correct && !$changePicture){
             $query = " 
                UPDATE user_data
                SET
                    birthdate = :birthdate,
                    weight = :weight,
                    sex = :sex,
                    goal = :goal
                WHERE 
                    id = :id 
            "; 
            $query_params = array( 
                ':birthdate' => $_POST['birthdate'],
                ':weight' => $_POST['weight'],
                ':sex' => $_POST['sex'],
                ':goal' => $_POST['goal'],
                ':id' => $_SESSION['user']['id']
            ); 
            try { 
                $stmt = $db->prepare($query); 
                $result = $stmt->execute($query_params); 
            } 
            catch(PDOException $ex) { 
                die("An error occured, please try again". $ex->getMessage()); 
            }
            header("Location: profile.php?error=updated"); 
            die("Redirecting to profile.php"); 
        }
    }

?>
<!-- Header -->
<?php 
    $pageTitle = "Edit Profile"; 
    include( 'headerprivate.php' ); 
?>

<!-- Main -->
<section id="main" class="container 75%">
    <div class="box">
        <form enctype="multipart/form-data" method="post" action="editprofile.php">
            <div class="row uniform 50%">
                <div class="3u 12u(mobilep)">
                    <h3 class="editinfo">Birthdate</h3>
                </div>
                <div class="9u 12u(mobilep)">
                    <input type="date" name="birthdate" id="birthdate"  value="<?php if(empty($_POST['birthdate'])) {echo $row['date'];} else {echo $_POST['birthdate'];}?>" placeholder="Username" />
                     <span class="error"><?php echo $birthdateError;?></span>
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="3u 12u(mobilep)">
                    <h3 class="editinfo">Weight</h3>
                </div>
                 <div class="9u 12u(mobilep)">
                    <input type="text" name="weight" id="weight" value="<?php if(empty($_POST['weight'])) {echo $row['weight'];} else {echo $_POST['weight'];}?>" placeholder="Weight" />
                     <span class="error"><?php echo $weightError;?></span>
                </div>
            </div>
             <div class="row uniform 50%">
                <div class="3u 12u(mobilep)">
                    <h3 class="editinfo">Sex</h3>
                </div>
                 <div class="9u 12u(mobilep)">
                    <select name = "sex" style="font-size: 1.3em;">
                        <?php 
                            if(!empty($_POST['sex'])) {
                                if(strcasecmp($_POST['sex'],"male")==0) {
                                    echo '<option value="Male" selected>Male</option>';
                                    echo '<option value="Female">Female</option>';   
                                }
                                else {
                                    echo '<option value="Male">Male</option>';
                                    echo '<option value="Female" selected>Female</option>';
                                }
                            } 
                            else {
                            if(strcasecmp($row['sex'],"male")==0) {
                                echo '<option value="Male" selected>Male</option>';
                                echo '<option value="Female">Female</option>';
                            } 
                            else if(strcasecmp($row['sex'],"female")==0) {
                                echo '<option value="Male">Male</option>';
                                echo '<option value="Female" selected>Female</option>';
                            }
                            else {
                                echo '<option value="" disabled selected></option>';
                                echo '<option value="Male">Male</option>';
                                echo '<option value="Female">Female</option>';
                            } }?>
                    </select>
                    <span class="error"><?php echo $sexError;?></span>
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="3u 12u(mobilep)">
                    <h3 class="editinfo">Goal</h3>
                </div>
                <div class="9u 12u(mobilep)">
                    <input type="text" name="goal" id="goal" value="<?php if(empty($_POST['goal'])) {echo $row['goal'];} else {echo $_POST['goal'];}?>" placeholder="" />
                    <span class="error"><?php echo $goalError;?></span>
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="3u 12u(mobilep)">
                    <h3 class="editinfo">Change profile picture</h3>
                </div>
                <div class="9u 12u(mobilep)">
                    <input type="file" id="file" name="uploaded_image" accept="image/*"><br/>
                    <span class="error"><?php echo $fileError;?></span>
                </div>
            </div>
            <div class="row uniform">
                <div class="12u">
                    <ul class="actions align-center">
                        <li>
                            <input type="submit" class="special" value="Save changes" />
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Footer -->
<?php 
    include( 'footer.php' ); 
?>