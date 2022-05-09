<?php
session_start();
// setCookie('FirstName', date("H:i:s-m/d/y"), 60*24*60*60+time());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="../css/style.css">

    <style>
        body
        {
            background-color: aqua;

        }
    </style>
</head>
<body>
    <h1 class="text-center admin-h1"> Welcome  Admin To Your Control Page! </h1>
    <p class="text-center"> The following table contains the user information: </p>
    <!--The information in a table -->  
    <table class="table table-striped admin-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Date Created</th>
                <th scope="col">Date Last Login</th>
            </tr>
        </thead>
        <tbody>
        <?php
                     $id= 1;
                     foreach ($_SESSION['sessionarr'] as $value) {
                         echo "<tr>
                                 <td>".$id."</td>
                                 <td>".$value['First Name']."</td>
                                 <td>".$value['Email']."</td>
                                 <td>".$value['Password']."</td>
                                 <td>".$value['when create']."</td>
                                 <td>".$value['Last-Login-Date']."</td>
                             </tr>";
                         $id++;  
                    }
                     ?>
        </tbody>
    </table>
</body>
</html>