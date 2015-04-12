<?php 

    require("common.php"); 

    if(empty($_SESSION['user'])) 
    { 
        header("Location: login.php?login=required");          
        die("Redirecting to login.php"); 
    } 
    $active = "active";

    if(!empty($_POST)) {
        if(strcmp($_POST['day'], 'Monday') == 0){
            $Monday = '';
            $Tuesday = $active;
            
            if ($_POST['a'] == 'abs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = '-1';
                if(!empty($_POST['a1'])) {
                    $a1 = $_POST['a1'];
                }
                if(!empty($_POST['a2'])) {
                    $a2 = $_POST['a2'];
                }
                if(!empty($_POST['a3'])) {
                    $a3 = $_POST['a3'];
                }
                if(!empty($_POST['a4'])) {
                    $a4 = $_POST['a4'];
                }
                if(!empty($_POST['a5'])) {
                    $a5 = $_POST['a5'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    monday = :monday
                WHERE 
                    id = :id 
                ";
                $value = $a1 . ";" . $a2 .";".$a3.";".$a4.";".$a5;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':monday' => $value
                );
                try 
                { 
                    $stmt = $db->prepare($query); 
                    $result = $stmt->execute($query_params); 
                } 
                catch(PDOException $ex) 
                { 
                    die("An error occured inserting, please try again " . $ex->getMessage()); 
                }
            }
        }
    }

?>

<!-- Header -->
<?php 
    $pageTitle = "Workout Planner"; 
    include( 'headerprivate.php' ); 
?>

<script src="js/tabModule.js"></script>

<script>$(document).ready(function(){
  tabModule.init();
});</script>


<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>Plan your workout!</h2>

        <section id="main" class="container 75%">

            <div class="tab tab-vert">
                <ul class="tab-legend">
                    <li class="<?php echo $Monday;?>">Monday</li>
                    <li class="<?php echo $Tuesday;?>">Tuesday</li>
                    <li class="<?php echo $Wednesday;?>">Wednesday</li>
                    <li class="<?php echo $Thursday;?>">Thursday</li>
                    <li class="<?php echo $Friday;?>">Friday</li>
                    <li class="<?php echo $Saturday;?>">Saturday</li>
                    <li class="<?php echo $Sunday;?>">Sunday</li>
                </ul>
                
                    <div class="12u">
                        
                            <ul class="tab-content">
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>What's up, Monday?</h4>
                                    <h5>I want monday's to be...</h5>
                                    <form method="post" action="workoutplanner.php">
                                        <input type="hidden" name="day" value="Monday">
                                        <input type="checkbox" id="a" name="a" value="abs">
                                            <label for="a">Abs</label><br/>
                                        <span id="ab-holder" style="display:none;">
                                            <input type="checkbox" id="a1" name="a1" value="Bodyweight Squat">
                                            <label for="a1">Bodyweight Squat</label><br/>
                                            <input type="checkbox" id="a2" name="a2" value="Single Leg Stand">
                                            <label for="a2">Single Leg Stand</label><br/>
                                            <input type="checkbox" id="a3" name="a3" value="Sit-up / Crunches">
                                            <label for="a3">Sit-up / Crunches</label><br/>
                                            <input type="checkbox" id="a4" name="a4" value="Side Planks">
                                            <label for="a4">Side Planks</label><br/>
                                            <input type="checkbox" id="a5" name="a5" value="Glute Bridge">
                                            <label for="a5">Glute Bridge</label><br/>
                                            <input type="checkbox" id="a5" name="a5" value="Forward Lunge">
                                            <label for="a6">Forward Lunge</label><br/>
                                        </span>
                                        <input type="button" name='b' class="button special fit" value='chest day' />
                                        <input type="button" name='c' class="button special fit" value='leg day' />
                                        <input type="button" name='d' class="button special fit" value='arm day' />
                                        <input type="button" name='e' class="button alt fit" value='rest day' />
                                         <ul class="actions align-right">
                                            <li>
                                                <input type="submit" class="button" value="Next" />
                                            </li>
                                        </ul>
                                    </form>
                                    

                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>How's it going, Tuesday?</h4>
                                    <h5>I want tuesday's to be...</h5>

                                    <input type="button" class="button special fit" value='ab day' />
                                    <input type="button" class="button special fit" value='chest day' />
                                    <input type="button" class="button special fit" value='leg day' />
                                    <input type="button" class="button special fit" value='arm day' />
                                    <input type="button" class="button alt fit" value='rest day' />
                                    <hr/>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Keepin' it classy, Wednesday?</h4>
                                    <h5>I want wednesday's to be...</h5>

                                    <input type="button" class="button special fit" value='ab day' />
                                    <input type="button" class="button special fit" value='chest day' />
                                    <input type="button" class="button special fit" value='leg day' />
                                    <input type="button" class="button special fit" value='arm day' />
                                    <input type="button" class="button alt fit" value='rest day' />
                                    <hr/>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Howdy, Thursday!</h4>
                                    <h5>I want thursday's to be...</h5>

                                    <input type="button" class="button special fit" value='ab day' />
                                    <input type="button" class="button special fit" value='chest day' />
                                    <input type="button" class="button special fit" value='leg day' />
                                    <input type="button" class="button special fit" value='arm day' />
                                    <input type="button" class="button alt fit" value='rest day' />
                                    <hr/>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Thank goodness it's Friday!</h4>
                                    <h5>I want friday's to be...</h5>

                                    <input type="button" class="button special fit" value='ab day' />
                                    <input type="button" class="button special fit" value='chest day' />
                                    <input type="button" class="button special fit" value='leg day' />
                                    <input type="button" class="button special fit" value='arm day' />
                                    <input type="button" class="button alt fit" value='rest day' />
                                    <hr/>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Keeping it real on, Saturday?</h4>
                                    <h5>I want saturday's to be...</h5>

                                    <input type="button" class="button special fit" value='ab day' />
                                    <input type="button" class="button special fit" value='chest day' />
                                    <input type="button" class="button special fit" value='leg day' />
                                    <input type="button" class="button special fit" value='arm day' />
                                    <input type="button" class="button alt fit" value='rest day' />
                                    <hr/>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>How you doin', Sunday?</h4>
                                    <h5>I want sunday's to be...</h5>

                                    <input type="button" class="button special fit" value='ab day' />
                                    <input type="button" class="button special fit" value='chest day' />
                                    <input type="button" class="button special fit" value='leg day' />
                                    <input type="button" class="button special fit" value='arm day' />
                                    <input type="button" class="button alt fit" value='rest day' />
                                    <hr/>
                                </li>
                    