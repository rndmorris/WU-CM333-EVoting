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

      $_SESSION['ses_n_suf'] = $_POST['n_suf'];
      $_SESSION['ses_fname'] = $_POST['fname'];
      $_SESSION['ses_mname'] = $_POST['mname'];
      $_SESSION['ses_lname'] = $_POST['lname'];
      $_SESSION['ses_dob'] = $_POST['dob'];
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

      echo '<div class="form-group">
      <label class="control-label col-sm-2">Surname:</label>
      <div class="col-sm-10">';
      echo '  ', $_SESSION['ses_n_suf'];
      echo '</div></div><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-2">First Name:</label>
      <div class="col-sm-10">';
      echo '  ', $_SESSION['ses_fname'];
      echo '</div></div><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-2">Middle Name:</label>
      <div class="col-sm-10">';
      echo '  ', $_SESSION['ses_mname'];
      echo '</div></div><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-2">Last Name:</label>
      <div class="col-sm-10">';
      echo '  ', $_SESSION['ses_lname'];
      echo '</div></div><br>';

      echo '<div class="form-group">
      <label class="control-label col-sm-2">Date of Birth:</label>
      <div class="col-sm-10">';
      echo '  ', $_SESSION['ses_dob'];
      echo '</div></div><br>';

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