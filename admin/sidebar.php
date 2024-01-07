<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body {
  margin: 0;
  font-family: 'Averia Gruesa Libre';font-size: 15px;
  color:#F8F9F9;
}

.sidebar {
  border-radius: 10px;
  margin: 0;
  padding: 0;
  width: 250px;
  background:linear-gradient(to bottom left, #6699ff 0%, #ffffff 100%);
  position: fixed;
  height: 100%;
  overflow: auto;
  font-size: 1.2em;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}



.sidebar a:hover:not(.active) {
  background: rgb(240, 240, 240);
  color: red;
  border-radius:10px;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}
a.act{
background: linear-gradient(to top right, #ffffcc 0%, #ff0000 100%);
color: black;
border-radius:10px;
}


@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<div class="sidebar" ><b>
  <a href="dashboard.php"   <?php if($active=='dashboard') echo "class='act'"; ?>><span class="glyphicon glyphicon-dashboard"></span>&nbsp&nbspDashboard</a>
  <a href="add_donor.php"   <?php if($active=='add') echo "class='act'"; ?>><span class="glyphicon glyphicon-pencil"></span>&nbsp&nbspAdd Donor</a>
  <a href="donor_list.php"   <?php if($active=='list') echo "class='act'"; ?>><span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbsp Donor List</a>
  <a href="query.php"   <?php if($active=='query') echo "class='act'"; ?>><span class="glyphicon glyphicon-check"></span>&nbsp&nbspCheck Messages</a>

    <a href="pages.php"   <?php if($active=='pages') echo "class='act'"; ?>><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspManage Pages</a>
  <a href="update_contact.php"   <?php if($active=='contact') echo "class='act'"; ?>><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspUpdate Contact Info</a>

</div>
