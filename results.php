<?php
// Connect to the database based on variables declared
$mysqli = new mysqli("localhost", "root", "", "earlyquiz");

// Check the connection
if ($mysqli->connect_error) {
    die('Connection Unsuccessful: ' . $mysqli->connect_error);
}

// Retrieve subject selected
$subject_selected = isset($_POST['subject']) ? $_POST['subject'] : '';
if (empty($subject_selected)) {
    die('Subject not specified.');
}

// Retrieve correct answers from the database based on the selected subject
$queryToSelectCorrectAnswers = "SELECT correct_answer FROM quizquestions WHERE subject = ?";
$statement = $mysqli->prepare($queryToSelectCorrectAnswers);
$statement->bind_param('s', $subject_selected);
$statement->execute();
$result = $statement->get_result();
$correctAnswers = $result->fetch_all(MYSQLI_ASSOC);

// Initialize score and feedback
$score = 0;
$feedback = "";

// Check each submitted answer against the correct answer
foreach ($_POST as $index => $value) {
    if ($index !== 'subject') {
        $correctAnswer = $correctAnswers[$index]['correct_answer'];

        if ($value === $correctAnswer) {
            $score++;
        }
    }
}

// Provide feedback based on the score
if ($score == count($correctAnswers)) {
    $feedback = "Congratulations! You got all the questions correct.";
} else {
    $feedback = "Nice effort! You got $score out of " . count($correctAnswers) . " questions correct.";
}

// HTML for displaying quiz results and feedback
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='styles.css'>
    <title>Quiz Results</title>
</head>
<body>
    <div class='quiz-container'>
        <img src='schoollogo.jpg' alt='school_logo' id='school_logo'>
        <h1>Results</h1>

        <p>$feedback</p>
        <p>Your Score: $score / " . count($correctAnswers) . "</p>
        <a href='select_quiz.php?subject=$subject_selected' class='submit_button'>Back to Quiz</a>
    </div>
</body>
</html>";

// Close the connection
$mysqli->close();
?>

