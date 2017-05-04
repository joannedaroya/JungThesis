<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="css/design.css" />
</head>

<body>

  <?php include('mainheader.php'); ?>
            <!--Login System Embedded by Jung End-->




        <div class="container-fluid">


            <br><br><br>

            <div class="row">
                <h2> Hi! Let's Get Started  </h2>
                <hr>
                <br>
                <div class="col-md-5 col-xs-0">

                    <pre>
                        this is only temporary this pre shit will be remove
                    </pre>

                </div>
                <div class="col-md-5 col-xs-12">

                    <h4> It’s free and always will be.</h4>
                    <form method="post" action="registerProcess.php">
                        <div class="form-group form-inline">
                            <span class="form-group-addon"><i class="glyphicon glyphicon-user"></i></span> &nbsp&nbsp
                            <input type="text" class="form-control" placeholder="Enter First Name" name="firstName">

                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="newemail">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpassword" placeholder="New Password" required>
                            <small id="passHelp" class="form-text text-muted">One Capital One Special Character and 8 characters</small>
                        </div>

                        <div class="form-group">
                            <label for="bday">Contact Number </label> <br>
                            <input type="tel" name="contactNum" class="form-control" placeholder="Contact Number" required>
                            <small id="contactHelp" class="form-text text-muted"> Please begin with +63</small>
                        </div>

                        <div class="form-group">
                            <label for="bday">Date of Birth </label> <br>
                            <input type="date" name="birthDate" class="form-control" required>
                        </div>


                        <h4>Oh! One more thing </h4>
                        <small id="Help" class="form-text text-muted">Are you a:</small> <br>


                        <div class="radio" id="userType">
                          <label><input type="radio" name="userType" value="student" required>Student</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="userType" value="employee" required>Employee</label>
                        </div>
                        <br>

                        <div id="student">
                        <div class="control-group form-group">
                            <label for="yearLvl">Year Level</label> <br>
                            <select class="form-control col-sm-2" name="yearLvl" id="yearLvl" required>
                              <option value="NA">Senior High School</option>
                              <option value="1st Year">1st Year College</option>
                              <option value="2nd Year">2nd Year College</option>
                              <option value="3rd Year">3rd Year College</option>
                              <option value="4th Year">4th Year College</option>
                              <option value="Irregular">Irregular</option>
                            </select>
                        </div>

                        <div class="row">
                          <div class="control-group form-group col-lg-6">
                            <div class="controls">
                              <label>Strand</label>
                                <select class="form-control col-sm-2" name="strand" id="strand">
                                  <option value="NA">Choose your Strand</option>
                                  <option value="Humanities ans Social Sciences">Humanities ans Social Sciences</option>
                                  <option value="Accountancy and Business Management">Accountancy, Business And Management</option>
                                  <option value="Computer Programming">Computer Programming</option>
                                  <option value="Animation">Animation</option>
                                  <option value="Fashion Design">Fashion Design</option>
                                  <option value="MMA">Media and Visual Arts with Specialization in Multimedia Arts</option>
                                </select>
                            </div>
                          </div>
                          <div class="control-group form-group col-lg-6">
                            <div class="controls">
                              <label>Course</label>
                                <select class="form-control col-sm-2" name="course" id="course">
                                  <option value="NA">Choose your Course</option>
                                  <option value="SE">Software Engineering</option>
                                  <option value="WD">Web Development</option>
                                  <option value="GD">Game Development</option>
                                  <option value="MMA">Multimedia Arts and Design</option>
                                  <option value="Animation">Animation</option>
                                  <option value="Marketing">Marketing Management</option>
                                  <option value="Real Estate">Real Estate Management</option>
                                  <option value="FD">Fashion Design</option>
                                  <option value="DA">Digital Arts</option>
                                  <option value="Financial">Financial Management</option>
                                </select>
                            </div>
                          </div>
                        </div>
                        </div>

                        <div id="employee">
                        <div class="form-group">
                            <label for="yearLvl">Department</label> <br>
                            <select class="form-control col-sm-2" name="dept" id="dept" required>
                              <option value="General">General Education</option>
                              <option value="Computing">School of Computing</option>
                              <option value="Design">School of Design</option>
                              <option value="Business">School of Business</option>
                            </select>
                        </div>
                        </div>

                        <input type="hidden" name="Status" value=0>

                        <div class="form-group">
                            <div>
                                <button class="btn btn-success btn-md" name="submit" type="submit">
                                  Sign Up!
                                </button>
                                <button type="reset" class="btn btn-default btn-md">Clear</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>

        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>

        <?php include('footer.php'); ?>


        <script type="text/javascript">
          var button = document.getElementById("userType");
          var myDiv = document.getElementById("student");

          if(button == )

          function show() {
            myDiv.style.visibility = "visible";
          }

          function hide() {
            myDiv.style.visibility = "hidden";
          }

          function toggle() {
            if (myDiv.style.visibility === "hidden") {
                show();
            } else {
                hide();
            }
          }

          hide();

          button.addEventListener("click", toggle, false);
        </script>

</body>

</html>
