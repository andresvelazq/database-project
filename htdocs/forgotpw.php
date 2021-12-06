<html>
  <body>
    <h1>Password Recovery</h1>
    <hr>
    <form action="verifyUsername.php", method="post">
      Username:
      <input type="text", name="username">
      Secret Answer: 
      <input type="text", name="secret_question">
      <input type="submit", value="Recover password">
      <div>
      <input type="radio" id="staff" name="person_type" value="staff"checked>
      <label for="staff">Staff</label>
    </div>
    <div>
      <input type="radio" id="prof" name="person_type" value="professors">
      <label for="prof">Professor</label>
    </div><br>
    </form>
  </body>
</html>