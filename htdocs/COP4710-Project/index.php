<html>
  <body>
    <h1>Book Order Website</h1>
    <hr>
    <h2>Please email and password.</h2>
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
      <a href = forgotpw.php>Forgot password</a>
    </div>
  </body>
</html>