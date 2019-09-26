<?php
session_start();

$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'phpmyadmin', 'poosgroup', 'contact_ManagerDB');

// REGISTER USER
if (isset($_POST['reg_user']))
{
    // Recieve Input
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // Form validation
    if (empty($username)) { array_push($errors, "*Username is required"); }
    if (empty($email)) { array_push($errors, "*Email is required"); }
    if (empty($password_1)) { array_push($errors, "*Password is required"); }
    if ($password_1 != $password_2)
    {
        array_push($errors, "*The two passwords do not match");
    }

    // Duplicate user check
    $user_check_query = "SELECT * FROM accounts WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user)
    {
        if ($user['username'] === $username)
        {
        array_push($errors, "*Username already exists");
        }

        if ($user['email'] === $email)
        {
            array_push($errors, "*Email already exists");
        }
    }

// Finally, register user if there are no errors in the form
    if (count($errors) == 0)
    {
        // Password encription
        $password = md5($password_1);

        $query = "INSERT INTO accounts (username, email, password)
              VALUES('$username', '$email', '$password')";

        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = "You are now logged in";
        header('location: index.php');
    }
}
?>
