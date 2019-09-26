<?php

session_start();

$connect = new PDO("mysql:host=localhost;dbname=contact_ManagerDB", "phpmyadmin", "poosgroup");

$UserID = $_SESSION['username'];

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET')
{
    $data = array(
    ':FName'   => $_GET['FName'],
    ':LName'   => $_GET['LName'],
    ':Email'   => $_GET['Email'],
    ':HPhone'    =>$_GET['HPhone']
 );

$first = $_GET['FName'];
$last = $_GET['LName'];
$email = $_GET['Email'];
$phone = $_GET['HPhone'];

$query = "SELECT * FROM Members WHERE Members.UserID = '$UserID' AND FName LIKE '%$first%' AND LName LIKE '%$last%' AND Email LIKE '%$email%' AND HPhone LIKE '%$phone%'";

$statement = $connect->prepare($query);
$statement->execute($data);
$result = $statement->fetchAll();

foreach($result as $row)
{
    $output[] = array(
    'PersonID'    => $row['PersonID'],
    'FName'  => $row['FName'],
    'LName'   => $row['LName'],
    'Email'  => $row['Email'],
    'HPhone'   => $row['HPhone']
);

}
    header("Content-Type: application/json");
    echo json_encode($output);
}
if($method == "POST")
{
    $data = array(
        //':UserID' => $_POST['UserID'],
        ':FName'  => $_POST['FName'],
        ':LName'  => $_POST['LName'],
        ':Email'  => $_POST['Email'],
        ':HPhone'   => $_POST['HPhone']
     );

     $query = "INSERT INTO Members (UserID, FName, LName, Email, HPhone) VALUES ('$UserID', :FName, :LName, :Email, :HPhone)";

    //Posts to website
    $statement = $connect->prepare($query);
    $statement->execute($data);

    $data = json_decode(file_get_contents('php://input'), true);

    //Posts to ARC
    $query = "INSERT INTO Members (UserID, FName, LName, Email, HPhone) VALUES (:UserID, :FName, :LName, :Email, :HPhone)";


    $statement = $connect->prepare($query);
    $statement->execute($data);

    header("Content-Type: application/json");

    //ARC Print
    echo json_encode($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':PersonID'   => $_PUT['PersonID'],
  ':FName' => $_PUT['FName'],
  ':LName' => $_PUT['LName'],
  ':Email' => $_PUT['Email'],
  ':HPhone'  => $_PUT['HPhone']
 );

 $query = "
 UPDATE Members
 SET FName = :FName,
 LName = :LName,
 Email = :Email,
 HPhone = :HPhone
 WHERE PersonID = :PersonID
 ";

 $statement = $connect->prepare($query);
 $statement->execute($data);

}
if($method == "DELETE")
{
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM Members WHERE PersonID = '".$_DELETE["PersonID"]."'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
?>
