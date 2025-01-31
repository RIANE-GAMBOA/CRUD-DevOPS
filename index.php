<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Devops</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="/crud-devops/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At/th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cruddevops";
                    
                    ///create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    ///check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    ///read all row from datavase table
                    $sql =  "SELECT * FROM clients"
                    $result = $connection->query("$$sql");

                    if (!rsult) {
                        die("Invalid query: " . $connection->error);
                    }

                    ///read data of eacj row
                    while ($row = $result->fetch_assoc()) { 
                        echo"
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[phone]/td>
                    <td>$row[email]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/crud-devops/edit.php?id=$row[id]'>EDIT</a>
                        <a class='btn btn-primary btn-sm' href='/crud-devops/delete.php?id=$row[id]'>DELETE</a>
                    </td>
                </tr>
                        ";
                    }

                ?>
               
            </tbody>
        </table>

    </div>
</body>
</html>