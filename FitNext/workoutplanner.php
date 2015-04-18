<?php 

    require("common.php"); 

    if(empty($_SESSION['user'])) 
    { 
        header("Location: login.php?login=required");          
        die("Redirecting to login.php"); 
    } 
    $active = "active";

    function formatResults($string){
        $finalString = rtrim($string, ";");
        $finalString = str_replace("-1;", " ", $finalString);
        $finalString = str_replace(";", ", ", $finalString);
        $finalString = str_replace("-1", " ", $finalString);
        $finalString = rtrim($finalString, ",");
        
        echo $finalString;
     }

    if(!empty($_POST)) {
        if(strcmp($_POST['day'], 'Monday') == 0){
            $Monday = '';
            $Tuesday = $active;
            
            if ($_POST['ma'] == 'abs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['ma1'])) {
                    $a1 = $_POST['ma1'];
                }
                if(!empty($_POST['ma2'])) {
                    $a2 = $_POST['ma2'];
                }
                if(!empty($_POST['ma3'])) {
                    $a3 = $_POST['ma3'];
                }
                if(!empty($_POST['ma4'])) {
                    $a4 = $_POST['ma4'];
                }
                if(!empty($_POST['ma5'])) {
                    $a5 = $_POST['ma5'];
                }
                if(!empty($_POST['ma6'])) {
                    $a6 = $_POST['ma6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    monday = :monday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
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
            
            if ($_POST['mb'] == 'chest') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['mb1'])) {
                    $a1 = $_POST['mb1'];
                }
                if(!empty($_POST['mb2'])) {
                    $a2 = $_POST['mb2'];
                }
                if(!empty($_POST['mb3'])) {
                    $a3 = $_POST['mb3'];
                }
                if(!empty($_POST['mb4'])) {
                    $a4 = $_POST['mb4'];
                }
                if(!empty($_POST['mb5'])) {
                    $a5 = $_POST['mb5'];
                }
                if(!empty($_POST['mb6'])) {
                    $a6 = $_POST['mb6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    monday = :monday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
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
            
            if ($_POST['mc'] == 'legs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['mc1'])) {
                    $a1 = $_POST['mc1'];
                }
                if(!empty($_POST['mc2'])) {
                    $a2 = $_POST['mc2'];
                }
                if(!empty($_POST['mc3'])) {
                    $a3 = $_POST['mc3'];
                }
                if(!empty($_POST['mc4'])) {
                    $a4 = $_POST['mc4'];
                }
                if(!empty($_POST['mc5'])) {
                    $a5 = $_POST['mc5'];
                }
                if(!empty($_POST['mc6'])) {
                    $a6 = $_POST['mc6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    monday = :monday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
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
            
            if ($_POST['md'] == 'arms') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['md1'])) {
                    $a1 = $_POST['md1'];
                }
                if(!empty($_POST['md2'])) {
                    $a2 = $_POST['md2'];
                }
                if(!empty($_POST['md3'])) {
                    $a3 = $_POST['md3'];
                }
                if(!empty($_POST['md4'])) {
                    $a4 = $_POST['md4'];
                }
                if(!empty($_POST['md5'])) {
                    $a5 = $_POST['md5'];
                }
                if(!empty($_POST['md6'])) {
                    $a6 = $_POST['md6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    monday = :monday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
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
            
            if ($_POST['me'] == 'cardio') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['me1'])) {
                    $a1 = $_POST['me1'];
                }
                if(!empty($_POST['me2'])) {
                    $a2 = $_POST['me2'];
                }
                if(!empty($_POST['me3'])) {
                    $a3 = $_POST['me3'];
                }
                if(!empty($_POST['me4'])) {
                    $a4 = $_POST['me4'];
                }
                if(!empty($_POST['me5'])) {
                    $a5 = $_POST['me5'];
                }
                if(!empty($_POST['me6'])) {
                    $a6 = $_POST['me6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    monday = :monday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
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
            
            if ($_POST['mf'] == 'rest') {
                
                $query = " 
                UPDATE user_workout
                SET
                    monday = :monday
                WHERE 
                    id = :id 
                ";
                $value = "Rest;";
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
        
        if(strcmp($_POST['day'], 'Tuesday') == 0){
            $Tuesday = '';
            $Wednesday = $active;
            
            if ($_POST['ta'] == 'abs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['ta1'])) {
                    $a1 = $_POST['ta1'];
                }
                if(!empty($_POST['ta2'])) {
                    $a2 = $_POST['ta2'];
                }
                if(!empty($_POST['ta3'])) {
                    $a3 = $_POST['ta3'];
                }
                if(!empty($_POST['ta4'])) {
                    $a4 = $_POST['ta4'];
                }
                if(!empty($_POST['ta5'])) {
                    $a5 = $_POST['ta5'];
                }
                if(!empty($_POST['ta6'])) {
                    $a6 = $_POST['ta6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    tuesday = :tuesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':tuesday' => $value
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
            
            if ($_POST['tb'] == 'chest') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['tb1'])) {
                    $a1 = $_POST['tb1'];
                }
                if(!empty($_POST['tb2'])) {
                    $a2 = $_POST['tb2'];
                }
                if(!empty($_POST['tb3'])) {
                    $a3 = $_POST['tb3'];
                }
                if(!empty($_POST['tb4'])) {
                    $a4 = $_POST['tb4'];
                }
                if(!empty($_POST['tb5'])) {
                    $a5 = $_POST['tb5'];
                }
                if(!empty($_POST['tb6'])) {
                    $a6 = $_POST['tb6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    tuesday = :tuesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':tuesday' => $value
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
            
            if ($_POST['tc'] == 'legs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['tc1'])) {
                    $a1 = $_POST['tc1'];
                }
                if(!empty($_POST['tc2'])) {
                    $a2 = $_POST['tc2'];
                }
                if(!empty($_POST['tc3'])) {
                    $a3 = $_POST['tc3'];
                }
                if(!empty($_POST['tc4'])) {
                    $a4 = $_POST['tc4'];
                }
                if(!empty($_POST['tc5'])) {
                    $a5 = $_POST['tc5'];
                }
                if(!empty($_POST['tc6'])) {
                    $a6 = $_POST['tc6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    tuesday = :tuesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':tuesday' => $value
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
            
            if ($_POST['td'] == 'arms') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['td1'])) {
                    $a1 = $_POST['td1'];
                }
                if(!empty($_POST['td2'])) {
                    $a2 = $_POST['td2'];
                }
                if(!empty($_POST['td3'])) {
                    $a3 = $_POST['td3'];
                }
                if(!empty($_POST['td4'])) {
                    $a4 = $_POST['td4'];
                }
                if(!empty($_POST['td5'])) {
                    $a5 = $_POST['td5'];
                }
                if(!empty($_POST['td6'])) {
                    $a6 = $_POST['td6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    tuesday = :tuesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':tuesday' => $value
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
            
            if ($_POST['te'] == 'cardio') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['te1'])) {
                    $a1 = $_POST['te1'];
                }
                if(!empty($_POST['te2'])) {
                    $a2 = $_POST['te2'];
                }
                if(!empty($_POST['te3'])) {
                    $a3 = $_POST['te3'];
                }
                if(!empty($_POST['te4'])) {
                    $a4 = $_POST['te4'];
                }
                if(!empty($_POST['te5'])) {
                    $a5 = $_POST['te5'];
                }
                if(!empty($_POST['te6'])) {
                    $a6 = $_POST['te6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    tuesday = :tuesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':tuesday' => $value
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
            
            if ($_POST['tf'] == 'rest') {
                
                $query = " 
                UPDATE user_workout
                SET
                    tuesday = :tuesday
                WHERE 
                    id = :id 
                ";
                $value = "Rest;";
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':tuesday' => $value
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
        
        if(strcmp($_POST['day'], 'Wednesday') == 0){
            $Wednesday = '';
            $Thursday = $active;
            
            if ($_POST['wa'] == 'abs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['wa1'])) {
                    $a1 = $_POST['wa1'];
                }
                if(!empty($_POST['wa2'])) {
                    $a2 = $_POST['wa2'];
                }
                if(!empty($_POST['wa3'])) {
                    $a3 = $_POST['wa3'];
                }
                if(!empty($_POST['wa4'])) {
                    $a4 = $_POST['wa4'];
                }
                if(!empty($_POST['wa5'])) {
                    $a5 = $_POST['wa5'];
                }
                if(!empty($_POST['wa6'])) {
                    $a6 = $_POST['wa6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    wednesday = :wednesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':wednesday' => $value
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
            
            if ($_POST['wb'] == 'chest') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['wb1'])) {
                    $a1 = $_POST['wb1'];
                }
                if(!empty($_POST['wb2'])) {
                    $a2 = $_POST['wb2'];
                }
                if(!empty($_POST['wb3'])) {
                    $a3 = $_POST['wb3'];
                }
                if(!empty($_POST['wb4'])) {
                    $a4 = $_POST['wb4'];
                }
                if(!empty($_POST['wb5'])) {
                    $a5 = $_POST['wb5'];
                }
                if(!empty($_POST['wb6'])) {
                    $a6 = $_POST['wb6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    wednesday = :wednesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':wednesday' => $value
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
            
            if ($_POST['wc'] == 'legs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['wc1'])) {
                    $a1 = $_POST['wc1'];
                }
                if(!empty($_POST['wc2'])) {
                    $a2 = $_POST['wc2'];
                }
                if(!empty($_POST['wc3'])) {
                    $a3 = $_POST['wc3'];
                }
                if(!empty($_POST['wc4'])) {
                    $a4 = $_POST['wc4'];
                }
                if(!empty($_POST['wc5'])) {
                    $a5 = $_POST['wc5'];
                }
                if(!empty($_POST['wc6'])) {
                    $a6 = $_POST['wc6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    wednesday = :wednesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':wednesday' => $value
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
            
            if ($_POST['wd'] == 'arms') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['wd1'])) {
                    $a1 = $_POST['wd1'];
                }
                if(!empty($_POST['wd2'])) {
                    $a2 = $_POST['wd2'];
                }
                if(!empty($_POST['wd3'])) {
                    $a3 = $_POST['wd3'];
                }
                if(!empty($_POST['wd4'])) {
                    $a4 = $_POST['wd4'];
                }
                if(!empty($_POST['wd5'])) {
                    $a5 = $_POST['wd5'];
                }
                if(!empty($_POST['wd6'])) {
                    $a6 = $_POST['wd6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    wednesday = :wednesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':wednesday' => $value
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
            
            if ($_POST['we'] == 'cardio') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['we1'])) {
                    $a1 = $_POST['we1'];
                }
                if(!empty($_POST['we2'])) {
                    $a2 = $_POST['we2'];
                }
                if(!empty($_POST['we3'])) {
                    $a3 = $_POST['we3'];
                }
                if(!empty($_POST['we4'])) {
                    $a4 = $_POST['we4'];
                }
                if(!empty($_POST['we5'])) {
                    $a5 = $_POST['we5'];
                }
                if(!empty($_POST['we6'])) {
                    $a6 = $_POST['we6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    wednesday = :wednesday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':wednesday' => $value
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
            
            if ($_POST['wf'] == 'rest') {
                
                $query = " 
                UPDATE user_workout
                SET
                    wednesday = :wednesday
                WHERE 
                    id = :id 
                ";
                $value = "Rest;";
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':wednesday' => $value
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
        
        if(strcmp($_POST['day'], 'Thursday') == 0){
            $Thursday = '';
            $Friday = $active;
            
            if ($_POST['ra'] == 'abs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['ra1'])) {
                    $a1 = $_POST['ra1'];
                }
                if(!empty($_POST['ra2'])) {
                    $a2 = $_POST['ra2'];
                }
                if(!empty($_POST['ra3'])) {
                    $a3 = $_POST['ra3'];
                }
                if(!empty($_POST['ra4'])) {
                    $a4 = $_POST['ra4'];
                }
                if(!empty($_POST['ra5'])) {
                    $a5 = $_POST['ra5'];
                }
                if(!empty($_POST['ra6'])) {
                    $a6 = $_POST['ra6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    thursday = :thursday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':thursday' => $value
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
            
            if ($_POST['rb'] == 'chest') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['rb1'])) {
                    $a1 = $_POST['rb1'];
                }
                if(!empty($_POST['rb2'])) {
                    $a2 = $_POST['rb2'];
                }
                if(!empty($_POST['rb3'])) {
                    $a3 = $_POST['rb3'];
                }
                if(!empty($_POST['rb4'])) {
                    $a4 = $_POST['rb4'];
                }
                if(!empty($_POST['rb5'])) {
                    $a5 = $_POST['rb5'];
                }
                if(!empty($_POST['rb6'])) {
                    $a6 = $_POST['rb6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    thursday = :thursday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':thursday' => $value
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
            
            if ($_POST['rc'] == 'legs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['rc1'])) {
                    $a1 = $_POST['rc1'];
                }
                if(!empty($_POST['rc2'])) {
                    $a2 = $_POST['rc2'];
                }
                if(!empty($_POST['rc3'])) {
                    $a3 = $_POST['rc3'];
                }
                if(!empty($_POST['rc4'])) {
                    $a4 = $_POST['rc4'];
                }
                if(!empty($_POST['rc5'])) {
                    $a5 = $_POST['rc5'];
                }
                if(!empty($_POST['rc6'])) {
                    $a6 = $_POST['rc6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    thursday = :thursday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':thursday' => $value
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
            
            if ($_POST['rd'] == 'arms') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['rd1'])) {
                    $a1 = $_POST['rd1'];
                }
                if(!empty($_POST['rd2'])) {
                    $a2 = $_POST['rd2'];
                }
                if(!empty($_POST['rd3'])) {
                    $a3 = $_POST['rd3'];
                }
                if(!empty($_POST['rd4'])) {
                    $a4 = $_POST['rd4'];
                }
                if(!empty($_POST['rd5'])) {
                    $a5 = $_POST['rd5'];
                }
                if(!empty($_POST['rd6'])) {
                    $a6 = $_POST['rd6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    thursday = :thursday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':thursday' => $value
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
            
            if ($_POST['re'] == 'cardio') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['re1'])) {
                    $a1 = $_POST['re1'];
                }
                if(!empty($_POST['re2'])) {
                    $a2 = $_POST['re2'];
                }
                if(!empty($_POST['re3'])) {
                    $a3 = $_POST['re3'];
                }
                if(!empty($_POST['re4'])) {
                    $a4 = $_POST['re4'];
                }
                if(!empty($_POST['re5'])) {
                    $a5 = $_POST['re5'];
                }
                if(!empty($_POST['re6'])) {
                    $a6 = $_POST['re6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    thursday = :thursday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':thursday' => $value
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
            
            if ($_POST['rf'] == 'rest') {
                
                $query = " 
                UPDATE user_workout
                SET
                    thursday = :thursday
                WHERE 
                    id = :id 
                ";
                $value = "Rest;";
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':thursday' => $value
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
        
        if(strcmp($_POST['day'], 'Friday') == 0){
            $Friday = '';
            $Saturday = $active;
            
            if ($_POST['fa'] == 'abs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['fa1'])) {
                    $a1 = $_POST['fa1'];
                }
                if(!empty($_POST['fa2'])) {
                    $a2 = $_POST['fa2'];
                }
                if(!empty($_POST['fa3'])) {
                    $a3 = $_POST['fa3'];
                }
                if(!empty($_POST['fa4'])) {
                    $a4 = $_POST['fa4'];
                }
                if(!empty($_POST['fa5'])) {
                    $a5 = $_POST['fa5'];
                }
                if(!empty($_POST['fa6'])) {
                    $a6 = $_POST['fa6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    friday = :friday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':friday' => $value
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
            
            if ($_POST['fb'] == 'chest') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['fb1'])) {
                    $a1 = $_POST['fb1'];
                }
                if(!empty($_POST['fb2'])) {
                    $a2 = $_POST['fb2'];
                }
                if(!empty($_POST['fb3'])) {
                    $a3 = $_POST['fb3'];
                }
                if(!empty($_POST['fb4'])) {
                    $a4 = $_POST['fb4'];
                }
                if(!empty($_POST['fb5'])) {
                    $a5 = $_POST['fb5'];
                }
                if(!empty($_POST['fb6'])) {
                    $a6 = $_POST['fb6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    friday = :friday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':friday' => $value
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
            
            if ($_POST['fc'] == 'legs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['fc1'])) {
                    $a1 = $_POST['fc1'];
                }
                if(!empty($_POST['fc2'])) {
                    $a2 = $_POST['fc2'];
                }
                if(!empty($_POST['fc3'])) {
                    $a3 = $_POST['fc3'];
                }
                if(!empty($_POST['fc4'])) {
                    $a4 = $_POST['fc4'];
                }
                if(!empty($_POST['fc5'])) {
                    $a5 = $_POST['fc5'];
                }
                if(!empty($_POST['fc6'])) {
                    $a6 = $_POST['fc6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    friday = :friday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':friday' => $value
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
            
            if ($_POST['fd'] == 'arms') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['fd1'])) {
                    $a1 = $_POST['fd1'];
                }
                if(!empty($_POST['fd2'])) {
                    $a2 = $_POST['fd2'];
                }
                if(!empty($_POST['fd3'])) {
                    $a3 = $_POST['fd3'];
                }
                if(!empty($_POST['fd4'])) {
                    $a4 = $_POST['fd4'];
                }
                if(!empty($_POST['fd5'])) {
                    $a5 = $_POST['fd5'];
                }
                if(!empty($_POST['fd6'])) {
                    $a6 = $_POST['fd6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    friday = :friday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':friday' => $value
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
            
            if ($_POST['fe'] == 'cardio') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['fe1'])) {
                    $a1 = $_POST['fe1'];
                }
                if(!empty($_POST['fe2'])) {
                    $a2 = $_POST['fe2'];
                }
                if(!empty($_POST['fe3'])) {
                    $a3 = $_POST['fe3'];
                }
                if(!empty($_POST['fe4'])) {
                    $a4 = $_POST['fe4'];
                }
                if(!empty($_POST['fe5'])) {
                    $a5 = $_POST['fe5'];
                }
                if(!empty($_POST['fe6'])) {
                    $a6 = $_POST['fe6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    friday = :friday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':friday' => $value
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
            
            if ($_POST['ff'] == 'rest') {
                
                $query = " 
                UPDATE user_workout
                SET
                    friday = :friday
                WHERE 
                    id = :id 
                ";
                $value = "Rest;";
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':friday' => $value
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
        
        if(strcmp($_POST['day'], 'Saturday') == 0){
            $Saturday = '';
            $Sunday = $active;
            
            if ($_POST['sa'] == 'abs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['sa1'])) {
                    $a1 = $_POST['sa1'];
                }
                if(!empty($_POST['sa2'])) {
                    $a2 = $_POST['sa2'];
                }
                if(!empty($_POST['sa3'])) {
                    $a3 = $_POST['sa3'];
                }
                if(!empty($_POST['sa4'])) {
                    $a4 = $_POST['sa4'];
                }
                if(!empty($_POST['sa5'])) {
                    $a5 = $_POST['sa5'];
                }
                if(!empty($_POST['sa6'])) {
                    $a6 = $_POST['sa6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    saturday = :saturday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':saturday' => $value
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
            
            if ($_POST['sb'] == 'chest') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['sb1'])) {
                    $a1 = $_POST['sb1'];
                }
                if(!empty($_POST['sb2'])) {
                    $a2 = $_POST['sb2'];
                }
                if(!empty($_POST['sb3'])) {
                    $a3 = $_POST['sb3'];
                }
                if(!empty($_POST['sb4'])) {
                    $a4 = $_POST['sb4'];
                }
                if(!empty($_POST['sb5'])) {
                    $a5 = $_POST['sb5'];
                }
                if(!empty($_POST['sb6'])) {
                    $a6 = $_POST['sb6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    saturday = :saturday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':saturday' => $value
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
            
            if ($_POST['sc'] == 'legs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['sc1'])) {
                    $a1 = $_POST['sc1'];
                }
                if(!empty($_POST['sc2'])) {
                    $a2 = $_POST['sc2'];
                }
                if(!empty($_POST['sc3'])) {
                    $a3 = $_POST['sc3'];
                }
                if(!empty($_POST['sc4'])) {
                    $a4 = $_POST['sc4'];
                }
                if(!empty($_POST['sc5'])) {
                    $a5 = $_POST['sc5'];
                }
                if(!empty($_POST['sc6'])) {
                    $a6 = $_POST['sc6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    saturday = :saturday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':saturday' => $value
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
            
            if ($_POST['sd'] == 'arms') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['sd1'])) {
                    $a1 = $_POST['sd1'];
                }
                if(!empty($_POST['sd2'])) {
                    $a2 = $_POST['sd2'];
                }
                if(!empty($_POST['sd3'])) {
                    $a3 = $_POST['sd3'];
                }
                if(!empty($_POST['sd4'])) {
                    $a4 = $_POST['sd4'];
                }
                if(!empty($_POST['sd5'])) {
                    $a5 = $_POST['sd5'];
                }
                if(!empty($_POST['sd6'])) {
                    $a6 = $_POST['sd6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    saturday = :saturday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':saturday' => $value
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
            
            if ($_POST['se'] == 'cardio') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['se1'])) {
                    $a1 = $_POST['se1'];
                }
                if(!empty($_POST['se2'])) {
                    $a2 = $_POST['se2'];
                }
                if(!empty($_POST['se3'])) {
                    $a3 = $_POST['se3'];
                }
                if(!empty($_POST['se4'])) {
                    $a4 = $_POST['se4'];
                }
                if(!empty($_POST['se5'])) {
                    $a5 = $_POST['se5'];
                }
                if(!empty($_POST['se6'])) {
                    $a6 = $_POST['se6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    saturday = :saturday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':saturday' => $value
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
            
            if ($_POST['sf'] == 'rest') {
                
                $query = " 
                UPDATE user_workout
                SET
                    saturday = :saturday
                WHERE 
                    id = :id 
                ";
                $value = "Rest;";
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':saturday' => $value
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
        
        if(strcmp($_POST['day'], 'Sunday') == 0){
            $Sunday = '';
            $Overview = $active;
            
            if ($_POST['ua'] == 'abs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['ua1'])) {
                    $a1 = $_POST['ua1'];
                }
                if(!empty($_POST['ua2'])) {
                    $a2 = $_POST['ua2'];
                }
                if(!empty($_POST['ua3'])) {
                    $a3 = $_POST['ua3'];
                }
                if(!empty($_POST['ua4'])) {
                    $a4 = $_POST['ua4'];
                }
                if(!empty($_POST['ua5'])) {
                    $a5 = $_POST['ua5'];
                }
                if(!empty($_POST['ua6'])) {
                    $a6 = $_POST['ua6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    sunday = :sunday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':sunday' => $value
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
            
            if ($_POST['ub'] == 'chest') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['ub1'])) {
                    $a1 = $_POST['ub1'];
                }
                if(!empty($_POST['ub2'])) {
                    $a2 = $_POST['ub2'];
                }
                if(!empty($_POST['ub3'])) {
                    $a3 = $_POST['ub3'];
                }
                if(!empty($_POST['ub4'])) {
                    $a4 = $_POST['ub4'];
                }
                if(!empty($_POST['ub5'])) {
                    $a5 = $_POST['ub5'];
                }
                if(!empty($_POST['ub6'])) {
                    $a6 = $_POST['ub6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    sunday = :sunday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':sunday' => $value
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
            
            if ($_POST['uc'] == 'legs') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['uc1'])) {
                    $a1 = $_POST['uc1'];
                }
                if(!empty($_POST['uc2'])) {
                    $a2 = $_POST['uc2'];
                }
                if(!empty($_POST['uc3'])) {
                    $a3 = $_POST['uc3'];
                }
                if(!empty($_POST['uc4'])) {
                    $a4 = $_POST['uc4'];
                }
                if(!empty($_POST['uc5'])) {
                    $a5 = $_POST['uc5'];
                }
                if(!empty($_POST['uc6'])) {
                    $a6 = $_POST['uc6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    sunday = :sunday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':sunday' => $value
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
            
            if ($_POST['ud'] == 'arms') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['ud1'])) {
                    $a1 = $_POST['ud1'];
                }
                if(!empty($_POST['ud2'])) {
                    $a2 = $_POST['ud2'];
                }
                if(!empty($_POST['ud3'])) {
                    $a3 = $_POST['ud3'];
                }
                if(!empty($_POST['ud4'])) {
                    $a4 = $_POST['ud4'];
                }
                if(!empty($_POST['ud5'])) {
                    $a5 = $_POST['ud5'];
                }
                if(!empty($_POST['ud6'])) {
                    $a6 = $_POST['ud6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    sunday = :sunday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':sunday' => $value
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
            
            if ($_POST['ue'] == 'cardio') {
                $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = '-1';
                if(!empty($_POST['ue1'])) {
                    $a1 = $_POST['ue1'];
                }
                if(!empty($_POST['ue2'])) {
                    $a2 = $_POST['ue2'];
                }
                if(!empty($_POST['ue3'])) {
                    $a3 = $_POST['ue3'];
                }
                if(!empty($_POST['ue4'])) {
                    $a4 = $_POST['ue4'];
                }
                if(!empty($_POST['ue5'])) {
                    $a5 = $_POST['ue5'];
                }
                if(!empty($_POST['ue6'])) {
                    $a6 = $_POST['ue6'];
                }
                $query = " 
                UPDATE user_workout
                SET
                    sunday = :sunday
                WHERE 
                    id = :id 
                ";
                $value = $a1.";".$a2.";".$a3.";".$a4.";".$a5.";".$a6;
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':sunday' => $value
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
            
            if ($_POST['uf'] == 'rest') {
                
                $query = " 
                UPDATE user_workout
                SET
                    sunday = :sunday
                WHERE 
                    id = :id 
                ";
                $value = "Rest;";
                $query_params = array( 
                ':id' => $_SESSION['user']['id'],
                ':sunday' => $value
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
        
        if(strcmp($_POST['day'], 'Overview') == 0){
            
            
            
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
                    <li class="<?php echo $Overview;?>">Overview</li>
                </ul>
                
                    <div class="12u">
                        
                            <ul class="tab-content">
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>What's up, Monday?</h4>
                                    <h5>I want monday's to be...</h5>
                                    <form method="post" action="workoutplanner.php">
                                        <input type="hidden" name="day" value="Monday">
                                        
                                        <span id="monday-ab-day" style="display:inline;">
                                        <input type="checkbox" id="ma" name="ma" value="abs">
                                            <label for="ma">Abs</label><br/>
                                        </span>
                                        <span id="monday-ab-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="ma1" name="ma1" value="Bodyweight Squat">
                                            <label for="ma1">Bodyweight Squat</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ma2" name="ma2" value="Single Leg Stand">
                                            <label for="ma2">Single Leg Stand</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ma3" name="ma3" value="Sit-up / Crunches">
                                            <label for="ma3">Sit-up / Crunches</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ma4" name="ma4" value="Side Planks">
                                            <label for="ma4">Side Planks</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ma5" name="ma5" value="Glute Bridge">
                                            <label for="ma5">Glute Bridge</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ma6" name="ma6" value="Forward Lunge">
                                            <label for="ma6">Forward Lunge</label><br/>
                                        </span>
                                        
                                        <span id="monday-chest-day" style="display:inline;">
                                        <input type="checkbox" id="mb" name="mb" value="chest">
                                            <label for="mb">Chest Day</label><br/>
                                        </span>
                                        <span id="monday-chest-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="mb1" name="mb1" value="Push Ups">
                                            <label for="mb1">Push Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mb2" name="mb2" value="Bench Press">
                                            <label for="mb2">Bench Press</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mb3" name="mb3" value="Standing Chest Stretch">
                                            <label for="mb3">Standing Chest Stretch</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mb4" name="mb4" value="Lying Dumbbell Pullovers">
                                            <label for="mb4">Lying Dumbbell Pullovers</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mb5" name="mb5" value="Cable Flyes">
                                            <label for="mb5">Cable Flyes</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mb6" name="mb6" value="Inchworms">
                                            <label for="mb6">Inchworms</label><br/>
                                        </span>
                                        
                                        <span id="monday-leg-day" style="display:inline;">
                                        <input type="checkbox" id="mc" name="mc" value="legs">
                                            <label for="mc">Leg Day</label><br/>
                                        </span>
                                        <span id="monday-legs-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="mc1" name="mc1" value="Bodyweight Squats">
                                            <label for="mc1">Bodyweight Squats</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mc2" name="mc2" value="Box Jumps">
                                            <label for="mc2">Box Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mc3" name="mc3" value="Standing Calf Raises">
                                            <label for="mc3">Standing Calf Raises</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mc4" name="mc4" value="Side Lunges">
                                            <label for="mc4">Side Lunges</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mc5" name="mc5" value="Squat Jumps">
                                            <label for="mc5">Squat Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="mc6" name="mc6" value="Hurdle Run">
                                            <label for="mc6">Hurdle Run</label><br/>
                                        </span>
                                        
                                        <span id="monday-arm-day" style="display:inline;">
                                        <input type="checkbox" id="md" name="md" value="arms">
                                            <label for="md">Arm Day</label><br/>
                                        </span>
                                        <span id="monday-arms-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="md1" name="md1" value="Bodyweight Dips">
                                            <label for="md1">Bodyweight Dips</label><br/>
                                            <input class = "subSelection" type="checkbox" id="md2" name="md2" value="Biceps Curl">
                                            <label for="md2">Biceps Curl</label><br/>
                                            <input class = "subSelection" type="checkbox" id="md3" name="md3" value="Chin-Ups">
                                            <label for="md3">Chin-Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="md4" name="md4" value="Lying Barbell Triceps Extensions">
                                            <label for="md4">Lying Barbell Triceps Extensions</label><br/>
                                            <input class = "subSelection" type="checkbox" id="md5" name="md5" value="Seated Row">
                                            <label for="md5">Seated Row</label><br/>
                                            <input class = "subSelection" type="checkbox" id="md6" name="md6" value="Triceps Pushdowns">
                                            <label for="md6">Triceps Pushdowns</label><br/>
                                        </span>
                                        
                                        <span id="monday-cardio-day" style="display:inline;">
                                        <input type="checkbox" id="me" name="me" value="cardio">
                                            <label for="me">Cardio Day</label><br/>
                                        </span>
                                        <span id="monday-cardio-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="me1" name="me1" value="Running">
                                            <label for="me1">Running</label><br/>
                                            <input class = "subSelection" type="checkbox" id="me2" name="me2" value="Biking">
                                            <label for="me2">Biking</label><br/>
                                            <input class = "subSelection" type="checkbox" id="me3" name="me3" value="Swimming">
                                            <label for="me3">Swimming</label><br/>
                                            <input class = "subSelection" type="checkbox" id="me4" name="me4" value="Sports">
                                            <label for="me4">Sports</label><br/>
                                            <input class = "subSelection" type="checkbox" id="me5" name="me5" value="Stairs">
                                            <label for="me5">Stairs</label><br/>
                                            <input class = "subSelection" type="checkbox" id="me6" name="me6" value="Climbing">
                                            <label for="me6">Climbing</label><br/>
                                        </span>
                                        
                                        <span id="monday-rest-day" style="display:inline;">
                                        <input type="checkbox" id="mf" name="mf" value="rest">
                                            <label for="mf">Rest Day</label><br/>
                                        </span>
                                        <span id="monday-rest-holder" style="display:none;">
                                            </span>
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

                                    <form method="post" action="workoutplanner.php">
                                        <input type="hidden" name="day" value="Tuesday">
                                        
                                        <span id="tuesday-ab-day" style="display:inline;">
                                        <input type="checkbox" id="ta" name="ta" value="abs">
                                            <label for="ta">Abs</label><br/>
                                        </span>
                                        <span id="tuesday-ab-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="ta1" name="ta1" value="Bodyweight Squat">
                                            <label for="ta1">Bodyweight Squat</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ta2" name="ta2" value="Single Leg Stand">
                                            <label for="ta2">Single Leg Stand</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ta3" name="ta3" value="Sit-up / Crunches">
                                            <label for="ta3">Sit-up / Crunches</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ta4" name="ta4" value="Side Planks">
                                            <label for="ta4">Side Planks</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ta5" name="ta5" value="Glute Bridge">
                                            <label for="ta5">Glute Bridge</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ta6" name="ta6" value="Forward Lunge">
                                            <label for="ta6">Forward Lunge</label><br/>
                                        </span>
                                        
                                        <span id="tuesday-chest-day" style="display:inline;">
                                        <input type="checkbox" id="tb" name="tb" value="chest">
                                            <label for="tb">Chest Day</label><br/>
                                        </span>
                                        <span id="tuesday-chest-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="tb1" name="tb1" value="Push Ups">
                                            <label for="tb1">Push Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tb2" name="tb2" value="Bench Press">
                                            <label for="tb2">Bench Press</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tb3" name="tb3" value="Standing Chest Stretch">
                                            <label for="tb3">Standing Chest Stretch</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tb4" name="tb4" value="Lying Dumbbell Pullovers">
                                            <label for="tb4">Lying Dumbbell Pullovers</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tb5" name="tb5" value="Cable Flyes">
                                            <label for="tb5">Cable Flyes</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tb6" name="tb6" value="Inchworms">
                                            <label for="tb6">Inchworms</label><br/>
                                        </span>
                                        
                                        <span id="tuesday-leg-day" style="display:inline;">
                                        <input type="checkbox" id="tc" name="tc" value="legs">
                                            <label for="tc">Leg Day</label><br/>
                                        </span>
                                        <span id="tuesday-legs-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="tc1" name="tc1" value="Bodyweight Squats">
                                            <label for="tc1">Bodyweight Squats</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tc2" name="tc2" value="Box Jumps">
                                            <label for="tc2">Box Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tc3" name="tc3" value="Standing Calf Raises">
                                            <label for="tc3">Standing Calf Raises</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tc4" name="tc4" value="Side Lunges">
                                            <label for="tc4">Side Lunges</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tc5" name="tc5" value="Squat Jumps">
                                            <label for="tc5">Squat Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="tc6" name="tc6" value="Hurdle Run">
                                            <label for="tc6">Hurdle Run</label><br/>
                                        </span>
                                        
                                        <span id="tuesday-arm-day" style="display:inline;">
                                        <input type="checkbox" id="td" name="td" value="arms">
                                            <label for="td">Arm Day</label><br/>
                                        </span>
                                        <span id="tuesday-arms-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="td1" name="td1" value="Bodyweight Dips">
                                            <label for="td1">Bodyweight Dips</label><br/>
                                            <input class = "subSelection" type="checkbox" id="td2" name="td2" value="Biceps Curl">
                                            <label for="td2">Biceps Curl</label><br/>
                                            <input class = "subSelection" type="checkbox" id="td3" name="td3" value="Chin-Ups">
                                            <label for="td3">Chin-Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="td4" name="td4" value="Lying Barbell Triceps Extensions">
                                            <label for="td4">Lying Barbell Triceps Extensions</label><br/>
                                            <input class = "subSelection" type="checkbox" id="td5" name="td5" value="Seated Row">
                                            <label for="td5">Seated Row</label><br/>
                                            <input class = "subSelection" type="checkbox" id="td6" name="td6" value="Triceps Pushdowns">
                                            <label for="td6">Triceps Pushdowns</label><br/>
                                        </span>
                                        
                                        <span id="tuesday-cardio-day" style="display:inline;">
                                        <input type="checkbox" id="te" name="te" value="cardio">
                                            <label for="te">Cardio Day</label><br/>
                                        </span>
                                        <span id="tuesday-cardio-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="te1" name="te1" value="Running">
                                            <label for="te1">Running</label><br/>
                                            <input class = "subSelection" type="checkbox" id="te2" name="te2" value="Biking">
                                            <label for="te2">Biking</label><br/>
                                            <input class = "subSelection" type="checkbox" id="te3" name="te3" value="Swimming">
                                            <label for="te3">Swimming</label><br/>
                                            <input class = "subSelection" type="checkbox" id="te4" name="te4" value="Sports">
                                            <label for="te4">Sports</label><br/>
                                            <input class = "subSelection" type="checkbox" id="te5" name="te5" value="Stairs">
                                            <label for="te5">Stairs</label><br/>
                                            <input class = "subSelection" type="checkbox" id="te6" name="te6" value="Climbing">
                                            <label for="te6">Climbing</label><br/>
                                        </span>
                                        
                                        
                                        <span id="tuesday-rest-day" style="display:inline;">
                                        <input type="checkbox" id="tf" name="tf" value="rest">
                                            <label for="tf">Rest Day</label><br/>
                                        </span>
                                        <span id="tuesday-rest-holder" style="display:none;">
                                            </span>
                                         <ul class="actions align-right">
                                            <li>
                                                <input type="submit" class="button" value="Next" />
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Keepin' it classy, Wednesday?</h4>
                                    <h5>I want wednesday's to be...</h5>

                                    <form method="post" action="workoutplanner.php">
                                        <input type="hidden" name="day" value="Wednesday">
                                        
                                        <span id="wednesday-ab-day" style="display:inline;">
                                        <input type="checkbox" id="wa" name="wa" value="abs">
                                            <label for="wa">Abs</label><br/>
                                        </span>
                                        <span id="wednesday-ab-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="wa1" name="wa1" value="Bodyweight Squat">
                                            <label for="wa1">Bodyweight Squat</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wa2" name="wa2" value="Single Leg Stand">
                                            <label for="wa2">Single Leg Stand</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wa3" name="wa3" value="Sit-up / Crunches">
                                            <label for="wa3">Sit-up / Crunches</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wa4" name="wa4" value="Side Planks">
                                            <label for="wa4">Side Planks</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wa5" name="wa5" value="Glute Bridge">
                                            <label for="wa5">Glute Bridge</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wa6" name="wa6" value="Forward Lunge">
                                            <label for="wa6">Forward Lunge</label><br/>
                                        </span>
                                        
                                        <span id="wednesday-chest-day" style="display:inline;">
                                        <input type="checkbox" id="wb" name="wb" value="chest">
                                            <label for="wb">Chest Day</label><br/>
                                        </span>
                                        <span id="wednesday-chest-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="wb1" name="wb1" value="Push Ups">
                                            <label for="wb1">Push Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wb2" name="wb2" value="Bench Press">
                                            <label for="wb2">Bench Press</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wb3" name="wb3" value="Standing Chest Stretch">
                                            <label for="wb3">Standing Chest Stretch</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wb4" name="wb4" value="Lying Dumbbell Pullovers">
                                            <label for="wb4">Lying Dumbbell Pullovers</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wb5" name="wb5" value="Cable Flyes">
                                            <label for="wb5">Cable Flyes</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wb6" name="wb6" value="Inchworms">
                                            <label for="wb6">Inchworms</label><br/>
                                        </span>
                                        
                                        <span id="wednesday-leg-day" style="display:inline;">
                                        <input type="checkbox" id="wc" name="wc" value="legs">
                                            <label for="wc">Leg Day</label><br/>
                                        </span>
                                        <span id="wednesday-legs-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="wc1" name="wc1" value="Bodyweight Squats">
                                            <label for="wc1">Bodyweight Squats</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wc2" name="wc2" value="Box Jumps">
                                            <label for="wc2">Box Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wc3" name="wc3" value="Standing Calf Raises">
                                            <label for="wc3">Standing Calf Raises</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wc4" name="wc4" value="Side Lunges">
                                            <label for="wc4">Side Lunges</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wc5" name="wc5" value="Squat Jumps">
                                            <label for="wc5">Squat Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wc6" name="wc6" value="Hurdle Run">
                                            <label for="wc6">Hurdle Run</label><br/>
                                        </span>
                                        
                                        <span id="wednesday-arm-day" style="display:inline;">
                                        <input type="checkbox" id="wd" name="wd" value="arms">
                                            <label for="wd">Arm Day</label><br/>
                                        </span>
                                        <span id="wednesday-arms-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="wd1" name="wd1" value="Bodyweight Dips">
                                            <label for="wd1">Bodyweight Dips</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wd2" name="wd2" value="Biceps Curl">
                                            <label for="wd2">Biceps Curl</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wd3" name="wd3" value="Chin-Ups">
                                            <label for="wd3">Chin-Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wd4" name="wd4" value="Lying Barbell Triceps Extensions">
                                            <label for="wd4">Lying Barbell Triceps Extensions</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wd5" name="wd5" value="Seated Row">
                                            <label for="wd5">Seated Row</label><br/>
                                            <input class = "subSelection" type="checkbox" id="wd6" name="wd6" value="Triceps Pushdowns">
                                            <label for="wd6">Triceps Pushdowns</label><br/>
                                        </span>
                                        
                                        <span id="wednesday-cardio-day" style="display:inline;">
                                        <input type="checkbox" id="we" name="we" value="cardio">
                                            <label for="we">Cardio Day</label><br/>
                                        </span>
                                        <span id="wednesday-cardio-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="we1" name="we1" value="Running">
                                            <label for="we1">Running</label><br/>
                                            <input class = "subSelection" type="checkbox" id="we2" name="we2" value="Biking">
                                            <label for="we2">Biking</label><br/>
                                            <input class = "subSelection" type="checkbox" id="we3" name="we3" value="Swimming">
                                            <label for="we3">Swimming</label><br/>
                                            <input class = "subSelection" type="checkbox" id="we4" name="we4" value="Sports">
                                            <label for="we4">Sports</label><br/>
                                            <input class = "subSelection" type="checkbox" id="we5" name="we5" value="Stairs">
                                            <label for="we5">Stairs</label><br/>
                                            <input class = "subSelection" type="checkbox" id="we6" name="we6" value="Climbing">
                                            <label for="we6">Climbing</label><br/>
                                        </span>
                                        
                                        
                                        <span id="wednesday-rest-day" style="display:inline;">
                                        <input type="checkbox" id="wf" name="wf" value="rest">
                                            <label for="wf">Rest Day</label><br/>
                                        </span>
                                        <span id="wednesday-rest-holder" style="display:none;">
                                        </span>
                                         <ul class="actions align-right">
                                            <li>
                                                <input type="submit" class="button" value="Next" />
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Howdy, Thursday!</h4>
                                    <h5>I want thursday's to be...</h5>

                                    <form method="post" action="workoutplanner.php">
                                        <input type="hidden" name="day" value="Thursday">
                                        
                                        <span id="thursday-ab-day" style="display:inline;">
                                        <input type="checkbox" id="ra" name="ra" value="abs">
                                            <label for="ra">Abs</label><br/>
                                        </span>
                                        <span id="thursday-ab-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="ra1" name="ra1" value="Bodyweight Squat">
                                            <label for="ra1">Bodyweight Squat</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ra2" name="ra2" value="Single Leg Stand">
                                            <label for="ra2">Single Leg Stand</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ra3" name="ra3" value="Sit-up / Crunches">
                                            <label for="ra3">Sit-up / Crunches</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ra4" name="ra4" value="Side Planks">
                                            <label for="ra4">Side Planks</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ra5" name="ra5" value="Glute Bridge">
                                            <label for="ra5">Glute Bridge</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ra6" name="ra6" value="Forward Lunge">
                                            <label for="ra6">Forward Lunge</label><br/>
                                        </span>
                                        
                                        <span id="thursday-chest-day" style="display:inline;">
                                        <input type="checkbox" id="rb" name="rb" value="chest">
                                            <label for="rb">Chest Day</label><br/>
                                        </span>
                                        <span id="thursday-chest-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="rb1" name="rb1" value="Push Ups">
                                            <label for="rb1">Push Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rb2" name="rb2" value="Bench Press">
                                            <label for="rb2">Bench Press</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rb3" name="rb3" value="Standing Chest Stretch">
                                            <label for="rb3">Standing Chest Stretch</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rb4" name="rb4" value="Lying Dumbbell Pullovers">
                                            <label for="rb4">Lying Dumbbell Pullovers</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rb5" name="rb5" value="Cable Flyes">
                                            <label for="rb5">Cable Flyes</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rb6" name="rb6" value="Inchworms">
                                            <label for="rb6">Inchworms</label><br/>
                                        </span>
                                        
                                        <span id="thursday-leg-day" style="display:inline;">
                                        <input type="checkbox" id="rc" name="rc" value="legs">
                                            <label for="rc">Leg Day</label><br/>
                                        </span>
                                        <span id="thursday-legs-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="rc1" name="rc1" value="Bodyweight Squats">
                                            <label for="rc1">Bodyweight Squats</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rc2" name="rc2" value="Box Jumps">
                                            <label for="rc2">Box Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rc3" name="rc3" value="Standing Calf Raises">
                                            <label for="rc3">Standing Calf Raises</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rc4" name="rc4" value="Side Lunges">
                                            <label for="rc4">Side Lunges</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rc5" name="rc5" value="Squat Jumps">
                                            <label for="rc5">Squat Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rc6" name="rc6" value="Hurdle Run">
                                            <label for="rc6">Hurdle Run</label><br/>
                                        </span>
                                        
                                        <span id="thursday-arm-day" style="display:inline;">
                                        <input type="checkbox" id="rd" name="rd" value="arms">
                                            <label for="rd">Arm Day</label><br/>
                                        </span>
                                        <span id="thursday-arms-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="rd1" name="rd1" value="Bodyweight Dips">
                                            <label for="rd1">Bodyweight Dips</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rd2" name="rd2" value="Biceps Curl">
                                            <label for="rd2">Biceps Curl</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rd3" name="rd3" value="Chin-Ups">
                                            <label for="rd3">Chin-Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rd4" name="rd4" value="Lying Barbell Triceps Extensions">
                                            <label for="rd4">Lying Barbell Triceps Extensions</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rd5" name="rd5" value="Seated Row">
                                            <label for="rd5">Seated Row</label><br/>
                                            <input class = "subSelection" type="checkbox" id="rd6" name="rd6" value="Triceps Pushdowns">
                                            <label for="rd6">Triceps Pushdowns</label><br/>
                                        </span>
                                        
                                        <span id="thursday-cardio-day" style="display:inline;">
                                        <input type="checkbox" id="re" name="re" value="cardio">
                                            <label for="re">Cardio Day</label><br/>
                                        </span>
                                        <span id="thursday-cardio-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="re1" name="re1" value="Running">
                                            <label for="re1">Running</label><br/>
                                            <input class = "subSelection" type="checkbox" id="re2" name="re2" value="Biking">
                                            <label for="re2">Biking</label><br/>
                                            <input class = "subSelection" type="checkbox" id="re3" name="re3" value="Swimming">
                                            <label for="re3">Swimming</label><br/>
                                            <input class = "subSelection" type="checkbox" id="re4" name="re4" value="Sports">
                                            <label for="re4">Sports</label><br/>
                                            <input class = "subSelection" type="checkbox" id="re5" name="re5" value="Stairs">
                                            <label for="re5">Stairs</label><br/>
                                            <input class = "subSelection" type="checkbox" id="re6" name="re6" value="Climbing">
                                            <label for="re6">Climbing</label><br/>
                                        </span>
                                        
                                        
                                        <span id="thursday-rest-day" style="display:inline;">
                                        <input type="checkbox" id="rf" name="rf" value="rest">
                                            <label for="rf">Rest Day</label><br/>
                                        </span>
                                        <span id="rest-holder" style="display:none;">
                                        </span>
                                         <ul class="actions align-right">
                                            <li>
                                                <input type="submit" class="button" value="Next" />
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Thank goodness it's Friday!</h4>
                                    <h5>I want friday's to be...</h5>

                                    <form method="post" action="workoutplanner.php">
                                        <input type="hidden" name="day" value="Friday">
                                        
                                        <span id="friday-ab-day" style="display:inline;">
                                        <input type="checkbox" id="fa" name="fa" value="abs">
                                            <label for="fa">Abs</label><br/>
                                        </span>
                                        <span id="friday-ab-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="fa1" name="fa1" value="Bodyweight Squat">
                                            <label for="fa1">Bodyweight Squat</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fa2" name="fa2" value="Single Leg Stand">
                                            <label for="fa2">Single Leg Stand</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fa3" name="fa3" value="Sit-up / Crunches">
                                            <label for="fa3">Sit-up / Crunches</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fa4" name="fa4" value="Side Planks">
                                            <label for="fa4">Side Planks</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fa5" name="fa5" value="Glute Bridge">
                                            <label for="fa5">Glute Bridge</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fa6" name="fa6" value="Forward Lunge">
                                            <label for="fa6">Forward Lunge</label><br/>
                                        </span>
                                        
                                        <span id="friday-chest-day" style="display:inline;">
                                        <input type="checkbox" id="fb" name="fb" value="chest">
                                            <label for="fb">Chest Day</label><br/>
                                        </span>
                                        <span id="friday-chest-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="fb1" name="fb1" value="Push Ups">
                                            <label for="fb1">Push Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fb2" name="fb2" value="Bench Press">
                                            <label for="fb2">Bench Press</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fb3" name="fb3" value="Standing Chest Stretch">
                                            <label for="fb3">Standing Chest Stretch</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fb4" name="fb4" value="Lying Dumbbell Pullovers">
                                            <label for="fb4">Lying Dumbbell Pullovers</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fb5" name="fb5" value="Cable Flyes">
                                            <label for="fb5">Cable Flyes</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fb6" name="fb6" value="Inchworms">
                                            <label for="fb6">Inchworms</label><br/>
                                        </span>
                                        
                                        <span id="friday-leg-day" style="display:inline;">
                                        <input type="checkbox" id="fc" name="fc" value="legs">
                                            <label for="fc">Leg Day</label><br/>
                                        </span>
                                        <span id="friday-legs-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="fc1" name="fc1" value="Bodyweight Squats">
                                            <label for="fc1">Bodyweight Squats</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fc2" name="fc2" value="Box Jumps">
                                            <label for="fc2">Box Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fc3" name="fc3" value="Standing Calf Raises">
                                            <label for="fc3">Standing Calf Raises</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fc4" name="fc4" value="Side Lunges">
                                            <label for="fc4">Side Lunges</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fc5" name="fc5" value="Squat Jumps">
                                            <label for="fc5">Squat Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fc6" name="fc6" value="Hurdle Run">
                                            <label for="fc6">Hurdle Run</label><br/>
                                        </span>
                                        
                                        <span id="friday-arm-day" style="display:inline;">
                                        <input type="checkbox" id="fd" name="fd" value="arms">
                                            <label for="fd">Arm Day</label><br/>
                                        </span>
                                        <span id="friday-arms-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="fd1" name="fd1" value="Bodyweight Dips">
                                            <label for="fd1">Bodyweight Dips</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fd2" name="fd2" value="Biceps Curl">
                                            <label for="fd2">Biceps Curl</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fd3" name="fd3" value="Chin-Ups">
                                            <label for="fd3">Chin-Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fd4" name="fd4" value="Lying Barbell Triceps Extensions">
                                            <label for="fd4">Lying Barbell Triceps Extensions</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fd5" name="fd5" value="Seated Row">
                                            <label for="fd5">Seated Row</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fd6" name="fd6" value="Triceps Pushdowns">
                                            <label for="fd6">Triceps Pushdowns</label><br/>
                                        </span>
                                        
                                        <span id="friday-cardio-day" style="display:inline;">
                                        <input type="checkbox" id="fe" name="fe" value="cardio">
                                            <label for="fe">Cardio Day</label><br/>
                                        </span>
                                        <span id="friday-cardio-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="fe1" name="fe1" value="Running">
                                            <label for="fe1">Running</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fe2" name="fe2" value="Biking">
                                            <label for="fe2">Biking</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fe3" name="fe3" value="Swimming">
                                            <label for="fe3">Swimming</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fe4" name="fe4" value="Sports">
                                            <label for="fe4">Sports</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fe5" name="fe5" value="Stairs">
                                            <label for="fe5">Stairs</label><br/>
                                            <input class = "subSelection" type="checkbox" id="fe6" name="fe6" value="Climbing">
                                            <label for="fe6">Climbing</label><br/>
                                        </span>
                                        
                                        
                                        <span id="friday-rest-day" style="display:inline;">
                                        <input type="checkbox" id="ff" name="ff" value="rest">
                                            <label for="ff">Rest Day</label><br/>
                                        </span>
                                        <span id="rest-holder" style="display:none;">
                                        </span>
                                         <ul class="actions align-right">
                                            <li>
                                                <input type="submit" class="button" value="Next" />
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Keeping it real on, Saturday?</h4>
                                    <h5>I want saturday's to be...</h5>

                                    <form method="post" action="workoutplanner.php">
                                        <input type="hidden" name="day" value="Saturday">
                                        
                                        <span id="saturday-ab-day" style="display:inline;">
                                        <input type="checkbox" id="sa" name="sa" value="abs">
                                            <label for="sa">Abs</label><br/>
                                        </span>
                                        <span id="saturday-ab-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="sa1" name="sa1" value="Bodyweight Squat">
                                            <label for="sa1">Bodyweight Squat</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sa2" name="sa2" value="Single Leg Stand">
                                            <label for="sa2">Single Leg Stand</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sa3" name="sa3" value="Sit-up / Crunches">
                                            <label for="sa3">Sit-up / Crunches</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sa4" name="sa4" value="Side Planks">
                                            <label for="sa4">Side Planks</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sa5" name="sa5" value="Glute Bridge">
                                            <label for="sa5">Glute Bridge</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sa6" name="sa6" value="Forward Lunge">
                                            <label for="sa6">Forward Lunge</label><br/>
                                        </span>
                                        
                                        <span id="saturday-chest-day" style="display:inline;">
                                        <input type="checkbox" id="sb" name="sb" value="chest">
                                            <label for="sb">Chest Day</label><br/>
                                        </span>
                                        <span id="saturday-chest-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="sb1" name="sb1" value="Push Ups">
                                            <label for="sb1">Push Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sb2" name="sb2" value="Bench Press">
                                            <label for="sb2">Bench Press</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sb3" name="sb3" value="Standing Chest Stretch">
                                            <label for="sb3">Standing Chest Stretch</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sb4" name="sb4" value="Lying Dumbbell Pullovers">
                                            <label for="sb4">Lying Dumbbell Pullovers</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sb5" name="sb5" value="Cable Flyes">
                                            <label for="sb5">Cable Flyes</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sb6" name="sb6" value="Inchworms">
                                            <label for="sb6">Inchworms</label><br/>
                                        </span>
                                        
                                        <span id="saturday-leg-day" style="display:inline;">
                                        <input type="checkbox" id="sc" name="sc" value="legs">
                                            <label for="sc">Leg Day</label><br/>
                                        </span>
                                        <span id="saturday-legs-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="sc1" name="sc1" value="Bodyweight Squats">
                                            <label for="sc1">Bodyweight Squats</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sc2" name="sc2" value="Box Jumps">
                                            <label for="sc2">Box Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sc3" name="sc3" value="Standing Calf Raises">
                                            <label for="sc3">Standing Calf Raises</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sc4" name="sc4" value="Side Lunges">
                                            <label for="sc4">Side Lunges</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sc5" name="sc5" value="Squat Jumps">
                                            <label for="sc5">Squat Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sc6" name="sc6" value="Hurdle Run">
                                            <label for="sc6">Hurdle Run</label><br/>
                                        </span>
                                        
                                        <span id="saturday-arm-day" style="display:inline;">
                                        <input type="checkbox" id="sd" name="sd" value="arms">
                                            <label for="sd">Arm Day</label><br/>
                                        </span>
                                        <span id="saturday-arms-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="sd1" name="sd1" value="Bodyweight Dips">
                                            <label for="sd1">Bodyweight Dips</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sd2" name="sd2" value="Biceps Curl">
                                            <label for="sd2">Biceps Curl</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sd3" name="sd3" value="Chin-Ups">
                                            <label for="sd3">Chin-Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sd4" name="sd4" value="Lying Barbell Triceps Extensions">
                                            <label for="sd4">Lying Barbell Triceps Extensions</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sd5" name="sd5" value="Seated Row">
                                            <label for="sd5">Seated Row</label><br/>
                                            <input class = "subSelection" type="checkbox" id="sd6" name="sd6" value="Triceps Pushdowns">
                                            <label for="sd6">Triceps Pushdowns</label><br/>
                                        </span>
                                        
                                        <span id="saturday-cardio-day" style="display:inline;">
                                        <input type="checkbox" id="se" name="se" value="cardio">
                                            <label for="se">Cardio Day</label><br/>
                                        </span>
                                        <span id="saturday-cardio-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="se1" name="se1" value="Running">
                                            <label for="se1">Running</label><br/>
                                            <input class = "subSelection" type="checkbox" id="se2" name="se2" value="Biking">
                                            <label for="se2">Biking</label><br/>
                                            <input class = "subSelection" type="checkbox" id="se3" name="se3" value="Swimming">
                                            <label for="se3">Swimming</label><br/>
                                            <input class = "subSelection" type="checkbox" id="se4" name="se4" value="Sports">
                                            <label for="se4">Sports</label><br/>
                                            <input class = "subSelection" type="checkbox" id="se5" name="se5" value="Stairs">
                                            <label for="se5">Stairs</label><br/>
                                            <input class = "subSelection" type="checkbox" id="se6" name="se6" value="Climbing">
                                            <label for="se6">Climbing</label><br/>
                                        </span>
                                        
                                        
                                        <span id="saturday-rest-day" style="display:inline;">
                                        <input type="checkbox" id="sf" name="sf" value="rest">
                                            <label for="sf">Rest Day</label><br/>
                                        </span>
                                        <span id="rest-holder" style="display:none;">
                                        </span>
                                         <ul class="actions align-right">
                                            <li>
                                                <input type="submit" class="button" value="Next" />
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>How you doin', Sunday?</h4>
                                    <h5>I want sunday's to be...</h5>

                                    <form method="post" action="workoutplanner.php">
                                        <input type="hidden" name="day" value="Sunday">
                                        
                                        <span id="sunday-ab-day" style="display:inline;">
                                        <input type="checkbox" id="ua" name="ua" value="abs">
                                            <label for="ua">Abs</label><br/>
                                        </span>
                                        <span id="sunday-ab-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="ua1" name="ua1" value="Bodyweight Squat">
                                            <label for="ua1">Bodyweight Squat</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ua2" name="ua2" value="Single Leg Stand">
                                            <label for="ua2">Single Leg Stand</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ua3" name="ua3" value="Sit-up / Crunches">
                                            <label for="ua3">Sit-up / Crunches</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ua4" name="ua4" value="Side Planks">
                                            <label for="ua4">Side Planks</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ua5" name="ua5" value="Glute Bridge">
                                            <label for="ua5">Glute Bridge</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ua6" name="ua6" value="Forward Lunge">
                                            <label for="ua6">Forward Lunge</label><br/>
                                        </span>
                                        
                                        <span id="sunday-chest-day" style="display:inline;">
                                        <input type="checkbox" id="ub" name="ub" value="chest">
                                            <label for="ub">Chest Day</label><br/>
                                        </span>
                                        <span id="sunday-chest-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="ub1" name="ub1" value="Push Ups">
                                            <label for="ub1">Push Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ub2" name="ub2" value="Bench Press">
                                            <label for="ub2">Bench Press</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ub3" name="ub3" value="Standing Chest Stretch">
                                            <label for="ub3">Standing Chest Stretch</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ub4" name="ub4" value="Lying Dumbbell Pullovers">
                                            <label for="ub4">Lying Dumbbell Pullovers</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ub5" name="ub5" value="Cable Flyes">
                                            <label for="ub5">Cable Flyes</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ub6" name="ub6" value="Inchworms">
                                            <label for="ub6">Inchworms</label><br/>
                                        </span>
                                        
                                        <span id="sunday-leg-day" style="display:inline;">
                                        <input type="checkbox" id="uc" name="uc" value="legs">
                                            <label for="uc">Leg Day</label><br/>
                                        </span>
                                        <span id="sunday-legs-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="uc1" name="uc1" value="Bodyweight Squats">
                                            <label for="uc1">Bodyweight Squats</label><br/>
                                            <input class = "subSelection" type="checkbox" id="uc2" name="uc2" value="Box Jumps">
                                            <label for="uc2">Box Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="uc3" name="uc3" value="Standing Calf Raises">
                                            <label for="uc3">Standing Calf Raises</label><br/>
                                            <input class = "subSelection" type="checkbox" id="uc4" name="uc4" value="Side Lunges">
                                            <label for="uc4">Side Lunges</label><br/>
                                            <input class = "subSelection" type="checkbox" id="uc5" name="uc5" value="Squat Jumps">
                                            <label for="uc5">Squat Jumps</label><br/>
                                            <input class = "subSelection" type="checkbox" id="uc6" name="uc6" value="Hurdle Run">
                                            <label for="uc6">Hurdle Run</label><br/>
                                        </span>
                                        
                                        <span id="sunday-arm-day" style="display:inline;">
                                        <input type="checkbox" id="ud" name="ud" value="arms">
                                            <label for="ud">Arm Day</label><br/>
                                        </span>
                                        <span id="sunday-arms-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="ud1" name="ud1" value="Bodyweight Dips">
                                            <label for="ud1">Bodyweight Dips</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ud2" name="ud2" value="Biceps Curl">
                                            <label for="ud2">Biceps Curl</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ud3" name="ud3" value="Chin-Ups">
                                            <label for="ud3">Chin-Ups</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ud4" name="ud4" value="Lying Barbell Triceps Extensions">
                                            <label for="ud4">Lying Barbell Triceps Extensions</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ud5" name="ud5" value="Seated Row">
                                            <label for="ud5">Seated Row</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ud6" name="ud6" value="Triceps Pushdowns">
                                            <label for="ud6">Triceps Pushdowns</label><br/>
                                        </span>
                                        
                                        <span id="sunday-cardio-day" style="display:inline;">
                                        <input type="checkbox" id="ue" name="ue" value="cardio">
                                            <label for="ue">Cardio Day</label><br/>
                                        </span>
                                        <span id="sunday-cardio-holder" style="display:none;">
                                            <input class = "subSelection" type="checkbox" id="ue1" name="ue1" value="Running">
                                            <label for="ue1">Running</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ue2" name="ue2" value="Biking">
                                            <label for="ue2">Biking</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ue3" name="ue3" value="Swimming">
                                            <label for="ue3">Swimming</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ue4" name="ue4" value="Sports">
                                            <label for="ue4">Sports</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ue5" name="ue5" value="Stairs">
                                            <label for="ue5">Stairs</label><br/>
                                            <input class = "subSelection" type="checkbox" id="ue6" name="ue6" value="Climbing">
                                            <label for="ue6">Climbing</label><br/>
                                        </span>
                                        
                                        <span id="sunday-rest-day" style="display:inline;">
                                        <input type="checkbox" id="uf" name="uf" value="rest">
                                            <label for="uf">Rest Day</label><br/>
                                        </span>
                                        <span id="rest-holder" style="display:none;">
                                        </span>
                                         <ul class="actions align-right">
                                            <li>
                                                <input type="submit" id="sunday-next" class="button" value="Next" />
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                                
                                <li>
                                    <!--TAB CONTENT-->
                                    <h4>Overview</h4>
                                    <h5>Here is what your week will look like...</h5>
                                    
                                    <?php
$query = " SELECT monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM user_workout WHERE id = :id "; $query_params = array( ':id' => $_SESSION['user']['id'] ); try { $stmt = $db->prepare($query); $result = $stmt->execute($query_params); } catch(PDOException $ex) { die("An error occured, please try again"); } $row = $stmt->fetch(); $mondayResults = $row['monday']; $tuesdayResults = $row['tuesday']; $wednesdayResults = $row['wednesday']; $thursdayResults = $row['thursday']; $fridayResults = $row['friday']; $saturdayResults = $row['saturday']; $sundayResults = $row['sunday'];

                                    ?>
                                    
                                    <ul class="actions align-left">
                                    <p><b>Monday:</b>
                                        <?php echo formatResults($mondayResults); ?> </p><br/>
                                    <p><b>Tuesday:</b>
                                        <?php echo formatResults($tuesdayResults); ?> </p><br/>
                                    <p><b>Wednesday:</b>
                                        <?php echo formatResults($wednesdayResults); ?> </p><br/>
                                    <p><b>Thursday:</b>
                                        <?php echo formatResults($thursdayResults); ?> </p><br/>
                                    <p><b>Friday:</b>
                                        <?php echo formatResults($fridayResults); ?> </p><br/>
                                    <p><b>Saturday:</b>
                                        <?php echo formatResults($saturdayResults); ?> </p><br/>
                                    <p><b>Sunday:</b>
                                        <?php echo formatResults($sundayResults); ?> </p><br/>
                                    </ul>
                                    <form action="mypage.php">
                                        <input type="submit" value="Done">
                                    </form>
                                </li>
                            </ul>
                        
                    
                </div>
            </div>
        </section>


    </header>

</section>
<!-- footer -->
<?php include('footer.php') ?>
