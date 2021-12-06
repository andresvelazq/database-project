<?php session_start();?>
<html>
  <title>Create a new account</title>
  <body>
    <h1>Create a new account</h1>
    <hr>
    <h2>Please enter email and password.</h2>
    <?php if(isset($_SESSION['flagBlank']) && $_SESSION['flagBlank']) 
            print'<p style="color:red;">Please fill out all fields.</p>';?>

    <form action = "checkpassCreate.php" method = "post">
      <p>
        First name:
        <?php if(isset($_SESSION['fname']))
                print '<input type="text" name="inFname" value="'.$_SESSION["fname"].'"/>';
              else
                print '<input type="text" name="inFname"/>';
        ?>
      </p>

      <p>
        Last name:
        <?php if(isset($_SESSION['lname']))
                print '<input type="text" name="inLname" value="'.$_SESSION["lname"].'"/>';
              else 
                print '<input type="text" name="inLname"/>';
        ?>
      </p>

      <p>
        Email:
        <?php if(isset($_SESSION['email']))
                print '<input type="text" name="inEmail" value="'.$_SESSION["email"].'"/>';
              else 
                print '<input type="text" name="inEmail"/>';
        ?>
      </p>

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

      <p>
      Secret answer (password recovery):
      <input type="password" name="secret">
      </p>

      <input type="submit", value="Create Account">
      <input type="reset", value="Clear Input">
    </form>
    <div>
      Already have an account?
      <a href = forgotpw.php>Forgot password</a>
    </div>
  </body>
</html>
<?php session_destroy();?>