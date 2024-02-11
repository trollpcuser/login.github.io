<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password ='root@123';
$database_name = 'database123';

$conn = mysqli_connect($servername, $username, $password, $database_name);
if (!$conn) {
    die('Connection failed' . mysqli_connect_error());
}
if(isset($_POST['send'])){
    $namei = $_POST['namei'];
    $sql_query1 = "SELECT email FROM entry_data";
    $check_email_query = "SELECT email FROM entry_data WHERE email='$namei' LIMIT 1";
    $check_email_query_run =mysqli_query($conn,$check_email_query);
    $sql_query = "INSERT INTO entry_data (email) VALUES ('$namei')";
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        // $_SESSION['status'] = "user already exists";
        // header("Location: data.php");
        echo "
        <script>
        alert('User already exists');
        document.location.href ='index.php';
        </script>
        ";
    }
    else if(mysqli_query($conn, $sql_query)){
        echo "New entry data added successfully";
    }
    else{
        echo "Error: " . $sql ."" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>