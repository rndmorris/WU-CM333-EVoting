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

      /* THIS PART DISALLOWS REFRESHING AND INAPPROPRIATE NAVIGATION*/

      if (!isset($_POST['fname'])){
        header("Location: http://localhost/voting_system/reg_main.php");
        //header("Location: http://www.google.com");
        exit;
      }

     /*THIS PART TAKES THE POST VARIABLES AND SAVES THEM AS SESSION VARIABLES*/


     /* This part is more or less for debugging. The validation should make sure that 
     this part is never reached */
    if (!isset($_POST['cit']))          {
     $_POST['cit']     =  "cit_no";  }
    if (!isset($_POST['kan_res']))      { 
      $_POST['kan_res'] =  "res_no";  }
    if (!isset($_POST['fel']))          { 
      $_POST['fel']     =  "fel_yes";  }
    if (!isset($_POST['age']))          { 
      $_POST['age']     =  "age_no"; }

    $_SESSION['ses_cit']      = $_POST['cit'];             
    $_SESSION['ses_kan_res']  = $_POST['kan_res'];   
    $_SESSION['ses_fel']      = $_POST['fel'];         
    $_SESSION['ses_age']      = $_POST['age'];          

    $_SESSION['ses_n_suf']    = $_POST['n_suf'];      
    $_SESSION['ses_fname']    = $_POST['fname'];      
    $_SESSION['ses_mname']    = $_POST['mname'];      
    $_SESSION['ses_lname']    = $_POST['lname'];      
    $_SESSION['ses_dob']      = $_POST['dob'];          

    $_SESSION['ses_dl_num']   = $_POST['dl_num'];    
    $_SESSION['ses_dl_iss']   = $_POST['dl_iss'];    
    $_SESSION['ses_dl_exp']   = $_POST['dl_exp'];    
    $_SESSION['ses_dl_add']   = $_POST['dl_add'];    

    $_SESSION['ses_curr_add'] = $_POST['curr_add'];
    $_SESSION['ses_tele']     = $_POST['tele'];
    $_SESSION['ses_email']    = $_POST['email'];      

  ?>

</head>
<body>
<div class="container">

	<div class="jumbotron text-center">
  <h1>Voter Registration</h1>
    <p>Is this really what you meant, stupid?</p>
  </div>

  <br>

  <div class="form_full">
      <?php
      /*
      echo '<div class="form-group">
      <label class="control-label col-sm-2">Citizen</label>
      <div class="col-sm-10">';
      echo '  ', $_SESSION['ses_cit'];
      echo '</div></div><br>';
      */
      /*
      echo 'Session:     ';
      echo $_SESSION['ses_fel'];
      echo '      Post:     ';
      echo $_POST['fel'];
      */

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Surname:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_n_suf'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">First Name:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_fname'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Middle Name:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_mname'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Last Name:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_lname'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Date of Birth:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_dob'];
      echo '</div></div><br><br>';



      echo '<div class="form-group">
      <label class="control-label col-sm-5">Driver\'s License Number:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_dl_num'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Driver\'s License Issue Date:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_dl_iss'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Driver\'s License Expiration Date:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_dl_exp'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Address on Driver\'s License:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_dl_add'];
      echo '</div></div><br><br>';



      echo '<div class="form-group">
      <label class="control-label col-sm-5">Current Address:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_curr_add'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Telephone Number:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_tele'];
      echo '</div></div><br><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-5">Email Address:</label>
      <div class="col-sm-5">';
      echo '  ', $_SESSION['ses_email'];
      echo '</div></div><br><br>';

      ?>

    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-4">
        <a href="http://localhost/voting_system/reg_main.php"><button class="btn btn-default sub_but">Redo</button></a>
        <a href="http://localhost/voting_system/index.php"><button class="btn btn-default sub_but">Submit</button></a>
      </div>
    </div>

  </div>
</div>

</body>
</html>