<!DOCTYPE html>
<html lang="en">
<head>
  <title>Violations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Violation</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn-danger btn-xs" data-toggle="modal" data-target="#myModal">Product Violation</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product Violation</h4>
        </div>
<div class="modal-body">
<form name="form" id="form1" method="post" action="reportProductsend.php" required>

  <input type="text" class="form-control-lg" placeholder="Your Email" name="reporterEmail"><br/><br/>
  <input type="text" class="form-control-lg" placeholder="Who you want to Report"name="reportedEmail"><br/><br/>

  <select name="productViolation">
    <option value="">Product Violations...</option>
    <option value="Prohibited product">5. Prohibited product</option>
    <option value="Offensive product">6. Offensive product</option>
    <option value="Defective product">7. Defective product</option>
    <option value="Falsely Advertised product">8. Falsely Advertised product</option>
    <option value="Wrongly categorised">9. Wrongly categorised</option>
  </select><br/><br/>

<textarea name="reasonBox" cols="50" rows="5" placeholder="Please provide description of violation..." required>
Please provide description of violation...
</textarea><br/><br/>
<br />
<input type="submit" class="btn-danger btn-xs" name="submit" value="REPORT"><input type="reset" class="btn-default btn-xs" name="submit" value="RESET"><br/><br/>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>

</div>

</body>
</html>
