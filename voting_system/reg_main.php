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
        $_SESSION['type_reg'] = true;
        if ($_SESSION['type_reg'] == false){
          header("Location: http://localhost/vote/voting_main_php.php");
          //header("Location: http://www.google.com");
        exit;
        }
        print session_id();
      ?>
    </div>


    <div class="form-group">
    	<div class="text_box">
    	<p><strong>STEP 1 OF 4) </strong><br>VERIFY YOUR VOTING ELIGIBILITY<br></p>
      </div>
    </div>
  	<br>

    <div class="form-group">
    	<label class="control-label col-sm-6" for="citizen">1. Are you a citizen of the United States of America?</label>
    	<div class="col-sm-6">
   	    <label class="radio-inline"><input type="radio" name="cit_Y">Yes</label>
  	   <label class="radio-inline"><input type="radio" name="cit_N">No</label>
  	  </div>
    </div>

    <div class="form-group">
    	<label class="control-label col-sm-6" for="age">2. Will you be 18 years of age on or before election day?</label>
    	<div class="col-sm-6">
   	    <label class="radio-inline"><input type="radio" name="age_Y">Yes</label>
  	    <label class="radio-inline"><input type="radio" name="age_N">No</label>
  	  </div>
    </div>

    <div class="form-group">
    	<label class="control-label col-sm-6" for="kan_res">3. Are you a resident of Kansas?</label>
    	 <div class="col-sm-6">
   	    <label class="radio-inline"><input type="radio" name="kan_res_y">Yes</label>
  	    <label class="radio-inline"><input type="radio" name="kan_res_n">No</label>
  	   </div>
    </div>

    <div class="form-group">
    	<label class="control-label col-sm-6" for="fel">4. Felony Conviction - Please Choose One:</label>
    	<div class="col-sm-6">
   	    <label class="radio-inline"><input type="radio" name="fel_1">I have never been convicted of a felony.</label>
   	    <br>
  	     <label class="radio-inline"><input type="radio" name="fel_2">I have been convicted of a felony. All the terms of my sentence have been completed and my rights have been restored.</label>
  	     <br>
  	     <label class="radio-inline"><input type="radio" name="fel_3">I am currently under sentence for a felony.</label>
  	     <br>
      </div>
    </div>
    <br>

    <div class="form-group">
    	<div class="text_box">
    	<p><strong>STEP 2 OF 4) </strong><br>VERIFY VALID DRIVER'S LICENSE OR NONDRIVER'S IDENTIFICATION CARD<br>
      Please enter the following information to verify that you have a valid Kansas driver's license or nondriver's identification card.
      Name (as it appears on driver's license/nondriver's identification card) *</p>
      </div>
    </div>
  	<br>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">*First Name:</label>
      <div class="col-sm-10">
        <input type="fname" class="form-control" id="fname" name='fname' 
          <?php   if (isset($_SESSION['ses_fname'])){
          echo 'value="', $_SESSION['ses_fname'], '"';
          echo " ";
          }?>
        placeholder="Enter first name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="mname">Middle Name:</label>
      <div class="col-sm-10">
        <input type="m_name" class="form-control" id="m_name" name='mname' 
          <?php   if (isset($_SESSION['ses_mname'])){
          echo 'value="', $_SESSION['ses_mname'], '"';
          echo " ";
          }?>
        placeholder="Enter middle name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="lname">*Last Name:</label>
      <div class="col-sm-10">
        <input type="lname" class="form-control" id="lname" name='lname' 
          <?php   if (isset($_SESSION['ses_lname'])){
          echo 'value="', $_SESSION['ses_lname'], '"';
          echo " ";
          }?>
        placeholder="Enter last name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="n_suf">Name Suffix:</label>
      <div class="col-sm-10">
        <input type="n_suf" class="form-control" id="n_suf" name="n_suf" 
          <?php   if (isset($_SESSION['ses_n_suf'])){
          echo 'value="', $_SESSION['ses_n_suf'], '"';
          echo " ";
          }?>
        placeholder="Enter name suffix">
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
        <input type="dob" class="form-control" id="dob" name="dob" 
          <?php   if (isset($_SESSION['ses_dob'])){
          echo 'value="', $_SESSION['ses_dob'], '"';
          echo " ";
          }?>
        placeholder="Enter date of birth (MM/DD/YYYY)">
      </div>
    </div>
    <br>

    <div class="form-group">
      	<div class="text_box">
    	  <p><strong>Kansas driver's license or nondriver's identification card number</strong></p>
        </div>
    </div>
  	</br>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Do you promise to vote?</label>
        </div>
      </div>
    </div>

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