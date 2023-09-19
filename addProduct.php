<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         div{
          width: 50px;
          height: 30px;
          float: right;
          cursor: pointer;
         }
    </style>
    <title>Add Product</title>
</head>
<body>
  <div>
    <a href="logout.php"><button>logout</button></a>
  </div>
    
    <form action="addProduct.php" method="post" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input type="text"  name="name"><br>
  <label for="price">Price:</label><br>
  <input type="number"  name="price"><br>
  <input type="file" name="uploadimage[]" value="" multiple="true"><br>
  <input type="submit"  name="submit">

</form>

<?php
include("connectdb.php");
include("addsession.php");

// if(isset($_POST["submit"])){
//   $name = $_POST["name"];
//   $price = $_POST["price"];
//   $filename = $_FILES["uploadimage"]["name"];
//   $tempname = $_FILES["uploadimage"]["tmp_name"];
//   $folder = "./images/" . $filename;
  
//   // Check if the image was successfully uploaded
//   if (move_uploaded_file($tempname, $folder)) {
//     // Image uploaded successfully, now insert the file path into the database
//     $sql = "INSERT INTO product_tb (name, price, img) VALUES ('$name', '$price', '$folder')";
    
//     // Run the SQL query and check for errors
//     if (mysqli_query($conn, $sql)) {
//       echo "<h3>Image uploaded and path inserted into the database successfully!</h3>";
//     } else {
//       echo "<h3>Error inserting image path into the database: " . mysqli_error($conn) . "</h3>";
//     }
//   } else {
//     echo "<h3>Failed to upload image!</h3>";
//   }
// }

// Add multiple images for single product

if(isset($_POST["submit"])){
  
  $name = $_POST["name"];
  $price = $_POST["price"];
  
  foreach ($_FILES['uploadimage']['tmp_name'] as $file => $tempname){
    $filepaths = [];
    $filename = $_FILES['uploadimage']['name'][$file];
    $tempname = $_FILES['uploadimage']['tmp_name'][$file];
    $folder = "./images/" . $filename;

    if (move_uploaded_file($tempname,$folder)) {
      $filePaths[] = $folder;
    }
    // $filePathsStr = implode(',', $filePaths);
  }
  //use the move_uploaded_file() to move your file on your server directory.
  if (!empty($filePaths)) {
    
    $filePathsStr = implode(',',$filePaths);
    $sql = "INSERT INTO product_tb (name, price, img) VALUES ('$name', '$price', '$filePathsStr')";
  //fire an insert query that inserts all the file names with comma separated value

  // Run the SQL query and check for errors
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Image uploaded and path inserted into the database successfully!</h3>";
  } else {
    echo "<h3>Error inserting image path into the database: " . mysqli_error($conn) . "</h3>";
  }
  } else {
  echo "<h3>Failed to upload image!</h3>";
  }
  }


?>

</body>
</html>