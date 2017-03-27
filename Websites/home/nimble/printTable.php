<?php
  //$conn = new mysqli($servername, $username, $password, $dbname);
  //echo "hhnknk";
  $conn=mysqli_connect("172.16.100.161","ignus","r00t@ignus17","ignus") or die("not connect");
  //$conn=mysqli_connect("mysql.hostinger.in","u177974137_mark4","mark42","u177974137_mark4") or die("not connect");
  
  if(!$conn){
    echo "<script>alert('Sorry ! currently database is not working.')</script>";
  }
  else{
$sql = "SELECT * FROM nimble17";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
    echo "<table>";
    echo "<tr><td>Serial</td><td>Name</td><td>Mobile</td><td>Email</td><td>Events</td><td>Count</td><td>Other Members</td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$i. "</td><td> ". $row["name"]. "</td><td> " . $row["mobile"]. "</td><td> " . $row["email"]. "</td><td>". $row["events"]."</td><td> ".$row["count"] ."</td><td> ".$row["othermembers"]."</td></tr>";
       $i++; 
    }
    echo "</table>";
} else {
    echo "0 results";
}

}
?>
<html>

<body>
	
</body>
<html>