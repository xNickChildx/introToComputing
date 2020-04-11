<?php 
session_start();
$_SESSION['firstFlag']=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="PHP number guessing game">
  <meta name="author" content="Nick Child">

  <title>Guess A Number</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">A PHP Running</span>
    <span class="site-heading-lower">Number Guessing Game!</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Number Guesser</a>
      
    </div>
  </nav>

  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="https://media.glassdoor.com/l/23378/university-of-richmond-office.jpg" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <form method="post" action="index.php">
          <h2 class="section-heading mb-4">

            <fieldset id="form">
          <span class="section-heading-upper"><legend>Selecting Difficulty</legend></span>
          <p>
             <select name = "diff" checked="1">
               <option value = "1">Expert</option>
               <option value = "5">Hard</option>
               <option value = "10">Medium</option>
               <option value = "20">Easy</option>

             </select>
          </p>
            <p class="section-heading-lower">Range: </p><input type="number" name="range" min="1" value=42>
          </fieldset>
          </h2>
          <p class="mb-3"> <p>Your guess? <input type="number" name="num" min="1" max="10000000" autofocus></p>
          </p>
          <div class="intro-button mx-auto">
            <input type="submit" value="Guess" class="btn btn-primary btn-xl" >
          </div>
        </form>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Results</span>
              
            </h2>
            <p class="mb-0"> <?php


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  if(!isset($_SESSION['guesses'])){     //if sessions is null, start new game
    if(!is_numeric($_POST['range'])||$_POST['range']<1 ){
      echo "<p style='color:red;'> ERROR range is not a positive integer </p>";
      return;
    }
    $_SESSION["guesses"]=$_POST["diff"];

    $_SESSION['range']=$_POST["range"];
    $_SESSION['rand']=rand(1, $_SESSION['range']);

  }
  if(!is_numeric($_POST['num'])||$_POST['num']<1 ||$_POST['num']>$_SESSION['range'] ){
    echo "<p style='color:red;'> ERROR entered number is no good.</p> ";
    
  }
 echo" <p>I'm thinking of a number between 1 and " . $_SESSION['range'] ." .</p>";
    echo "<p> You guessed ".$_POST['num'] . "</p>";
    if($_SESSION['rand']==$_POST['num']){
      echo "<h1>Correct!</h1>";
      unset($_SESSION['guesses']);
      echo "<p>Enter new difficulty and range if you like</p>";

    }
    else if($_SESSION['guesses']<=1){
      echo "<p>No, I was thinking of ". $_SESSION['rand']."</p>";
      unset($_SESSION['guesses']);
      echo "<p>GAME OVER <br>Enter new difficulty and range if you like</p>";
    }
    else if ($_POST['num']<$_SESSION['rand']){
      echo "<p> Too Small</p>";
      $_SESSION["guesses"]--;
      echo " <p> You have " .$_SESSION['guesses']. " left.</p>";
    }
    else {
      echo "<p> Too Big</p>";
      $_SESSION["guesses"]--;
      echo " <p> You have " .$_SESSION['guesses']. " left.</p>";
    }

  
          
}


?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Nick Child and Bootstrap 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
