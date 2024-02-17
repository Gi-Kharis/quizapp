<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>EarlyQuiz</title>
</head>
<body>
  <main>
  <div class="welcome_div">
    <h3 id="first_title">Welcome to Early Quiz</h3>

    <div id="div_for_welcome_buttons">
      <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Login</button>
      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>
    </div>

  </div>

  <!-- <div class="register_div" >
    <h4>Register if You Don't Have An Account</h4>
  </div> -->

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="schoollogo.jpg" alt="School Logo" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Username" name="email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
   

      <div class="forgot_password" >
        <button type="button" onclick="document.getElementById('id02').style.display='none'"  id="cancelbtnlog">Cancel</button>
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="forgotbtn">Forgot Password</button>
<!-- 
        <span class="psw"><a href="#"> Forgot password?</a></span> -->
      </div>

    </div>
  </form>
</div>

<!-- Sign Up Code -->
<!-- <h2>Sign up for an account</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button> -->

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" method= "POST" action="/action_page.php">
    <div class="container">
      <h3>Sign Up</h3>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <label for="repeatPassword"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="repeatPassword" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the login modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the sign up modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

  </main>
  
</body>
</html>