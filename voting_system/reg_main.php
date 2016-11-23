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

</head>

<body>
<div class="container">
	<div class="jumbotron text-center">
    <h1>Voter Registration</h1>
    <p>Please fill out this form to register, stupid.</p>
  </div>
  <br>

  <div class="form_full">
    <form class="form-horizontal" action="reg_conf.php" method="post">
    <div id="panel1">
      <?php
        session_start();

        ini_set('session.cache_limiter','private');
        session_cache_limiter(false);
/*        $_SESSION['type_reg'] = true;
        if ($_SESSION['type_reg'] == false){
          header("Location: http://localhost/vote/voting_main_php.php");
          //header("Location: http://www.google.com");
        exit;
        }
        print session_id();*/

      if ($_SESSION['fromExit'] == 1){
        header("Location: http://localhost/voting_system/index.php");
        $_SESSION['fromExit'] = 0;
        //header("Location: http://www.google.com");
        exit;
      }

      ?>
    </div>


    <div class="form-group">
    	<div class="text_box">
    	<p><strong>STEP 1 OF 4) </strong><br>VERIFY YOUR VOTING ELIGIBILITY<br></p>
      </div>
    </div>
  	<br>

    <div class="form-group">
    	<label class="control-label col-sm-6" for="cit">1. Are you a citizen of the United States of America?</label>
    	<div class="col-sm-6">
   	    <label class="radio-inline"><input type="radio" id='cit' name="cit" value="cit_yes"

          <?php   if (isset($_SESSION['ses_cit'])){
            if(strcmp($_SESSION['ses_cit'], "cit_yes") == 0) {
              echo 'checked="checked"';
            }
          }?>

          >Yes</label>
  	   <label class="radio-inline"><input type="radio" id='cit' name="cit" value="cit_no"


          <?php   if (isset($_SESSION['ses_cit'])){
            if(strcmp($_SESSION['ses_cit'], "cit_no") == 0) {
              echo 'checked="checked"';
            }
          }?>

        >No</label>
  	  </div>
    </div>

    <div class="form-group">
    	<label class="control-label col-sm-6" for="age">2. Will you be 18 years of age on or before election day?</label>
    	<div class="col-sm-6">
   	    <label class="radio-inline"><input type="radio" name="age" value="age_yes"

          <?php   if (isset($_SESSION['ses_age'])){
            if(strcmp($_SESSION['ses_age'], "age_yes") == 0) {
              echo 'checked="checked"';
            }
          }?>

          >Yes</label>
  	    <label class="radio-inline"><input type="radio" name="age" value="age_no"

          <?php   if (isset($_SESSION['ses_age'])){
            if(strcmp($_SESSION['ses_age'], "age_no") == 0) {
              echo 'checked="checked"';
            }
          }?>

          >No</label>
  	  </div>
    </div>

    <div class="form-group">
    	<label class="control-label col-sm-6" for="kan_res">3. Are you a resident of Kansas?</label>
    	 <div class="col-sm-6">
   	    <label class="radio-inline"><input type="radio" name="kan_res" value="res_yes"

          <?php   if (isset($_SESSION['ses_kan_res'])){
            if(strcmp($_SESSION['ses_kan_res'], "res_yes") == 0) {
              echo 'checked="checked"';
            }
          }?>

          >Yes</label>
  	    <label class="radio-inline"><input type="radio" name="kan_res" value="res_no"


          <?php   if (isset($_SESSION['ses_kan_res'])){
            if(strcmp($_SESSION['ses_kan_res'], "res_no") == 0) {
              echo 'checked="checked"';
            }
          }?>

          >No</label>
  	   </div>
    </div>

    <div class="form-group">
    	<label class="control-label col-sm-6" for="fel">4. Felony Conviction - Please Choose One:</label>
    	<div class="col-sm-6">
   	    <label class="radio-inline"><input type="radio" name="fel" value="fel_never"

          <?php   if (isset($_SESSION['ses_fel'])){
            if(strcmp($_SESSION['ses_fel'], "fel_never") == 0) {
              echo 'checked="checked"';
            }
          }?>

          >I have never been convicted of a felony.</label>
   	    <br>
  	     <label class="radio-inline"><input type="radio" name="fel" value="fel_rest"

          <?php   if (isset($_SESSION['ses_fel'])){
            if(strcmp($_SESSION['ses_fel'], "fel_rest") == 0) {
              echo 'checked="checked"';
            }
          }?>

          >I have been convicted of a felony. All the terms of my sentence have been completed and my rights have been restored.</label>
  	     <br>
  	     <label class="radio-inline"><input type="radio" name="fel" value="fel_yes"

          <?php   if (isset($_SESSION['ses_fel'])){
            if(strcmp($_SESSION['ses_fel'], "fel_yes") == 0) {
              echo 'checked="checked"';
            }
          }?>

          >I am currently under sentence for a felony.</label>
  	     <br>
      </div>
    </div>
    <br><br>

    <div class="form-group">
    	<div class="text_box">
    	<p><strong>STEP 2 OF 4) </strong><br>VERIFY PERSONAL INFORMATION<br>
      Please enter the following information as it appears on on your driver's license.</p>
      </div>
    </div>
  	<br>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">*First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fname" name='fname' placeholder="Enter first name"
          <?php   if (isset($_SESSION['ses_fname'])){
          echo 'value="', $_SESSION['ses_fname'], '"';
          echo " ";
          }?>>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="mname">Middle Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="m_name" name='mname' placeholder="Enter middle name"
          <?php   if (isset($_SESSION['ses_mname'])){
          echo 'value="', $_SESSION['ses_mname'], '"';
          echo " ";
          }?>>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="lname">*Last Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="lname" name='lname' placeholder="Enter last name"
          <?php   if (isset($_SESSION['ses_lname'])){
          echo 'value="', $_SESSION['ses_lname'], '"';
          echo " ";
          }?>>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="n_suf">Name Suffix:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="n_suf" name="n_suf" placeholder="Enter name suffix"
          <?php   if (isset($_SESSION['ses_n_suf'])){
          echo 'value="', $_SESSION['ses_n_suf'], '"';
          echo " ";
          }?>>
      </div>
    </div>
    <br>

    <div class="form-group">
    	<div class="text_box">
    	<p><strong>Date of Birth (must match driver's license/nondriver's card information)</strong></p>
      </div>
    </div>
  	</br>

     <div class="form-group">
      <label class="control-label col-sm-2" for="dob">*Date of Birth (MM/DD/YYYY):</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter date of birth (MM/DD/YYYY)"
          <?php   if (isset($_SESSION['ses_dob'])){
          echo 'value="', $_SESSION['ses_dob'], '"';
          echo " ";
          }?>>
      </div>
    </div>
    <br><br>

    <div class="form-group">
      <div class="text_box">
        <p><strong>STEP 3 OF 4) </strong><br>VERIFY VALID DRIVER'S LICENSE OR NONDRIVER'S IDENTIFICATION CARD<br>
        Please enter the following information to verify that you have a valid Kansas driver's license or nondriver's identification card.</p>
      </div>
    </div>  

    <div class="form-group">
      	<div class="text_box">
    	  <p><strong>Kansas driver's license or nondriver's identification card number</strong></p>
        </div>
    </div>
  	</br>

    <div class="form-group">
      <label class="control-label col-sm-2" for="dl_num">*Driver's License Number:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="dl_num" name="dl_num" placeholder="Kxx-xx-xxxx"          
          <?php   if (isset($_SESSION['ses_dl_num'])){
            echo 'value="', $_SESSION['ses_dl_num'], '"';
            echo " ";
            }?>>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="dl_iss">*Date your driver's lisence was issued:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="dl_iss" name="dl_iss" placeholder="Enter issue date (MM/DD/YYYY)"
          <?php   if (isset($_SESSION['ses_dl_iss'])){
            echo 'value="', $_SESSION['ses_dl_iss'], '"';
            echo " ";
            }?>>
      </div>
    </div>
    <br>

    <div class="form-group">
      <label class="control-label col-sm-2" for="dl_exp">*Date your driver's lisence expires:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="dl_exp" name="dl_exp" placeholder="Enter expiration date (MM/DD/YYYY)"
          <?php   if (isset($_SESSION['ses_dl_exp'])){
          echo 'value="', $_SESSION['ses_dl_exp'], '"';
          echo " ";
          }?>>
      </div>
    </div>
    <br>

    <div class="form-group">
      <label class="control-label col-sm-2" for="dl_add">*Address as it appears on your driver's lisence:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="dl_add" name="dl_add" placeholder="Address on driver's licence"
          <?php   if (isset($_SESSION['ses_dl_add'])){
          echo 'value="', $_SESSION['ses_dl_add'], '"';
          echo " ";
          }?>>
      </div>
    </div>
    <br>

        <div class="form-group">
      <div class="text_box">
        <p><strong>STEP 4 OF 4) </strong><br>PLEASE ENTER YOUR CONTACT INFORMATION<br>
        Please enter your contact information.</p>
      </div>
    </div>  

    <div class="form-group">
      <label class="control-label col-sm-2" for="curr_add">*Current Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="curr_add" name="curr_add" placeholder="Enter Current Address"
          <?php   if (isset($_SESSION['ses_curr_add'])){
          echo 'value="', $_SESSION['ses_curr_add'], '"';
          echo " ";
          }?>>
      </div>
    </div>
    <br>

    <div class="form-group">
      <label class="control-label col-sm-2" for="tele">Current Telephone Number:</label>
      <div class="col-sm-10">
        <input type="tel" class="form-control" id="tele" name="tele" placeholder="Enter Current Telephone Number"
          <?php   if (isset($_SESSION['ses_tele'])){
          echo 'value="', $_SESSION['ses_tele'], '"';
          echo " ";
          }?>>
      </div>
    </div>
    <br>

        <div class="form-group">
      <label class="control-label col-sm-2" for="tele">Current Email Address:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Current Email Address"
          <?php   if (isset($_SESSION['ses_email'])){
          echo 'value="', $_SESSION['ses_email'], '"';
          echo " ";
          }?>>
      </div>
    </div>
    <br>

    <?php

    echo '';
    /*
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Do you promise to vote?</label>
        </div>
      </div>
    </div>
    */?>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default sub_but">Submit</button>
      </div>
    </div>

    </form>
  </div>
</div>
</body>
</html>