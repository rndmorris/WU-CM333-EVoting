<!DOCTYPE html>
<html lang="en">
<head>
  <title>ID Entry</title>
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

    if ($_SESSION['fromExit'] == 1){
        header("Location: http://localhost/voting_system/index.php");
        $_SESSION['fromExit'] = 0;
        //header("Location: http://www.google.com");
        exit;
      }
    
  ?>

</head>

<body>
<div class="container">

  <div class="jumbotron text-center">
  <h1>Voter ID Entry</h1>
  <p>Please enter your 8 digit Voter ID</p>
    <br>
  <div><a href="index.php"><img src="images/home.png" alt="home" style="width: 50px; height: 50px;"></a></div>
  </div>
  <div class="form_full">
    <form class="form-horizontal" action="vote_main.php" method="post">

    <div class="form-group">
      <label class="control-label col-sm-2" for="dl_add">Please enter you 8 digit voter ID number:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="vID" name="vID" pattern="[0-9]{8}" required="required"placeholder="Please enter your 8 digit voter ID number."
          <?php   if (isset($_SESSION['ses_vID'])){
          echo 'value="', $_SESSION['ses_vID'], '"';
          echo " ";
          }?>>
      </div>
    </div>
    <br>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

    </form>
  </div>

</div>
</body>

</html>