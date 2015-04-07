<?php 
    require("common.php"); 

    if(empty($_SESSION['user'])) 
    { 
        header("Location: login.php?login=required");          
        die("Redirecting to login.php"); 
    } 
?>

<!-- Header -->
<?php 
    $pageTitle = "Delete account"; 
    include( 'headerprivate.php' ); 
?>

<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2> Delete your account</h2>
    </header>
    <div class="box">
        <form method="post" id="passwordform" action="deleteaccount.php">
            <h3 class="align-center">Are you sure you would like to delete your account?</h3>
            <hr/>
            <p class="align-center">Once you delete your account, there is no way to recover it back. If you are sure, check the box below and click delete account</p>
            <div class="row uniform 50%">
                <div class="4u">
                </div>
                <div class="4u">
                    <input type="checkbox" name="deleteaccount" id="deleteaccount" value="" placeholder="Current Password" />
                    <label for="deleteaccount">Yes, I'm sure</label>
                </div>
                <div class="4u">
                </div>
            </div>
             <div class="row uniform 50%">
                <div class="12u">
                    <?php
                    if(isset($_GET['error'])){
                        $msg = $_GET['error'];
                        if ($msg == "notchecked"){
                            echo '<h4 class="align-center"><span class="error">You must select the box before you can delete your account</span></h4>';             
                        }
                    } ?>
                 </div>
            </div>
            <br/>
            <br/>
            <div class="row uniform">
                <div class="6u 12u(mobilep)">
                    <ul class="actions align-left">
                        <li>
                            <a href="editaccount.php" class="button icon fa-chevron-left" style="background-color:#8eb58b;">Take me back</a>
                        </li>
                    </ul>
                </div>
                <div class="6u 12u(mobilep)">
                    <ul class="actions align-right">
                        <li>
                            <input type="submit" value="Delete Account" class="button" style="background-color:#a55353;"/>
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