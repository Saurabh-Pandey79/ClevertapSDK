<?php
function autoIncrement($conn,$table){
    $sql = "SELECT AUTO_INCREMENT as max_id FROM information_schema.TABLES WHERE TABLE_SCHEMA = \"apidb\" AND TABLE_NAME = '$table'";
    if($res=mysqli_query($conn,$sql)){
        $res=mysqli_fetch_array($res);
        return $res['max_id'];
    }
}
         if(isset($_POST["submit1"])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "apidb";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 



$name = $_POST['name'];
$number = $_POST['number'];
$address = $_POST['address'];
$DOB = $_POST['DOB'];
$email = $_POST['email'];

$sql = " insert into signup(Name, PhoneNumber, Address, Dateofbirth, Email)
values('$name', '$number', '$address', '$DOB', '$email') ";
            if (mysqli_query($conn, $sql)) {
                $identity=autoIncrement($conn,"signup")-1;
                echo "1,".($identity);
            } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
        }
        
?>
