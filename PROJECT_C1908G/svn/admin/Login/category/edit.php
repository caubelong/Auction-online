<?php
require_once('database.php');
require_once('functions.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    if (empty($_POST['name'])){
        $errors[] = 'Name Title is required';
    }

    
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $category = [];
        $category['categoryId'] = $_POST['id'];
        $category['categoryName'] = $_POST['name'];
        update_category($category);
        redirect_to('index_category.php');
    }
} else {
    if(!isset($_GET['id'])) {
        redirect_to('index_category.php');
    }
    $id = $_GET['id'];
    $category = find_category_by_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Category</title>
    <link rel="stylesheet" href="bs4/bootstrap.min.css">
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
    
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="form">
   
        <input type="hidden" name="id" 
        value="<?php echo isFormValidated()? $category['CategoryID']: $_POST['id'] ?>" >
        <div class="form-group">
    <label class="col-sm-2 control-label">Name</label>
    <div class="col-sm-3">
      <input class="form-control" type="text" id="name" name="name"  
        value="<?php echo isFormValidated()? $category['Cat_Name']: $_POST['name'] ?>">
    </div>
  </div>
        <div class="container">
&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">Sumbit</button> &nbsp; &nbsp; &nbsp; &nbsp;
<button type="reset" class="btn btn-info">Reset</button>  
</div>
    </div>
    </form>
    
    <br><br>
    <a href="index_category.php">Back to index Category Manage</a>
    
</body>
</html>
<script src="bootstrap.min.js"></script>
 <script src="jquery-3.4.1.min.js"></script>

<?php
db_disconnect($db);
?>