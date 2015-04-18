
<?php 
    require("common.php"); 

	$date = date('l, M d, Y');
	$tDate = date('Y-m-d');
	$curdate = new DateTime($tDate);
	
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
                goal,
				calBurned,
				calConsumed,
				Registered
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
		
		$regdate = new DateTime($row['Registered']);
		
		//$rawNumDays = floor(($curdate - $row['Registered'])/(60*60*24));
		$interval = $regdate->diff($curdate);
		$rawNumDays = $interval->days;
		if($rawNumDays < 1){
			$numDays = 1;
		}
		else{
			$numDays = $rawNumDays;
		}
		
		$nBurn = (double) $row['calBurned'];
		$nCons = (double) $row['calConsumed'];
		$avgBurn = (double) ($nBurn / $numDays);
		$avgCon = (double) ($nCons / $numDays);
		
?>

<!--Data Script-->
<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]
		}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
	</script>

<!-- Header -->
<?php 
    $pageTitle = "Data Viewer"; 
    include( 'headerprivate.php' ); 
?>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/Chart.js"></script>

<!-- Main -->


<section id="main" class="container">

    <div id="center">
    <div id="welcome">
        <h2>Look at what we made for you, <?php echo $_SESSION['user']['name']; ?>! </h2>

    </div>
        </div>
</header>

<div class="box">
    <div style="width:60%">
        <div>
            
            <canvas id="canvas" height="450" width="600" style="padding-left: 0; padding-right: 0; margin-left: auto;margin-right: auto;"></canvas>

        </div>
    </div>

</div> 


    <hr />
</section>

<!-- footer -->
<?php include('footer.php') ?>