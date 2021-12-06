<?php session_start();?>
<html>
  <title>Password Reset</title>
  <body>
    <h1>Password Reset</h1>
    <hr>
    <form action="checkpassReset.php", method="post">
      <p>
        Password:
        <input type="password" name="inPass1">
        <?php if(isset($_SESSION['flagInvalPass']) && $_SESSION['flagInvalPass'])       
          print"<span style='color:red'>Passwords do not match</span>";?>
      </p>

      <p>
        Re-enter Password:
        <input type="password" name="inPass2">
        <?php if(isset($_SESSION['flagInvalPass']) && $_SESSION['flagInvalPass'])      
        print"<span style='color:red'>Passwords do not match</span>";?>
      </p>

      <input type="submit", value="Submit">
      <input type="reset", value="Clear Input">
    </form>
  </body>
</html>
