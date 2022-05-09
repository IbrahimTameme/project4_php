<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body
        {
            background-color: beige;
            
        }
        h1
        {
            font-style: italic;
            text-align: center;
            font-size: 50px;
            font-weight: bolder;
            color: rgb(23, 80, 23);
        }

        p
        {
            font-size: x-large;
            font-weight: 800;

            text-align: center;

        }
    </style>
    
</head>
<body>
    <div >
        <h1 > full name <?php echo$_SESSION['firstName']." ".$_SESSION['secondname']." ".$_SESSION['thirdname']." ".$_SESSION['fourthname']; ?>  </h1>
        <p > Your email <?php echo $_SESSION['email']; ?> </p>
        <p> Your phone number is <?php echo $_SESSION['PhoneNumbers']; ?> </p>
    </div>
</body>
</html>