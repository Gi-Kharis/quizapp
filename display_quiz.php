<!-- Connect to Database with Questions -->
<?php
$server = "localhost";
$username = "root";
$password = "";
$nameOfDatabase = "earlyquiz";

// Connect to the database based on variables declared
$mysqli = new mysqli($server, $username, $password, $nameOfDatabase);

// Check the connection
if ($mysqli->connect_error) {
    die('Connection Unsuccessful: ' . $mysqli->connect_error);
}
  // echo "connection was successful";

// Retrieve subject selected
$subject_selected = isset($_GET['subject']) ? $_GET['subject'] : '';
if (empty($subject_selected)) {
    die('Subject not specified.');
}
//  echo "you selected".$subject_selected;

// Retrieve questions and answers from the database based on the selected subject
$queryToSelectQuestions = "SELECT * FROM quizquestions WHERE subject = ?";
$statement = $mysqli->prepare($queryToSelectQuestions);
$statement->bind_param('s', $subject_selected);
$statement->execute();
$result = $statement->get_result();
$questionsSelected = $result->fetch_all(MYSQLI_ASSOC);

// Shuffle questions for a random quiz experience
shuffle($questionsSelected);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='styles.css'>
    <title>Quiz Maker</title>
</head>
<body>
    <div class='quiz-container'>
      <img src='schoollogo.jpg' alt='school_logo' id='school_logo'>
      <h1>Answer All Questions</h1>
            
      <form action='results.php' method='post'>";

      foreach ($questionsSelected as $index => $questionSelected) {
          $question = $questionSelected['question'];
          $options = array($questionSelected['option1'], $questionSelected['option2'], $questionSelected['option3']);
          $correctAnswer = $questionSelected['correct_answer'];
      
          echo "<p>$question</p>";
      
          foreach ($options as $option) {
              echo "<label><input type='radio' name='$index' value='$option'>$option</label><br>";
          }
      }
      
      echo "  <input type='hidden' name='subject' value='$subject_selected'>
              <input type='submit' value='Submit Answers' class='submit_button'>
              </form>

    </div>
</body>
</html>";

// Close the connection 
$mysqli->close();

?>