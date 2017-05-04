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


  <?php
    $orderBy = "user_ID";
    $order = "asc";

    if(!empty($_GET["orderby"])){
      $orderBy = $_GET["orderby"];
    }
    if(!empty($_GET["order"])){
      $order = $_GET["order"];
    }

    $userIDorder = "asc";
    $emailorder = "asc";
    $firstorder = "asc";
    $lastorder = "asc";
    $contactorder = "asc";
    $birthdateorder = "asc";
    $usertypeorder = "asc";
    $courseorder = "asc";
    $strandorder = "asc";
    $departmentorder = "asc";

    if($orderBy == "user_ID" and $order == "asc") {
		    $userIDorder = "desc";
	       }
	      if($orderBy == "email" and $order == "asc") {
		       $emailorder = "desc";
	         }
	      if($orderBy == "firstName" and $order == "asc") {
		        $firstorder = "desc";
	         }
       if($orderBy == "lastName" and $order == "asc") {
   		    $lastorder = "desc";
   	     }
         if($orderBy == "contactNum" and $order == "asc") {
     		    $contactorder = "desc";
     	     }
           if($orderBy == "birthDate" and $order == "asc") {
       		    $birthdateorder = "desc";
       	     }
             if($orderBy == "userType" and $order == "asc") {
         		    $usertypeorder = "desc";
         	     }
               if($orderBy == "course" and $order == "asc") {
           		    $courseorder = "desc";
           	     }
                 if($orderBy == "strand" and $order == "asc") {
             		    $strandorder = "desc";
             	     }
                   if($orderBy == "department" and $order == "asc") {
               		    $departmentorder = "desc";
               	      }



  ?>


<div class="container">
     <table>
       <h1>Administrator User View</h1>
     <thead>
       <tr>
         <th><a href="?orderby=user_ID&order=<?php echo $userIDorder ?>">USER_ID</a></th>
         <th><a href="?orderby=email&order=<?php echo $emailorder ?>">Email_Address</a></th>
         <th><a href="?orderby=firstName&order=<?php echo $firstorder ?>">firstname</a></th>
         <th><a href="?orderby=lastName&order=<?php echo $lastorder ?>">lastname</a></th>
         <th><a href="?orderby=contactNum&order=<?php echo $contactorder ?>">Contact_Number</a></th>
         <th><a href="?orderby=birthDate&order=<?php echo $birthdateorder ?>">Birthdate</a></th>
         <th><a href="?orderby=userType&order=<?php echo $usertypeorder ?>">User Type</a></th>
         <th><a href="?orderby=course&order=<?php echo $courseorder ?>">Course</a></th>
         <th><a href="?orderby=strand&order=<?php echo $strandorder ?>">Strand</a></th>
         <th><a href="?orderby=department&order=<?php echo $departmentorder ?>">Department</a></th>
       </tr>
     </thead>
     <tbody>

       <?php

               // Check connection
               if ($dbconn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
               }

             $sql = "SELECT * FROM users ORDER BY " . $orderBy ." " . $order;
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
