<?php
session_start();
$error = "";
if (isset($_POST['Login'])) {
    if (empty($_POST['Username']) || empty($_POST['Password'])) {
        $error = "Username or Password is Empty";
        echo $error;
    } 
    else {
        $user = $_POST['Username'];
        $pass = $_POST['Password'];
        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn, "ip_project");
        $query = mysqli_query($conn, "SELECT * FROM user WHERE Password=md5('$pass') AND Username='$user' AND status = 'active'");
        $query1 = mysqli_query($conn, "SELECT * FROM user WHERE Password=md5('$pass') AND Username='$user' AND status = 'inactive'");

        while ($row = mysqli_fetch_array($query)) 
        {
            $Email = $row['Email'];
            $_SESSION['Email'] = $Email;
            $Username = $row['Username'];
            $_SESSION['Username'] = $Username;
            $token = $row['token'];
            $_SESSION['token'] = $token;
        }

        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['Loggedin'] = true;

            header("location:../html/admin.php");
        } 
        else 
        {
            $query1row = mysqli_num_rows($query1);
            if($query1row == 1)
            {
                $_SESSION['Loggedin'] = false;
                $_SESSION['msg'] = "Account Activation Pending";
                header("location:../php/login.php");
            }
            else{
                $_SESSION['Loggedin'] = false;
                $_SESSION['msg'] = "Invalid Credentials or Account not Exists";
                header("location:../php/login.php");
            }
        }
        mysqli_close($conn);
    }
}

?>
