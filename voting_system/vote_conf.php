<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vote Confirmation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="styles/styles.css" type="text/css"></link>
  <script src="scripts/jquery.js" type="text/javascript"></script>

  <?php
      session_start();

      ini_set('session.cache_limiter','public');
      session_cache_limiter(false);

      /* THIS PART DISALLOWS REFRESHING AND INAPPROPRIATE NAVIGATION*/

      if ($_SESSION['fromExit'] == 1){
        header("Location: http://localhost/voting_system/index.php");
        $_SESSION['fromExit'] = 0;
        //header("Location: http://www.google.com");
        exit;
      }


      if (!isset($_SESSION['ses_raceCnt'])){
        header("Location: index.php");
        //header("Location: http://www.google.com");
        exit;
      }

       if (!isset($_SESSION['district'])){
        header("Location: index.php");
        //header("Location: http://www.google.com");
        exit;
      }
      for($k = 0; $k < 100; $k++){
           $j = strval($k);
           $j = 'wi_r'.$j;
           $t = strval($k);
           $t = "r".$t;
           //echo $j;
           if(isset($_POST[$j])){
             if(!strcmp($_POST[$j], "") == 0){
                //echo '    ', $_POST[$j];
                $_POST[$t] = $_POST[$j];
                $_SESSION[$j] = $_POST[$j];
                }
              else{
                unset($_SESSION[$j]);
                unset($_POST[$j]);
              }
            }
      }

      $district = $_SESSION['district'];

      if(isset($_POST['fromMain'])){
        header("Location: vote_main.php");
        //header("Location: http://www.google.com");
        exit;
    }

     /*THIS PART TAKES THE POST VARIABLES AND SAVES THEM AS SESSION VARIABLES*/


  ?>

</head>
<body>
<div class="container">

	<div class="jumbotron text-center">
  <h1>Vote Confirmation</h1>
    <p>Are these the votes you want to place?</p>
      <br>
  <div><a href="index.php"><img src="images/home.png" alt="home" style="width: 50px; height: 50px;"></a></div>
  </div>

  <br>

  <div class="form_full">
      <?php

      if (!isset($_SESSION['ses_vID'])){
        header("Location: index.php");
        //header("Location: http://www.google.com");
        exit;
      }

      function xml_attribute($object, $attribute)
		{
  		  	if(isset($object[$attribute]))
    	    return (string) $object[$attribute];
		}

          if ( file_exists('xml/ballot.xml') ) {
	    $xml = simplexml_load_file('xml/ballot.xml');
      	//echo 'Races voted in: ', $_SESSION['ses_raceCnt'];
      	//echo '<br>';

      		/*DO THIS FOR REAL*/
      	   // $scope = 0;
        echo '<h2>Your Vote:</h2>';

      	for($i = 0; $i < 100; $i++){
      		/*echo 'in loop';*/
      		$r = strval($i);
      		/*echo $r;
      		echo '<br>';*/
      		$r = "r".$r;
      		/*echo $r;
      		echo '<br>';*/


     	if(isset($_POST[$r]))
     	{
     		//echo 'IN IF';
     		//echo $_POST[$r];
        //echo "    the r =  ";
        //echo $r;
     		$_SESSION[$r] = $_POST[$r];
     		//echo $_SESSION[$r];
        //echo "   ", $r;
        $scopeCnt2 = $xml->ballot[$district]->scopes->scope->count();
        echo '<br>';
        for( $sc = 0; $sc < $scopeCnt2; $sc++) {
        //echo '<h4>';
        //echo $xml->ballot[$district]->scopes->scope[$sc]->scope_name;
        //echo '</h4>';
        $raceCnt2 = $xml->ballot[$district]->scopes->scope[$sc]->races->race->count();
     		for($t = 0; $t < $raceCnt2; $t++)
     		{
     			/*echo 't ', $t;*/
     			$temp_raceid = $xml->ballot[$district]->scopes->scope[$sc]->races->race[$t]->race_id;
          $temp_racenm = $xml->ballot[$district]->scopes->scope[$sc]->races->race[$t]->race_name;
     			/*echo 'in first for';*/
     			if($temp_raceid == $r)
     			{
            echo '<label class="control-label col-sm-4">';
            echo $temp_racenm;
            echo ': </label>';
            //echo 'OUTSIDE!   ';
     				$candCnt2 = $xml->ballot[$district]->scopes->scope->races->race[$t]->candidate->count();
     				for($n = 0; $n < $candCnt2; $n++)
     				{
     					//echo '   n;   ', $n;
     					/*echo ' in second for';*/
              //echo '<div class="col-sm-5"';
     					$temp_id = $xml->ballot[$district]->scopes->scope[$sc]->races->race[$t]->candidate[$n]->id;
              //echo ' tempID: '.$temp_id;
              //echo '';
              //echo ' sessR: '.$_SESSION[$r].'    ';
     					if($temp_id == $_SESSION[$r])
              //if (substr( $_SESSION[$r], 0, 1 ) != "_")
     					{
               // echo '<div class="col-sm-5"';
              //echo ' first if: ';
              //echo $_SESSION[$r];
              //break;
     					echo $xml->ballot[$district]->scopes->scope[$sc]->races->race[$t]->candidate[$n]->name;
              $writeInClear = 'wi_'.$r;
              unset($_SESSION[$writeInClear]);
              break;
              //echo '</div>';
     					}
              //else{ 
              if (substr( $_SESSION[$r], 0, 1 ) != "_"){
                //echo '<div class="col-sm-5"';
                //if (substr( $_SESSION[$r], 0, 1 ) != "_"){
                //echo ' In 2nd if:   ';
                echo $_SESSION[$r];
                break;
                //echo $temp_id;
               // echo $xml->ballot[$district]->scopes->scope[$sc]->races->race[$t]->candidate[$n]->name;
                //break;
                //echo '</div>';
              }
              //echo '</div>';
     				}
     			}
          //unset($_POST[$r]);

     		}
        $dummy = $sc+1;
      }
     		/*echo xml_attribute($xml->ballot[$district]->scopes->scope[$scope]->races->race[$r]->candidate, $_SESSION[$r]);*/
     		/*$name = $xml->ballot[$district]->scopes->scope[$scope]->races->race[$r]->candidate->id[$_SESSION[$r]]->name;*/
     		/*echo $name;*/
     		echo '<br>';
     	}
     	}
     }
      ?>
      <br><br>
    <div class="form-group">
      <div class="col-sm-4">
        <a href="http://localhost/voting_system/vote_main.php"><button class="btn btn-default sub_but">Redo</button></a>
        <a href="http://localhost/voting_system/vote_end.php"><button class="btn btn-default sub_but">Submit</button></a>
      </div>
    </div>

  </div>
</div>

</body>
</html>