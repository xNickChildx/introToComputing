<!DOCTYPE html>    <!-- guess.php -->

<?php
session_start();    //Start session, I will be using variables
?>
if (!isset($_POST["guess"])) {
     $_SESSION["count"] = 0; //Initialize count
     $message = "Welcome to the guessing machine!";
     $_POST["numtobeguessed"] = rand(0,1000);
     echo $_POST["numtobeguessed"];
} else if ($_POST["guess"] > $_POST["numtobeguessed"]) { //greater than
    $message = $_POST["guess"]." is too big! Try a smaller number.";
    $_SESSION["count"]++; //Declare the variable $count to increment by 1.

} else if ($_POST["guess"] < $_POST["numtobeguessed"]) { //less than
    $message = $_POST["guess"]." is too small! Try a larger number.";
    $_SESSION["count"]++; //Declare the variable $count to increment by 1.

} else { // must be equivalent
    $_SESSION["count"]++;
    $message = "Well done! You guessed the right number in ".$_SESSION["count"]." attempt(s)!"; 
    unset($_SESSION["count"]);
        //Include the $count variable to the $message to show the user how many tries to took him.
}
?>
<html>

    <head>
        <title>A PHP number guessing script</title>
    </head>
    <body>
    <h1><?php echo $message; ?></h1>
        <form action="" method="POST">
        <p><strong>Type your guess here:</strong>
            <input type="text" name="guess"></p>
            <input type="hidden" name="numtobeguessed" 
                   value="<?php echo $_POST["numtobeguessed"]; ?>" ></p>
    <p><input type="submit" value="Submit your guess"/></p>
        </form>
    </body>
</html><html>
  <head>
    <title>Guess a Number</title>
  </head>


  <form method="post" action="guess.php">
    
      <fieldset>
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
          <input type="number" name="range" min="1" >
          <input type="hidden" name="guesses" >
           <input type="hidden" name="rand" >
           <input type="hidden" name="setDif" >
       </fieldset>
     
    
    <p>Your guess? <input type="number" name="num" min="1" max="10000000" autofocus></p>

    <input type="submit" value="Guess">
  </form>
  <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
          
}

?>
</html>
