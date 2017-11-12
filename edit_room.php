<html>
<head>
<!--  <link rel="stylesheet" type="text/css" href="css/table.css">-->
<!--  <link rel="stylesheet" type="text/css" href="css/form.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/agency.css" rel="stylesheet">
  <style>
    body {
      background-color: grey;
    }

  </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span> <span
            class="icon-bar"></span> <span class="icon-bar"></span> <span
            class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="adminpage.php">Hotel
        Royals </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse"
         id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="adminpage.php" class="page-scroll"> Admin Page</a></li>
        <li><a href="logout.php" class="btn btn-primary"> Logout</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<h2 class="aa_h2"  style="position: fixed; left: 45%; top:10%;">All Bookings</h2>
<div class="aa_htmlTable" style="position: fixed; top:20%;">

  <br />
  <div style="width:100%;height:50%;overflow-y: scroll;">
  <table align="center" style="width:25%;position: fixed; left: 40%;" border="2">
    <thead>
      <tr>
        <th>Room No</th>
        <th>Type</th>
        <th>Availability</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connect.php";
        $sql="Select * from rooms";
        $result=mysqli_query($conn,$sql);
        while($found=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
          ?>
          <tr>
            <td><?php echo $found['Room_No']; ?></td>
            <td><?php echo $found['Type']; ?></td>
            <td><?php echo $found['Availability']; ?></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
</div>
<div class="container" style="position: fixed; top: 50%; left: 10%;">
    <form id="add_form" action="room_added.php" method="post">
        <h2>Add a Room</h2>
        <fieldset>
            <input placeholder="Room No" type="integer" name="room_no" tabindex="1" required autofocus>
        </fieldset>
        <br>
        <label>
            Type:
        </label>
        <select name="type" id="add_form">
            <option>Economy</option>
            <option>Buisness</option>
            <option>Deluxe</option>
        </select>
        <br><br>
        <label>
            Available?
        </label>
        <select name="availability" id="add_form">
            <option>Yes</option>
            <option>No</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary" style="color: black" />Add</button>
    </form>
</div>
<div class="container" style="position: fixed; top: 50%; left: 40%;">
    <form id="edit_form" action="room_updated.php" method="post">
        <h2>Edit Room</h2>
        <fieldset>
          <input placeholder="Room No*" type="integer" name="room_no" tabindex="1" required autofocus>
        </fieldset>
        <br>
        <label>
            Type:
        </label>
        <select name="type" id="edit_form">
            <option>Economy</option>
            <option>Buisness</option>
            <option>Deluxe</option>
        </select>
        <br><br>
        <label>
            Available?
        </label>
        <select name="availability" id="edit_form">
            <option>Yes</option>
            <option>No</option>
        </select>
      <br>
      <button type="submit" class="btn btn-primary" style="color: black" />Edit</button>
    </form>
</div>
<div class="container" style="position: fixed; top: 50%; left: 70%;">
    <form method="post" action="room_delete.php" >
        <h2>Delete Room</h2>
        <fieldset>
            <input placeholder="Room No" type="integer" name="room_no" required autofocus>
        </fieldset>
        <br>
        <button type="submit" class="btn btn-primary" style="color: black" />Delete</button>
    </form>
</div>

</body>
</html>

