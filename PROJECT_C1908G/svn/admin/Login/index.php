<?php
require_once('database.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['Name'])){
        $errors[] = 'Name is required';
    }

    if (empty($_POST['Password'])){
        $errors[] = 'Password is required';
    }
    $myusername = $_POST['Name'];

     $mypassword = $_POST['Password'];

      $sql = "SELECT * FROM Admin WHERE Name = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);

      if($count >0) {
        $user=mysqli_fetch_assoc($result);
        dedirec_to("index_admin.php");
      }else {
          $errors[] = 'Your Login Name or Password is invalid';
      }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <style>
        label {
            font-weight: bold;
        }
        .error {
            color: #FF0000;
        }
        div.error{
            border: thin solid red;
            display: inline-block;
            padding: 5px;
        }
    </style>
    <link rel="stylesheet" href="bs4/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin.css" type="text/css">
</head>
<body>
<div class="container">
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
        <div class="alert alert-danger">
            <strong>Please fix the following errors!</strong> 
            <ul>
                <?php
                foreach ($errors as $key => $value){
                    if (!empty($value)){
                        echo '<li>', $value, '</li>';
                    }
                }
                ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" style="margin: auto;width: 50%" class="alert alert-danger">
        <fieldset>
            <h3>Login</h3>
        </fieldset>
        <fieldset>
            <div class="form-group" >
                <label class="col-sm-6 control-label">Name :</label>
                <div class="col-sm-6">
                    <input class="form-control"  type="text" id="Name" name="Name"
                           value="<?php echo isFormValidated()? '': $_POST['Name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 control-label">Password : </label>
                <div class="col-sm-6">
                    <input class="form-control" type="password" id="Password" name="Password"
                           value="<?php echo isFormValidated()? '': $_POST['Password'] ?>">
                </div>
            </div>
            <div class="container">

                <button type="submit" class="btn btn-success" name="btn_submit">Đăng nhập</button>
            </div>

        </fieldset>
    </form>
    <script src="bootstrap.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
</body>
</html>

<?php
db_disconnect($db);
?>
 