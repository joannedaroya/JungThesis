<!DOCTYPE html>
<html lang="en">

<head>
    <title>:::iMARKET:::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../../css/adminOnly.css">
    <!--Javascript-->
    <script src="../../jsforAdmin/jsAdmin.js"></script>

</head>

<body>

  <?php include('adminView_header.php'); ?>



<!--2ndMain starts (table for user) - Jung-->
<!--<div class="form-group">
    <select class="form-control" name="usercat" required>
       <option value="" selected disabled>Choose</option>
       <option value="admin">Admin</option>
       <option value="employee">Employee</option>
       <option value="student">Student</option>
    </select>
</div>-->





<div class="container">
     <table>
       <h1>Administrator Suspend/Deactivate List View</h1>
     <thead>
       <tr>
         <th>USER_ID</th>
         <th>Email_Address</th>
         <th>firstname</th>
         <th>lastname</th>
         <th>Contact_Number</th>
         <th>Birthdate</th>
         <th>User Type</th>
         <th>Course</th>
         <th>Strand</th>
         <th>Department</th>
         <th>User Status</th>
         <th>Test Button</th>
       </tr>
     </thead>
     <tbody>

       <?php

       $orderBy = "user_ID";
       $order = "asc";

       if(!empty($_GET["orderby"])){
         $orderBy = $_GET["orderby"];
       }
       if(!empty($_GET["order"])){
         $order = $_GET["order"];
       }

               // Check connection
               if ($dbconn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
               }

             $sql = "SELECT * FROM users WHERE userStatus = 0 ORDER BY " . $orderBy ." " . $order;
             $result = $dbconn->query($sql);

             if ($result->num_rows > 0) {
                 // output data of each row
                 while($row = $result->fetch_assoc()) {
                   echo
                   "<tr>";
                   echo '<td><a href="adminView_spec.php?usersid=' . $row['user_ID'] . '">' . $row['user_ID'] . '</a></td>';
                   echo"
                     <td>{$row['email']}</td>
                     <td>{$row['firstName']}</td>
                     <td>{$row['lastName']}</td>
                     <td>{$row['contactNum']}</td>
                     <td>{$row['birthdate']}</td>
                     <td>{$row['userType']}</td>
                     <td>{$row['course']}</td>
                     <td>{$row['strand']}</td>
                     <td>{$row['department']}</td>
                     <td>{$row['userStatus']}</td>
                     <td><form action='user_update.php' method='post'>
                          <input type='hidden' name='userID' id='userID' value='{$row['user_ID']}'>
                          <button>Activate</button>
                          </form>
                          </td>
                   </tr>\n";

                 }

             } else {
                 echo "<tr><td>0 results</td></tr>";
             }





       ?>
     </tbody>
   </table>


</div>

  	</div>

    <!--Footer-->
    <?php include('ad_user_footer.php'); ?>


    </body>

    </html>
