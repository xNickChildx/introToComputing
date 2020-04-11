<?php 
session_start();
$_SESSION['firstFlag']=0;
?>
<!DOCTYPE html>    <!-- guess.php -->

<html>
  <head>
    <title>Guess a Number</title>
  </head>


  <form method="post" action="guess.php">
    
      <fieldset id="form">
          <legend>Selecting Difficulty</legend>
          <p>
             <label>Select list</label>
             <select name = "diff" checked="1">
               <option value = "1">Easy</option>
               <option value = "2">Medium</option>
               <option value = "3">Hard</option>
               <option value = "4">Expert</option>

             </select>
          </p>
          <p> Range: <input type="number" name="range" min="1" value=42></p>
         
       </fieldset>
     
    
    <p>Your guess? <input type="number" name="num" min="1" max="10000000" autofocus></p>

    <input type="submit" value="Guess">
  </form>
  <?php


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  if(!isset($_SESSION['guesses'])){     //if sessions is null, start new game
    if(!is_numeric($_POST['range'])||$_POST['range']<1 ){
      echo "<p> ERROR range is not a positive integer </p>";
      return;
    }
    $_SESSION["guesses"]=$_POST["diff"];

    $_SESSION['range']=$_POST["range"];
    $_SESSION['rand']=rand(1, $_SESSION['range']);

  }
  if(!is_numeric($_POST['num'])||$_POST['num']<1 ||$_POST['num']>$_SESSION['range'] ){
    echo "<p> ERROR entered number is no good.</p> ";
    
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
      echo "<p>Enter new difficulty and range if you like</p>";
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


?>
</html>
