<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    require_once 'process.php'; ?>
    
    <?php 
    if (isset($_SESSION['message'])): ?>

    <div class="alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']) 
        ?>
    </div>
    <?php endif; ?>
    <?php
        //connecting to the mysql data base
        $mysqli = new mysqli('localhost', 'root', '', 'php_crud_application') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM city") or die($mysqli->error);
    ?>

    <div class="flex-container">
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <div>
            <form action="process.php" method="POST">
                    <label>Name</label>
                    <input type="text" name="name" value="Enter your name"><br>
                    <label>Location</label>
                    <input type="text" name="location" value="Enter your location"><br>
                    <button type="submit" name="save">Save</button>
            </form>
        </div>
    </div>
    
    
    

    <?php
        //pre_r($result);
        // pre_r($result->fetch_assoc());
        // pre_r($result->fetch_assoc());
    
        
        // function pre_r( $array ) {
        //     echo '<pre>';
        //     print_r($array);
        //     echo '<pre>';
        // }
    ?>

   
</body>
</html>