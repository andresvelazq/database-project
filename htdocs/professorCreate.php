<html>
  <body>
    <h1>Create a new account</h1>
    <hr>
    <h2>Please enter email and password.</h2>
    <form action = "login.php" method = "post">
      <p>
        First name:
        <input type="text" name="fname"/>
      </p>

      <p>
        Last name:
        <input type="text" name="lname">
      </p>

      <p>
        Email:
        <input type="text" name="email">
      </p>

      <p>
        Password:
        <input type="password" name="password1">
      </p>

      <p>
      Re-enter Password:
      <input type="password" name="password2">
      </p>
      
      <input type="submit", value="Create Account">
      <!-- <input type="submit", value="Forgot password", formaction="forgotpw.php"><br> -->
      <input type="reset", value="Clear Input">
    </form>
    <div>
      Already have an account?
      <a href = forgotpw.php>Forgot password</a>
    </div>
  </body>
</html>