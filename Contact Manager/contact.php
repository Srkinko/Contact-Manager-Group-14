<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit();
}
?>

<html>
  <head>
    <title>Contact Manager</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/grid_theme.css" rel="stylesheet">
    <script src="js/grid.js"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">


    <style>
      .hide
      {
        display:none;
      }
    </style>
  </head>

  <body>

    <header id="header">
      <a href="logout.php"><i class="logout"></i>Logout</a>
      <div class="logo">

        <h1>Contact Manager</h1>

      </div>

    </header>


    <div class="container">
      <br />
      <div class="table-responsive">
        <h1 align="center"><?=$_SESSION['username']?>'s Contacts</h1><br/>
        <div id="grid_table"></div>
      </div>
    </div>


<script>
    $('#grid_table').jsGrid({
     width: "100%",
     height: "600px",
     filtering: true,
     inserting:true,
     editing: true,
     sorting: true,
     paging: true,
     autoload: true,
     pageSize: 10,
     pageButtonCount: 5,
     deleteConfirm: "Do you really want to delete data?",

     controller: {
      loadData: function(filter){
       return $.ajax({
        type: "GET",
        url: "fetch_data.php",
        data: filter
       });
      },
      insertItem: function(item){
       return $.ajax({
        type: "POST",
        url: "fetch_data.php",
        data: item
       });
      },
      updateItem: function(item){
       return $.ajax({
        type: "PUT",
        url: "fetch_data.php",
        data: item
       });
      },
      deleteItem: function(item){
       return $.ajax({
        type: "DELETE",
        url: "fetch_data.php",
        data: item
       });
      },
     },

     fields: [
      {
       name: "PersonID",
    type: "hidden",
    css: 'hide'
      },
      {
       name: "FName",
    type: "text",
    width: 100,
      },
      {
       name: "LName",
    type: "text",
    width: 100,
      },
      {
       name: "Email",
    type: "text",
    width: 150,
      },
      {
       name: "HPhone",
    type: "text",
    width: 100,
      },
      {
       type: "control"
      }
     ]

    });

</script>
</body>
</html>  
