 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Vote</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="styles.css" type="text/css"></link>
  <script src="jquery.js" type="text/javascript"></script>

  <?php 
    session_start();


    if(isset($_POST['vID'])) { 
    	$_SESSION['ses_vID'] = $_POST['vID']; 
    }
    else{
    	if(!isset($_SESSION['ses_vID'])) { 
    	header("Location: http://localhost/voting_system/index.php");}
    }

    if ($_SESSION['fromExit'] == 1){
        header("Location: http://localhost/voting_system/index.php");
        $_SESSION['fromExit'] = 0;
        //header("Location: http://www.google.com");
        exit;
      }

    $district = 0;

    if($_SESSION['ses_vID'] >= 00000000 && $_SESSION['ses_vID'] <= 25000000) {
    	$district = 0;
    	$_SESSION['district'] = 0;
    }
    if($_SESSION['ses_vID'] >= 25000001 && $_SESSION['ses_vID'] <= 50000000) {
    	$district = 1;
    	$_SESSION['district'] = 1;
    }
    if($_SESSION['ses_vID'] >= 50000001 && $_SESSION['ses_vID'] <= 75000000) {
    	$district = 2;
    	$_SESSION['district'] = 2;
    }
    if($_SESSION['ses_vID'] >= 75000001 && $_SESSION['ses_vID'] <= 99999999) {
    	$district = 3;
    	$_SESSION['district'] = 3;
    }
    //i

  ?>

  <script>
  $(document).ready(function(){
    
        $("#clear_but").click(function(){
        alert("Clear.");
             for(i =0;i<100; i++){
    			var wi_var = "wi_r" + i;
    			var but_var = "r" + i;
    				
    			if ( $( 'input[name="' + but_var + '"]' ).length ) {
    				var canVal = $('input[name="' + but_var + '"]:checked', '#test').val();

							console.log("in if!");
							$('input:text[name="' + wi_var + '"]').val( "" );

							$('input[name="' + but_var + '"]').prop('checked', false);
							$('input[name="' + wi_var + '"]').prop('checked', false);

						}
						
					}
    			
   		 });
	});

  window.onload = function(){
    //alert("hello?");
	};


	$(window).on("load", function(){
    //alert("hello2222?");

    //$('input:text[name="wi_r1"]').prop('disabled', true);
    //$('input:text[name="wi_r2"]').prop('disabled', true);

        			for(i =0;i<100; i++){
    				var wi_var = "wi_r" + i;
    				var but_var = "r" + i;
    				//console.log("FIRST LOOP!" + wi_var);

    				if ( $( 'input[name="' + but_var + '"]' ).length ) {
    					//console.log("FIRST IF11111!" + but_var);
    					//var canVal0 = $('input[name="' + but_var + '"]:checked', '#test').val();
    					//console.log("FIRST IF22222!" + canVal0);
						//if(canVal0.startsWith("_")){
						//	console.log("Second IF!");

						if( $('input:text[name="' + wi_var + '"]').val() == "" ){ 
							$('input:text[name="' + wi_var + '"]').prop('disabled', true);}
							//console.log("I GOT TO THE POINT!");}
						else{
							$('input:text[name="' + wi_var + '"]').prop('disabled', false);}
						}

							
    					}

      		$('#test input').on('change', function() {
      			//console.log("in on change!");

    			for(i =0;i<100; i++){
    				var wi_var = "wi_r" + i;
    				var but_var = "r" + i;
    				//console.log(wi_var, "  ", but_var);
      			
      				//console.log("   " + wi_var);
      				//console.log("   " + but_var);
					// var name = element.getAttribute("input:checked");
					// concole.log(name);

      				//console.log("val    " + $('input[name="' + but_var + '"]:checked', '#test').val());


					if ( $( 'input[name="' + but_var + '"]' ).length ) {
						//console.log("in length");

		      			var canVal = $('input[name="' + but_var + '"]:checked', '#test').val();
						if(canVal && canVal.startsWith("_")){

							console.log("in if!");
							$('input:text[name="' + wi_var + '"]').val( "" );
							$('input:text[name="' + wi_var + '"]').prop('disabled', true);

						}
						if(canVal && !canVal.startsWith("_")) {
							$('input:text[name="' + wi_var + '"]').prop('disabled', false);
						}
				}
			}
			});
  		
	});
  </script>


</head>

<body>
<div class="container">

  <div class="jumbotron text-center">
  	<h1>Ballot</h1>
  	<p>Please select the canidates you would like to vote for.</p>
   	<br>
  	<div><a href="index.php"><img src="home.png" alt="home" style="width: 50px; height: 50px;"></a></div>
  </div>


  <div class="padding_main">
  	<div class="form_full">
    <form id="test" class="form-horizontal" action="vote_conf.php" method="post">

     <?php 


    if ( file_exists('example.xml') ) {
	    $xml = simplexml_load_file('ballot.xml');
	 
	    $scopesCnt = $xml->ballot[$district]->scopes->count();

	    $scopeCnt = $xml->ballot[$district]->scopes->scope->count();

	    $racesCnt = $xml->ballot[$district]->scopes->scope->races->count();

	    $raceCnt = $xml->ballot[$district]->scopes->scope->races->race->count();

	    $_SESSION['ses_raceCnt']=$raceCnt;

	    $candCnt = $xml->ballot[$district]->scopes->scope->races->race->candidate->count();

	    for( $scope = 0; $scope < $scopeCnt; $scope++) {
	    	echo '<h2>Scope: ';
	    	echo $xml->ballot[$district]->scopes->scope[$scope]->scope_name;
	    	echo '</h2>';
	    	echo '<div id="scope_div">';
				for( $race = 0; $race < $raceCnt; $race++ ) {

					$raceID = $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->race_id;
						echo  '<div class="form-group">';
	    				echo '<label class="control-label col-sm-12" for="';
	    				echo $raceID;
	    				echo '"';
	    				echo 'id="';
	    				echo $raceID;
	    				echo '"></label>';
	    				//echo '<br><br>';
	    				$val = strval($raceID);
	    					echo '<div class="col-sm-12">';
								echo '<div id="race_div">';
					    		echo '<h3>Race: ';
					    		echo $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->race_name;
					    		echo '</h3><br><br>';
					    		//echo 'Race ID: ';
					    		//echo $xml->ballot[$district]->races->race[$race]->race_id;
					    
					 			for( $candidate = 0; $candidate < $candCnt; $candidate++ ) {
					 				echo '<div class="form-group">';
					 				//echo '<div class="col-sm-4">';
						   			//echo '<br>';
						   			echo '<label class="control-label col-sm-2">';
						   			echo 'Name: </label>';
							   			echo '<div class="col-sm-3">';
							    		$bal_name = $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->name;
							    		echo $bal_name;
							    		echo '</div>';
						    		//echo 'ID: ';
						    		$canID = $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->id;
						    		//echo $canID;
						    		//echo '<br>';
						    		//echo '<div class="col-sm-5">';
						    		echo '<label class="control-label col-sm-2">Party: </label>';
						    		echo '<div class="col-sm-3">';
						    		echo $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->party; 
						    		echo '</div>';
						    		//echo '<br>';
						    		//echo '</div>';
						    		echo '<div class="col-sm-2">';
						    		echo '<label class="radio-inline"><input type="radio" name="';
						    		echo $raceID;
						    		echo '" value="';
						    		echo $canID;
						    		echo '"';

						    		if(isset($_SESSION[$val])) {
						    	 		 if(strcmp($_SESSION[$val], $canID) == 0) {
	              				 		 echo 'checked="checked"';
	            						}
						   			 }
						    		echo '></label>';
						    		echo '</div>';
						    		echo '</div>';
						    		echo '<br><br>';

								}


								$write_in = $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->write_in;
								if(strcmp($write_in, 'yes') == 0){


									echo '<div class="form-group">';
									echo '<label class="control-label col-sm-2" for="';
									echo $raceID;
									echo '">Write-In Canidate:</label>';

										echo '<div class="col-sm-4">';
										echo '<input type="radio" class="form-control radio_click" id="r_but"';
										echo ' name="';
										echo  $raceID;
										echo '" value="';
										echo 'wi_'.$raceID;
										echo '"';
										$j = strval($raceID);
										$str = 'wi_'.$j;
										if(isset($_SESSION[$str])) {
											echo 'checked="checked"';
										}
										echo '>';
										echo '</div>';

										echo '<div class="col-sm-6">';
										echo '<input pattern="[ A-Za-z\.\'\-]*" type="text" class="form-control" name="';
										echo 'wi_', $raceID;
										echo '" id="';
										echo 'wi_', $raceID;
										echo '" placeholder="Enter Write-In Here"';
										if(isset($_SESSION[$str])) {
										 	echo 'value="';
											echo $_SESSION[$str];
											echo '"';
											}
										echo '>';
										echo '</div>';
									echo '</div><br><br>';
								}
						
									echo '-----------------------------------------------';
						echo '<br><br>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}

					echo '</div>';
				}

	} else {
    exit('Failed to open ballot. Please consult a election official.');
	}
?>



    	<div class="form-group col-sm-2">
        	<button type="submit" class="btn btn-default sub_but">Submit</button>
    	</div>
    </form>
        	<button id="clear_but" class="btn btn-default">Clear</button>

      		<br><br>
    </div>
  </div>

</div>
</body>

</html>