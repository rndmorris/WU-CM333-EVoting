  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Voter Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="styles.css" type="text/css"></link>
  <script src="jquery.js" type="text/javascript"></script>

  <?php 
    session_start();
  ?>

</head>

<body>
<div class="container">

  <div class="jumbotron text-center">
  <h1>Ballot</h1>
  <p>Please select the canidates you would like to vote for.</p>
  </div>
  <div class="padding_main">
  <div class="form_full">
    <form class="form-horizontal" action="vote_conf.php" method="post">
       <?php 
  	//include 'example.php';
    //session_start();

    $district = 0;
    //if from 00000000 > 25000000
    // $district = 1
    //if from 25000001 > 50000000
    // $district = 2
    //if from 50000001 > 75000000
    // $district = 3
    //if from 75000000 > 99999999
    // $district = 4
    // or set district to 0 at beginning, to the ifs then do if still 0, 
    // then exit, then subtract one to district to pull from correct ballot

    if ( file_exists('example.xml') ) {
	    $xml = simplexml_load_file('example.xml');
	 
	    echo $xml->ballot[$district]->district;
	    echo '<br>';
	    echo '---------';
	    echo '<br><br>';

	    $scopesCnt = $xml->ballot[$district]->scopes->count();
	    echo 'Scopes Count: ', $scopesCnt;
	    echo "<br>";

	    $scopeCnt = $xml->ballot[$district]->scopes->scope->count();
	    echo 'Scope Count: ', $scopeCnt;
	    echo "<br>";

	    $racesCnt = $xml->ballot[$district]->scopes->scope->races->count();
	    echo 'Races Count: ', $racesCnt;
	    echo "<br>";

	    $raceCnt = $xml->ballot[$district]->scopes->scope->races->race->count();
	    echo 'Race Count: ', $raceCnt;
	    echo "<br>";
	    $_SESSION['ses_raceCnt']=$raceCnt;

	    $candCnt = $xml->ballot[$district]->scopes->scope->races->race->candidate->count();
	    echo 'Candidate Count: ', $candCnt;
	    echo "<br>";

	    for( $scope = 0; $scope < $scopeCnt; $scope++) {
	    	echo 'Scope: ';
	    	echo $xml->ballot[$district]->scopes->scope[$scope]->scope_name;
	    	echo '<br>';
	    	echo '<div id="scope_div">';
			    for( $race = 0; $race < $raceCnt; $race++ ) {

			$raceID = $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->race_id;
			echo  '<div class="form-group">';
    		echo '<label class="control-label col-sm-12" for="';
    		echo $raceID;
    		echo '"></label>';
    				echo '<div class="col-sm-12">';
					echo '<div id="race_div">';
				    echo 'Race: ';
				    echo $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->race_name;
				    echo '<br>';
				    //echo 'Race ID: ';
				    //echo $xml->ballot[$district]->races->race[$race]->race_id;
				    
				 	for( $candidate = 0; $candidate < $candCnt; $candidate++ ) {
					    echo '<br>';
					    echo 'Name: ';
					    $bal_name = $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->name;
					    echo $bal_name;
					    echo '<br>';
					    echo 'ID: ';
					    $canID = $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->id;
					    echo $canID;
					    echo '<br>';
					    echo 'Party: ';
					    echo $xml->ballot[$district]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->party; 
					    echo '<br>';
					    echo '<label class="radio-inline"><input type="radio" name="';
					    echo $raceID;
					    echo '" value="';
					    echo $canID;
					    echo '"></label>';
					    echo '<br><br><br>';
					}
					echo "<br><br>";
					echo "</div>";
					echo '</div>';
					
					echo '-----------------------------------------------';
					echo '<br><br>';

					echo '</div>';
				}
				echo '</div>';
			}

	} else {
    exit('Failed to open ballot. Please consult a election official.');
	}
    
  ?>
      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default sub_but">Submit</button>
      </div>
    </div>
      </div>
</div>
</form>
</div>
</body>

</html>
