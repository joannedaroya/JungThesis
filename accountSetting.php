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
    <link rel="stylesheet" href="css/profile.css" />

</head>

<body>

    <?php include('mainheader.php');
        $userID = $_SESSION['user_ID'];
    ?>


        <!--First-->
        <?php
    $email = $_SESSION['email'];
    $query = $dbconn->query("SELECT * FROM users WHERE user_ID='$userID'");
    if($query->num_rows > 0){
      while($row = $query->fetch_assoc()) {
  ?>
            <div class="container">
                <h2> <?php echo $row['firstName']. " " .$row['lastName']; ?>
 Account</h2> </br>
                <div class="row">
                    <div class="col-md-3">
                        <ul class="user-side-menu">
                            <div class="user-side-menu_bg">
                                <div class="user-side-menu_name">
                                    <?php echo $row['firstName']. " " .$row['lastName']; ?>
                                </div>
                            </div>
                            <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
                                <a class="user-side-menu_link-selected" href="accountSetting.php">
                                    <div class="user-side-menu_link-text">Account Settings</div>
                                </a>
                            </li>
                            <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
                                <a class="user-side-menu_link" href="#">
                                    <div class="user-side-menu_link-text">Notifications</div>
                                </a>
                            </li>
                            <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
                                <a class="user-side-menu_link" href="orderHistory.php">
                                    <div class="user-side-menu_link-text">My Orders</div>
                                </a>
                            </li>
                            <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
                                <a class="user-side-menu_link" href="productView.php">
                                    <div class="user-side-menu_link-text">My Products</div>
                                </a>
                            </li>
                            <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
                                <a class="user-side-menu_link" href="mySales.php">
                                    <div class="user-side-menu_link-text">My Sales</div>
                                </a>
                            </li>
                            <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
                                <a class="user-side-menu_link" href="salesReport.php">
                                    <div class="user-side-menu_link-text">Sales Report</div>
                                </a>
                            </li>
                            <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
                                <a class="user-side-menu_link" href="productInventory.php">
                                    <div class="user-side-menu_link-text">Inventory System</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="page-wrapper">
                            <form name="personalInfo" method="post" action="updateInfo.php">
                                <fieldset>
                                    <h4>Personal Info</h4>
                                    <hr/>
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <input type="hidden" name="userID" value="<?php echo $_SESSION['user_ID']; ?>">
                                            <input type="email" class="form-control" name="email" id="email" value=<?php echo $email ?>>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="control-group form-group col-lg-6">
                                            <div class="controls">
                                                <input type="text" class="form-control" name="firstName" id="firstName" value=<?php echo $row[ 'firstName'] ?>>
                                            </div>
                                        </div>
                                        <div class="control-group form-group col-lg-6">
                                            <div class="controls">
                                                <input type="text" class="form-control" name="lastName" id="lastName" value=<?php echo $row[ 'lastName'] ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group form-group col-lg-6">
                                        <div class="controls">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" name="contactNum" id="contactNum" value=<?php echo $row[ 'contactNum'] ?>>
                                        </div>
                                    </div>
                                    <div class="control-group form-group col-lg-6">
                                        <div class="controls">
                                            <label>Birthdate</label>
                                            <input type="date" class="form-control" name="birthDate" id="birthDate" required>
                                        </div>
                                    </div>
                                    <input type="submit" value="Update" class="btn btn-primary"> &nbsp;&nbsp;&nbsp;
                                    <input type="reset" value="Clear" class="btn">
                                </fieldset>
                            </form>
                            <?php
            }
          }
        ?>

                                <form name="changePw" method="post" action="updatePassword.php"><br/><br/>
                                    <h4>Change Password</h4>
                                    <hr/>
                                    <div class="control-group form-group">
                                        <div class="controls">
                                          <input type="hidden" name="userID" value="<?php echo $_SESSION['user_ID']; ?>">
                                            <input type="password" class="form-control" name="oldPassword" id="oldPassword" required placeholder="Old Password">
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <input type="password" class="form-control" name="newPassword" id="newPassword" required placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <input type="password" class="form-control" name="confirmpw" id="confirmpw" required placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <input type="submit" value="Update" class="btn btn-primary"> &nbsp;&nbsp;&nbsp;
                                    <input type="reset" value="Clear" class="btn">
                                </form>

                                <fieldset><br/><br/>
                                    <h4>Shipping Info</h4>
                                    <hr/>

                                    <?php $query = $dbconn->query("SELECT * FROM address WHERE user_ID='$userID'");
          if($query->num_rows > 0){
            while($row = $query->fetch_assoc()) {
          ?>
                                    <p>House No./Unit and Floor No.:
                                        <?php echo $row['houseNum']; ?>
                                    </p>
                                    <p>Street:
                                        <?php echo $row['street']; ?>
                                    </p>
                                    <p>Building:
                                        <?php echo $row['building']; ?>
                                    </p>
                                    <p>Subd./Apartment/Village:
                                        <?php echo $row['subdivision']; ?>
                                    </p>
                                    <p>Barangay:
                                        <?php echo $row['barangay']; ?>
                                    </p>
                                    <p>City:
                                        <?php echo $row['city']; ?>
                                    </p>
                                    <p>Province:
                                        <?php echo $row['province']; ?>
                                    </p>
                                    <p>Zip Code:
                                        <?php echo $row['zipCode']; ?>
                                    </p>
                                    <button id="address-btn" class="btn btn-info">Edit Address</button>
                                </fieldset>
                                <?php
            }
          } else {
            echo "<p>No listed Address.</p>";
            echo "<button id='address-btn' class='btn btn-info'>Add Address</button><br/><br/>";
          }
           ?>
                                    <div id="address-form">
                                        <form method="post" action="updateAddress.php">
                                            <input type="hidden" name="userID" value="<?php echo $_SESSION['user_ID']; ?>">
                                            <fieldset><br/>
                                                <div class="control-group form-group">
                                                    <div class="controls">
                                                        <label>House No./Unit and Floor No.</label><small> eg. #72 or 1635 16/F</small>
                                                        <input type="text" class="form-control" name="houseNum" id="houseNum" required>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <div class="controls">
                                                        <label>Street</label>
                                                        <input type="text" class="form-control" name="street" id="street" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="control-group form-group col-lg-6">
                                                        <div class="controls">
                                                            <label>Building</label>
                                                            <input type="text" class="form-control" name="building" id="building">
                                                        </div>
                                                    </div>
                                                    <div class="control-group form-group col-lg-6">
                                                        <div class="controls">
                                                            <label>Subd./Apartment/Village</label>
                                                            <input type="text" class="form-control" name="subd" id="subd">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="control-group form-group col-lg-6">
                                                        <div class="controls">
                                                            <label>Barangay</label>
                                                            <input type="text" class="form-control" name="brgy" id="brgy">
                                                        </div>
                                                    </div>
                                                    <div class="control-group form-group col-lg-6">
                                                        <div class="controls">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city" id="city" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="control-group form-group col-lg-6">
                                                        <div class="controls">
                                                            <label>Province</label>
                                                            <select class="form-control col-sm-2" name="province" id="province" required>
                      <option value="">--Select Province--</option>
                      <option value="Metro Manila">Metro Manila</option>
                      <option value="Abra">Abra</option>
                      <option value="Agusan del Norte">Agusan del Norte</option>
                      <option value="Agusan del Su">Agusan del Sur</option>
                      <option value="Aklan">Aklan</option>
                      <option value="Albay">Albay</option>
                      <option value="Antique">Antique</option>
                      <option value="Apayao">Apayao</option>
                      <option value="Aurora">Aurora</option>
                      <option value="Basilan">Basilan</option>
                      <option value="Bataan">Bataan</option>
                      <option value="Batanes">Batanes</option>
                      <option value="Batangas">Batangas</option>
                      <option value="Benguet">Benguet</option>
                      <option value="Biliran">Biliran</option>
                      <option value="Bohol">Bohol</option>
                      <option value="Bukidnon">Bukidnon</option>
                      <option value="Bulacan">Bulacan</option>
                      <option value="Cagayan">Cagayan</option>
                      <option value="Camarines Norte">Camarines Norte</option>
                      <option value="Camarines Sur">Camarines Sur</option>
                      <option value="Camiguin">Camiguin</option>
                      <option value="Capiz">Capiz</option>
                      <option value="Catanduanes">Catanduanes</option>
                      <option value="Cavite">Cavite</option>
                      <option value="Cebu">Cebu</option>
                      <option value="Compostela Valley">Compostela Valley</option>
                      <option value="Cotabato">Cotabato</option>
                      <option value="Davao Oriental">Davao Oriental</option>
                      <option value="Davao del Norte">Davao del Norte</option>
                      <option value="Davao del Sur">Davao del Sur</option>
                      <option value="Dinagat Islands">Dinagat Islands</option>
                      <option value="Eastern Samar">Eastern Samar</option>
                      <option value="Guimaras">Guimaras</option>
                      <option value="Ifugao">Ifugao</option>
                      <option value="Ilocos Norte">Ilocos Norte</option>
                      <option value="Ilocos Sur">Ilocos Sur</option>
                      <option value="Iloilo">Iloilo</option>
                      <option value="Isabela">Isabela</option>
                      <option value="Kalinga">Kalinga</option>
                      <option value="La Union">La Union</option>
                      <option value="Laguna">Laguna</option>
                      <option value="Lanao del Norte">Lanao del Norte</option>
                      <option value="Lanao del Sur">Lanao del Sur</option>
                      <option value="Leyte">Leyte</option>
                      <option value="Maguin">Maguindanao</option>
                      <option value="Marinduque">Marinduque</option>
                      <option value="Masbate">Masbate</option>
                      <option value="Mindoro Occidental">Mindoro Occidental</option>
                      <option value="Mindoro Oriental">Mindoro Oriental</option>
                      <option value="Misamis Occidental">Misamis Occidental</option>
                      <option value="Misamis Oriental">Misamis Oriental</option>
                      <option value="Mountain Province">Mountain Province</option>
                      <option value="Negros Occidental">Negros Occidental</option>
                      <option value="Negros Oriental">Negros Oriental</option>
                      <option value="North Cotabato">North Cotabato</option>
                      <option value="Northern Samar">Northern Samar</option>
                      <option value="Nueva Ecija">Nueva Ecija</option>
                      <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                      <option value="Palawan">Palawan</option>
                      <option value="Pampanga">Pampanga</option>
                      <option value="Pangasinan">Pangasinan</option>
                      <option value="Quezon">Quezon</option>
                      <option value="Quirino">Quirino</option>
                      <option value="Rizal">Rizal</option>
                      <option value="Romblon">Romblon</option>
                      <option value="Samar">Samar</option>
                      <option value="Sarangani">Sarangani</option>
                      <option value="Siquijor">Siquijor</option>
                      <option value="Sorsogon">Sorsogon</option>
                      <option value="South Cotabato">South Cotabato</option>
                      <option value="Southern Leyte">Southern Leyte</option>
                      <option value="Sultan Kudarat">Sultan Kudarat</option>
                      <option value="Sulu">Sulu</option>
                      <option value="Surigao del Norte">Surigao del Norte</option>
                      <option value="Surigao del Sur">Surigao del Sur</option>
                      <option value="Tarlac">Tarlac</option>
                      <option value="Tawi-Tawi">Tawi-Tawi</option>
                      <option value="Zambales">Zambales</option>
                      <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                      <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                      <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                  </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group form-group col-lg-6">
                                                        <div class="controls">
                                                            <label>Zip Code</label>
                                                            <input type="number" class="form-control" name="zipCode" id="zipCode" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" value="Update" class="btn btn-primary"> &nbsp;&nbsp;&nbsp;
                                                <input type="reset" value="Clear" class="btn">
                                            </fieldset>
                                        </form>
                                    </div><br/>
                                    <a href="deactivatePage.php" class="btn btn-danger deactivate">Deactivate Account</a>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <hr style="width:80%;"><br/>

            <?php include 'footer.php';?>


            <script type="text/javascript">
                var button = document.getElementById("address-btn");
                var myDiv = document.getElementById("address-form");

                function show() {
                    myDiv.style.display = "block";
                }

                function hide() {
                    myDiv.style.display = "none";
                }

                function toggle() {
                    if (myDiv.style.display === "none") {
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
