<?php
require 'security.php';
if (isset($_POST['crime'])) {
    require 'db.php';
    extract($_POST);
    $today = date('Y-m-d H:i:s');
    $left = "0000-00-00";
    $sql = "INSERT INTO `suspects`(`id`, `names`, `identity`, `gender`, `date`, `crime`, `type`, `date_left`) VALUES (null ,'$names','$identity','$gender','$today','$crime','$type','$left')";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $message = "suspect added";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">
    <script src="bootstrap-4.2/js/jquery.min.js"></script>
    <script src="bootstrap-4.2/js/popper.min.js"></script>
    <script src="bootstrap-4.2/js/bootstrap.min.js"></script>


</head>
<body>
<?php
require 'navbar.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card" style="margin-top: 20px">
                <div class="card-header">
                    Add Suspect
                </div>

                <div class="card-body">
                    <h4 class="text-success">
                        <?php
                        if (isset($message))
                            echo "successful added";
                        ?>

                    </h4>

                    <form action="home.php" method="post">
                        <div class="form-group">
                            <label for="email">Names:</label>
                            <input type="text" name="names" class="form-control" required id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Id/Passport Number:</label>
                            <input type="text" name="identity" class="form-control" required id="pwd">
                        </div>
                        <div class="radio">
                            <label><input type="radio" checked value="male" name="gender">male</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" value="female" name="gender">female</label>
                        </div>
                        <div class="form-group">
                            <label> type of crime </label>
                            <select name="type" class="form-control">
                                <option value="traffic">traffic</option>
                                <option value="murder">murder</option>
                                <option value="theft>theft</option>
                                <option value="drugs-abuse">drugs-abuse</option>
                                <option value="others">others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> describe the crime </label>
                            <textarea name="crime"  rows="5" class="form-control"></textarea>
                        </div>



                        <button type="submit" class="btn btn-primary btn-block">Add Suspect</button>
                    </form>
                    <p class="text-danger">
                        <?php
                        if (isset($error))
                            echo $error;

                        ?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
