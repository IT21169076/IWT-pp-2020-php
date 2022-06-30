<!DOCTYPE html>
<html>

<head>
    <title>bookshop</title>
</head>

<body>
    <?php

        //config file for create database connection

        $servername = "localhost";
        $username = "root";
        $password = "user321";
        $dbname = "bookshop";

        //Create connection
        $conn = new mysqli($servername, $username, $password, $dbname );

        //check connection
        if($conn->connect_error){
          die("connection failed:".$conn->connect_error);
        }




  //Fetch all sales data from sales table
  $sql = "SELECT * FROM sales WHERE bookMonthSold IN ('January', 'February', 'March', 'April')";

  $result = mysqli_query($conn, $sql);

  if($result->num_rows > 0){

    $totalSold = 0;
    echo "

    <h1>Sales Report of the first quarter (January-April)</h1>
    <table border='1' width='80%'>
    <tr>
          <th>Book ID</th>
          <th>book Name</th>
          <th>Price</th>
          <th>Books sold</th>
          <th>Month</th>
    </tr>";

    while($row = $result->fetch_assoc()){
      
      echo "
      
      <tr>
      
        <td>".$_row['bookId']."</td>
        <td>".$_row['bookName']."</td>
        <td>".$_row['bookPrice']."</td>
        <td>".$_row['bookQtySold']."</td>
        <td>".$_row['bookMonthSold']."</td> 

      </tr>     
       
      ";

      $totalSold +=$_row['bookPrice'] * $_row['bookQtySold'];
    }

  }

  //display total sales 

  echo "<h1>Total Sales for this quarter is : Rs. ".$totalSold. "</h1>";

?>
    </table>

</body>

</html>
