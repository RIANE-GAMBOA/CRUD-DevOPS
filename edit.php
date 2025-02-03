<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_activity"; 

$connection = new mysqli($servername, $username, $password, $dbname);



    $id = "";
    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";


    //////show data  client
    if ( $_SERVER['REQUESTED_METHOD'] == 'GET' ) {

        if (!isset($_GET['id']) ) {
            header("Location: http://localhost/CRUD-DevOPS/index.php");
            exit;
        }
            $id = $_GET["id"];

            /////selected client from database table
            $sql = "SELECT * FROM clients WHERE id=$id";
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();

            if (!$row) {
                header("Location: http://localhost/CRUD-DevOPS/index.php");
                exit;
            }

            $name = $row["name"];
            $phone = $row["phone"];
            $email = $row["email"];
            $address = $row["address"];

       //////Update data client
    } else {

        $name = $_POST["id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        
        do {
            if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) { 
                $errorMessage = "All the fields are required";
                break;
            }
            $sql = "UPDATE clients " . 
                "SET name = '$name', email = '$email', phone = '$phone', address = '$address',  " . 
                "WHERE id = $id";

            if (!$result) {
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }
                $successMessage = "Client updated correctly!";
                header("Location: http://localhost/CRUD-DevOPS/index.php");
                break;

        }while(false)


    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Devops</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id "value="<?php echo ($id); ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo ($name); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo ($phone); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo ($email); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo ($address); ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/CRUD-DevOPS/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>      
    </div>
</body>
</html>