<!DOCTYPE html>
<html lang="en">
<head>
  <title>Voter Registration Thank you</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="styles/styles.css" type="text/css"></link>
  <script src="scripts/jquery.js" type="text/javascript"></script>

  <?php 
    session_start();

    ini_set('session.cache_limiter','private');
    session_cache_limiter(false);

    if (!isset($_SESSION['ses_fname'])){
        header("Location: index.php");
        //header("Location: http://www.google.com");
        exit;
      }

    $_SESSION['fromExit'] = 1;


    $mysqli = new mysqli("localhost", "root", "", "registration", 3306);
    if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    //echo $mysqli->host_info . "\n";
/*
    $insert = $mysqli->query("INSERT INTO voter(fname, mname, lname, sname, dob, dlnum, dlissdate, dlexpdate, dladdress, curradd, telenum, email) VALUES ($_SESSION['ses_fname'], 
      $_SESSION['ses_mname'], 
      $_SESSION['ses_lname'], 
      $_SESSION['ses_n_suf'], 
      $_SESSION['ses_dob'], 
      $_SESSION['ses_dl_num'], 
      $_SESSION['ses_dl_iss'], 
      $_SESSION['ses_dl_exp'], 
      $_SESSION['ses_dl_add'], 
      $_SESSION['ses_curr_add'], 
      $_SESSION['ses_tele'], 
      $_SESSION['ses_email'])";
    $insret->exectute(); */

/*
$sql = "INSERT INTO voter (fname, mname, lname, sname, dob, dlnum, dlissdate, dlexpdate, dladdress, curradd, telenum, email) 
  VALUES ($_SESSION['ses_fname'], 
    $_SESSION['ses_mname'], 
    $_SESSION['ses_lname'], 
    $_SESSION['ses_n_suf'], 
    $_SESSION['ses_dob'], 
    $_SESSION['ses_dl_num'], 
    $_SESSION['ses_dl_iss'], 
    $_SESSION['ses_dl_exp'], 
    $_SESSION['ses_dl_add'], 
    $_SESSION['ses_curr_add'], 
    $_SESSION['ses_tele'], 
    $_SESSION['ses_email'])";*/

$x_fname = $_SESSION['ses_fname'];
$x_mname = $_SESSION['ses_mname'];
$x_lname = $_SESSION['ses_lname'];
$x_sname = $_SESSION['ses_n_suf'];
$x_dob = $_SESSION['ses_dob'];
$x_dl_num = $_SESSION['ses_dl_num'];
$x_dl_iss = $_SESSION['ses_dl_iss'];
$x_dl_exp = $_SESSION['ses_dl_exp'];
$x_dl_add = $_SESSION['ses_dl_add'];
$x_dl_curr_add = $_SESSION['ses_curr_add'];
$x_dl_tele = $_SESSION['ses_tele'];
$x_dl_email = $_SESSION['ses_email'];




$sql = "INSERT INTO voter (fname, mname, lname, sname, dob, dlnum, dlissdate, dlexpdate, dladdress, curradd, telenum, email) 
  VALUES ('$x_fname', '$x_mname', '$x_lname', '$x_sname', '$x_dob', '$x_dl_num', '$x_dl_iss', '$x_dl_exp', '$x_dl_add', '$x_dl_curr_add', '$x_dl_tele','$x_dl_email')";

if ($mysqli->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
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
  <h1>Thank you for registering!</h1>
  <p>Please click the button to return to the main page.</p>
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
