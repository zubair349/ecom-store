<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product Data</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include("connectdb.php");
        $sql = "SELECT * FROM product_tb";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                $temp = array();
                $temp   = explode(',', $row['img']);
                foreach($temp as $image){
                echo "<td><img src='".$image."' alt='Product Image' width='100'></td>";
                }
                echo "</tr>";
        }
    }
        else{
            echo "Data not available";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</body>
</html>