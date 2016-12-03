<!DOCTYPE html>
<html lang="en">
<head>
  <title>Voter Registration</title>
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

    $_SESSION['fromExit'] = 1;

    if ( file_exists('xml/ballot.xml') ) {
      $xml = simplexml_load_file('xml/ballot.xml');

    //$filename = "vote.xml";

    //$filename = new XMLWriter();
    //$filename->openURI('vote.xml');
    //$handle = fopen($filename, "a");

      $voteFile = new DOMDocument();
      $voteFile->load("xml/vote.xml");
      $voteFile->formatOutput = true;
      $voteRoot = $voteFile->getElementsByTagName('vote')->item(0);;



    //$last = sizeof($filename) - 1 ; 
   // unset($filename[$last]); 

// write the new data to the file 
 //   $fp = fopen('filename.txt', 'w'); 
    //$test = substr($filename, 0, strrpos(trim($filename), "\n"));
    //echo $test;
    //fwrite($fp, implode('', $filename)); 
   // fwrite($handle, $test);



    //$contents = fread($handle, filesize($filename));


      $scopesCnt = $xml->ballot[$_SESSION['district']]->scopes->count();
     // echo 'Scopes Count: ', $scopesCnt;
      //echo "<br>";

      $scopeCnt = $xml->ballot[$_SESSION['district']]->scopes->scope->count();
      //echo 'Scope Count: ', $scopeCnt;
      //echo "<br>";

      $racesCnt = $xml->ballot[$_SESSION['district']]->scopes->scope->races->count();
      //echo 'Races Count: ', $racesCnt;
      //echo "<br>";

      $raceCnt = $xml->ballot[$_SESSION['district']]->scopes->scope->races->race->count();
      //echo 'Race Count: ', $raceCnt;
      //echo "<br>";
      $_SESSION['ses_raceCnt']=$raceCnt;

      $candCnt = $xml->ballot[$_SESSION['district']]->scopes->scope->races->race->candidate->count();

    for($k = 0; $k < 100; $k++){
           $j = strval($k);
           $j = 'wi_r'.$j;
           $t = strval($k);
           $t = "r".$t;
           
           //echo $j;
            if(isset($_SESSION[$j]))
            {
              /*fwritev($handle, "<race>\n");
              fwrite($handle, "      <race_id>");
              fwrite($handle, $t);
              fwrite($handle, "</race_id>\n");
              fwrite($handle, "      <candidate>\n");
              fwrite($handle, "          <name>");
              fwrite($handle, $_SESSION[$j]);
              fwrite($handle, "</name>\n");
              fwrite($handle, "          <write_in>yes</write_in>\n");
              fwrite($handle, "      </candidate>\n");
              fwrite($handle, "</race>\n");*/

              $raceDOM = $voteRoot->appendChild($voteFile->createElement('race'));
              $raceIDDOM = $raceDOM->appendChild($voteFile->createElement('race_id'));
              $raceIDDOM->appendChild($voteFile->createTextNode($t));
              $canidDOM = $raceDOM->appendChild($voteFile->createElement('candidate'));
              $canName = $canidDOM->appendChild($voteFile->createElement('name'));
              $canName->appendChild($voteFile->createTextNode($_SESSION[$j]));
              $canWI = $canidDOM->appendChild($voteFile->createElement('write_in'));
              $canWI->appendChild($voteFile->createTextNode('yes'));


            }
            if(isset($_SESSION[$t]))
            {
              for( $scope = 0; $scope < $scopeCnt; $scope++) {
                  for( $race = 0; $race < $raceCnt; $race++ ) {
                    $raceID = $xml->ballot[$_SESSION['district']]->scopes->scope[$scope]->races->race[$race]->race_id;
        
                      if(strcmp($raceID, $t) == 0){
                        //echo "INNN!";
                        //echo "RACE ID:    ";
                        //echo $t;
                        //echo "CandidateID?     ";
                        //echo $_SESSION[$t];
                        for( $candidate = 0; $candidate < $candCnt; $candidate++ ){
                    $can_name = $xml->ballot[$_SESSION['district']]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->name;
                    $can_party = $xml->ballot[$_SESSION['district']]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->party;
                    $can_id = $xml->ballot[$_SESSION['district']]->scopes->scope[$scope]->races->race[$race]->candidate[$candidate]->id;

                          if(strcmp($_SESSION[$t], $can_id) == 0){

                            /*fwrite($handle, "<race>\n");
                            fwrite($handle, "      <race_id>");
                            fwrite($handle, $t);
                            fwrite($handle, "</race_id>\n");
                            fwrite($handle, "      <candidate>\n");
                            fwrite($handle, "          <name>");
                            fwrite($handle, $can_name);
                            fwrite($handle, "</name>\n");
                            fwrite($handle, "          <id>");
                            fwrite($handle, $can_id);
                            fwrite($handle, "</id>\n");
                            fwrite($handle, "          <party>");
                            fwrite($handle, $can_party);
                            fwrite($handle, "</party>\n");
                            fwrite($handle, "          <write_in>no</write_in>\n");
                            fwrite($handle, "      </candidate>\n");
                            fwrite($handle, "</race>\n");*/

                            $raceDOM1 = $voteRoot->appendChild($voteFile->createElement('race'));
                            $raceIDDOM1 = $raceDOM1->appendChild($voteFile->createElement('race_id'));
                            $raceIDDOM1->appendChild($voteFile->createTextNode($t));
                            $canidDOM1 = $raceDOM1->appendChild($voteFile->createElement('candidate'));
                            $canName1 = $canidDOM1->appendChild($voteFile->createElement('name'));
                            $canName1->appendChild($voteFile->createTextNode($can_name));
                            $canID1 = $canidDOM1->appendChild($voteFile->createElement('id'));
                            $canID1->appendChild($voteFile->createTextNode($can_id));
                            $canPar1 = $canidDOM1->appendChild($voteFile->createElement('party'));
                            $canPar1->appendChild($voteFile->createTextNode($can_party));
                            $canWI1 = $canidDOM1->appendChild($voteFile->createElement('write_in'));
                            $canWI1->appendChild($voteFile->createTextNode('no'));


                          }
                          }
                          }
                        }
              }
            }
    }
    //fclose($handle);
    $voteFile->save("xml/vote.xml"); 

      //$filearray = file($filename);
      //$lastfifteenlines = array_slice($filearray,-15);
      //echo implode("\n", $lastfifteenlines);

    }

    if (!isset($_SESSION['ses_vID'])){
        header("Location: index.php");
        //header("Location: http://www.google.com");
        exit;
      }
    
    if (isset($_SESSION['ses_cit']))        { unset($_SESSION['ses_cit']);      }
    if (isset($_SESSION['ses_kan_res']))    { unset($_SESSION['ses_kan_res']);  }
    if (isset($_SESSION['ses_fel']))        { unset($_SESSION['ses_fel']);      }
    if (isset($_SESSION['ses_age']))        { unset($_SESSION['ses_age']);      }

    if (isset($_SESSION['ses_n_suf']))      { unset($_SESSION['ses_n_suf']);    }
    if (isset($_SESSION['ses_fname']))      { unset($_SESSION['ses_fname']);    }
    if (isset($_SESSION['ses_mname']))      { unset($_SESSION['ses_mname']);    }
    if (isset($_SESSION['ses_lname']))      { unset($_SESSION['ses_lname']);    }
    if (isset($_SESSION['ses_dob']))        { unset($_SESSION['ses_dob']);      }

    if (isset($_SESSION['ses_dl_num']))     { unset($_SESSION['ses_dl_num']);   }
    if (isset($_SESSION['ses_dl_iss']))     { unset($_SESSION['ses_dl_iss']);   }
    if (isset($_SESSION['ses_dl_exp']))     { unset($_SESSION['ses_dl_exp']);   }
    if (isset($_SESSION['ses_dl_add']))     { unset($_SESSION['ses_dl_add']);   }

    if (isset($_SESSION['ses_curr_add']))   { unset($_SESSION['ses_curr_add']); }
    if (isset($_SESSION['ses_tele']))       { unset($_SESSION['ses_tele']);     }
    if (isset($_SESSION['ses_email']))      { unset($_SESSION['ses_email']);    }

    if (isset($_SESSION['ses_vID']))        { unset($_SESSION['ses_vID']);       }
    if (isset($_SESSION['district']))       { unset($_SESSION['district']);      }
    
    for($k = 0; $k < 100; $k++){
           $j = strval($k);
           $j = 'wi_r'.$j;
           $t = strval($k);
           $t = "r".$t;
           
           //echo $j;
            if(isset($_POST[$j]))
            {
              unset($_POST[$j]);
            }
            if(isset($_POST[$t]))
            {
              unset($_POST[$t]);
            }
            if(isset($_SESSION[$j]))
            {
              unset($_SESSION[$j]);
            }
            if(isset($_SESSION[$t]))
            {
              unset($_SESSION[$t]);
            }
    }

    
  ?>

</head>

<body>
<div class="container">

  <div class="jumbotron text-center">
  <h1>Thank you for voting!</h1>
  <p>Please click the botton to return to the main page.</p>
    <br>
  <div><a href="index.php"><img src="images/home.png" alt="home" style="width: 50px; height: 50px;"></a></div>
  </div>
  <div class="padding_main">
    <div class="entry_choice"> 
      <a href="index.php"><button class="mButton" style="vertical-align:middle"><span>Home</span></button></a>

    </div>
  </div>

</div>
</body>

</html>