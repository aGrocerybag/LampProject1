<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSV file Upload</title>
</head>
<body>
    <div id="componet">
    <h1>CSV file upload</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
     <input type="file" name="file">
     <input type="submit" name="sumbmitFile">
</div>          
</body>
</html>
<?php 
 echo"PHP SUCKS";
?>