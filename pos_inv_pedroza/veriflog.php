<?php
    session_start();
    // require_once "connectdb.php";
    include "connectdb.php";
    if(isset($_POST['uname']) && isset($_POST['pass']))
    {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // session_start();
        $uname = validate($_POST['uname']);
        $pass = validate($_POST['pass']);

        if(empty($uname) && empty($pass))
        {

        }
        else
        {
            $sql = "SELECT * FROM login_tbl WHERE username='$uname' AND password='$pass'";

            $result = mysqli_query($con, $sql);
        }

        if(mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass)
            {
                // header("Location: ");

                $_SESSION['uname'] = $row['username'];
                $_SESSION['pass'] = $row['password'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['addr'] = $row['address'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php?$uname");
                exit();
            }
            else
            {
                header("Location: index.php?error=Incorrect username or password");
                exit();
            }
        }
        else
        {
            header("Location: index.php?error=Incorrect username or password");
            exit();
        }
        
    }
    else
    {
        header('Location: index.php?error');
        exit();
    }
?>