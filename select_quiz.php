<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Quiz Maker</title>
</head>
<body>
    <div class="quiz-container">
        <img src="schoollogo.jpg" alt="school_logo" id="school_logo">
        
        <h1>Select a Quiz</h1>
            
                <form method="GET" action="display_quiz.php" >
                    <label for="subject">Choose a Subject:</label>
                    <select name="subject" id="subject">
                      <option value="english">English</option>
                      <option value="biology">Biology</option>
                      <option value="maths">Maths</option>
                      <option value="geography">Geography</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Submit" class="submit_button">
                  </form> 
    </div>
</body>
</html>
