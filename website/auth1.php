


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Marks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="heo">
<table class="table table-hover">
  <tbody>
  <?php

$conn = mysqli_connect('localhost', 'root', '', 'apo');
$username = $_POST['username'];
$password = $_POST['password'];

//$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM attendance";
// Change this to your SQL query
$result = $conn->query($sql);

    
if ($result->num_rows>0) {
    echo "<thead>
    <thead><center><h1>CamVision</h1></center></thead>
    <tr><th >Name</th>
    <th >Roll No.</th>
    <th >Attendance</th>
    <th >Date/Time</th>
    
    
    </tr></thead>";
    while($row = $result->fetch_assoc()){
        
    echo "<tr><td>" . $row["NAME"]. "</td><td >" . $row['reg_num']. "</td><td> Present </td><td>" . $row['TIME']. "</td></tr><br></div>";
    }
    
}else{
    echo "0 result";
}
                
    $conn->close();
    ?>
    <a href="Auth.php" type="button" class="btn btn-success position-absolute bottom-0 start-50 translate-middle-x" >Back</a>

   </tbody>
   <!-- <a href="Auth.php" type="button" class="btn btn-success position-absolute bottom-0 start-50 translate-middle-x" >Back</a> -->

</table>
<!-- <a href="Auth.php" type="button" class="btn btn-success position-absolute bottom-0 start-50 translate-middle-x" >Back</a> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>
</body>
    <style>
        body {
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        }
        .table{
            padding: 20px;
            align-items:center;
            justify-content:center;
            text-align:center;
        }
        @media screen and (max-width: 600px) {
            button {
                font-size: 14px;
            }
        }
        .heo{
            margin :0;
            padding:75px;
        }
    </style>
   