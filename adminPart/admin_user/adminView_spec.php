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
       <h1>Administrator User View</h1>
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
       </tr>
     </thead>
     <tbody>



       <?php


              $usernumber = $_GET['usersid'];
             $sql = "SELECT * FROM users WHERE user_ID=$usernumber" ;
             $result = $dbconn->query($sql);

             if ($result->num_rows > 0) {
                 // output data of each row
                 while($row = $result->fetch_assoc()) {
                   echo
                   " <tr>
                   <td>{$row['user_ID']}</td>
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

       <thead>
           <tr>
             <th>House Number</th>
             <th>Street</th>
             <th>Building</th>
             <th>Subdivision</th>
             <th>Barangay</th>
             <th>City</th>
             <th>Province</th>
             <th>Zipcode</th>
           </tr>
       </thead>
       <?php


              $usernumber = $_GET['usersid'];
             $sql = "SELECT * FROM address WHERE user_ID=$usernumber" ;
             $result = $dbconn->query($sql);

             if ($result->num_rows > 0) {
                 // output data of each row
                 while($row = $result->fetch_assoc()) {
                   echo "
                   <tr>
                     <td>{$row['houseNum']}</td>
                     <td>{$row['street']}</td>
                     <td>{$row['building']}</td>
                     <td>{$row['subdivision']}</td>
                     <td>{$row['barangay']}</td>
                     <td>{$row['city']}</td>
                     <td>{$row['province']}</td>
                     <td>{$row['zipCode']}</td>
                   </tr>\n";

                 }

             } else {
                 echo "<tr><td>0 results</td></tr>";
             }





       ?>
       <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
     </tbody>
   </table>


</div>

  	</div>

    <?php include('ad_user_footer.php'); ?>


    </body>

    </html>
