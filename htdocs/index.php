<?php session_start();?>
<html>
  <body>
    <h1>Book Order Website</h1>
    <hr>
    <!-- Flag set from professorNewAdd.php if account is made successfully.-->
    <?php if(isset($_SESSION['flagCreatProf']) && $_SESSION['flagCreatProf']) 
            print'<p style="color:green;">Account creation successful.</p>';?>

    <!-- Flag set from checkpassReset.php if passwaord was changed successfully.-->
    <?php if(isset($_SESSION['flagReset']) && $_SESSION['flagReset']) 
            print'<p style="color:green;">Password reset successful.</p>';?>
            
    <h2>Please enter email and password.</h2>
    <form action = "login.php" method = "post">
      Email:
      <input type="text" name="email"><br>
      Password:
      <input type="password" name="password"><br>

    <div>
      <input type="radio" id="staff" name="person_type" value="staff"checked>
      <label for="staff">Staff</label>
    </div>
    <div>
      <input type="radio" id="prof" name="person_type" value="prof">
      <label for="prof">Professor</label>
    </div><br>

    <input type="submit", value="Login">
    <!-- <input type="submit", value="Forgot password", formaction="forgotpw.php"><br> -->
    <input type="reset", value="Clear Input">
    </form>
    <div>
      <a href = professorCreate.php>Create account</a><br>
      <a href = forgotpw.php>Forgot password</a>
    </div>
  </body>
</html>
<?php session_destroy();?>
