<?php

$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $query = "SELECT ID FROM registration";
    $result = mysqli_query($conn, $query);

    if(empty($result)) {
        $query = "CREATE TABLE registration (
                          ID int(11) AUTO_INCREMENT,
                          email varchar(255) NOT NULL,
                          password varchar(255) NOT NULL,
                          PERMISSION_LEVEL int,
                          APPLICATION_COMPLETED int,
                          APPLICATION_IN_PROGRESS int,
                          PRIMARY KEY  (ID)
                          )";
        $result = mysqli_query($conn, $query);
    }
    $sql = "INSERT INTO registration (email, password)
VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
//
//    $stmt = $conn->prepare("insert into registration(email, password) values(?, ?)");
////    $stmt->bind_param("ss",$email, $password);
//    $execval = $stmt->execute();
//    echo $execval;
//    echo "Registration successfully...";
//    $stmt->close();
//    $conn->close();
}
?>
