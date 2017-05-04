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
    <link rel="stylesheet" href="css/design.css" />

</head>

<body>

    <?php include('mainheader.php'); ?>


    <!--Code Start-->


    <div class="container">
         <table>
           <h1>Announcement</h1>
         <thead>
           <tr>
             <th>Number</th>
             <th>Title</th>
             <th>Author</th>
             <th>Date</th>
             <th>Hit</th>
           </tr>
         </thead>
         <tbody>


           <?php
                $sql = 'select * from announcement order by board_no desc';
                $result = $dbconn->query($sql);
                while($row = $result->fetch_assoc())
                {
                  $datetime = explode(' ', $row['board_date']);
                  $date = $datetime[0];
                  $time = $datetime[1];
                  if($date == Date('Y-m-d'))
                  $row['board_date'] = $time;
                  else
                  $row['board_date'] = $date;
                  ?>
                  <tr>
                    <td><?php echo $row['board_no']?></td>
                    <td><a href="announcement_view.php?bno=<?php echo $row['board_no']?>"><?php echo $row['board_title']?></a></td>
                    <td><?php echo $row['board_admin']?></td>
                    <td><?php echo $row['board_date']?></td>
                    <td><?php echo $row['board_hit']?></td>
                  </tr>
                  <?php
                }
                ?>
         </tbody>
       </table>
     </div>

    <?php include 'footer.php';?>

</body>

</html>
