<?php
session_start();
$errors = array();

$db = mysqli_connect('localhost', 'phpmyadmin', 'poosgroup', 'contact_ManagerDB');

if (isset($_POST['login_user']))
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username))
    {
        array_push($errors, "*Username is required");
    }
    if (empty($password))
    {
        array_push($errors, "*Password is required");
    }

    if (count($errors) == 0)
    {
        $password = md5($password);

        $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";

        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1)
        {
            $_SESSION['username'] = $username;
            //$_SESSION['UserID'] = '2';
            $_SESSION['loggedin'] = TRUE;
            header('location: contact.php');
        }
        else
        {
            array_push($errors, "*Wrong username or password!");
        }
    }
}
?>
