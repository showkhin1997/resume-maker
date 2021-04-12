<?php session_start(); ?>
<?php
  if(!isset($_SESSION['valid'])){
    header('Location: login.php');
  }
?>
<?php
  include("connection.php");
  $userId = $_SESSION['id']; 
  $result = mysqli_query($mysqli, "SELECT * FROM experience WHERE user_id='$userId'")
					or die("Could not execute the select query.");

                    $res = mysqli_fetch_array($result);

    $result2 = mysqli_query($mysqli, "SELECT * FROM personal_information WHERE user_id='$userId'")
					or die("Could not execute the select query.");

                    $res2 = mysqli_fetch_array($result2);

    $result3 = mysqli_query($mysqli, "SELECT * FROM education WHERE user_id='$userId'")
					or die("Could not execute the select query.");

                    $res3 = mysqli_fetch_array($result3);
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resume</title>
</head>

<body>
    <h4><b><a href="index.php" style="color: rgb(0, 0, 0); border: 5px solid green; padding: 5px 5px; margin: 20px; border-radius: 5px;">Home</a> | <a href="personalInformationView.php" style="color: rgb(0, 0, 0); border: 5px solid green; padding: 5px 5px; margin: 20px; border-radius: 5px;">View Personal Information</a> |  <a href="viewExperience.php" style="color: rgb(0, 0, 0); border: 5px solid green; padding: 5px 5px; margin: 20px; border-radius: 5px;">View Experiance</a> | <a href="educationView.php" style="color: rgb(0, 0, 0); border: 5px solid green; padding: 5px 5px; margin: 20px; border-radius: 5px;">View Education</a> | <a href="logout.php" style="color: rgb(0, 0, 0); border: 5px solid green; padding: 5px 5px; margin: 20px; border-radius: 5px;">Logout</a></b></h4>
	<br/><br/>
    <div class="container">
        <div id="left">
            <div id="address">
                <div class="callmail">
                    <div id="tel">
                        <img src="images/phone.png" alt="tel">
                        <p><?php echo $res2['phone']?></p>
                    </div>
                    <div id="em">
                        <img src="images/email.png" alt="email">
                        <p><?php echo $res2['email']?></p>
                    </div>
                </div>
                <div class="home">
                    <div id="hm">
                        <img src="images/home.png" alt="home">
                        <p><?php echo $res2['home']?></p>
                    </div>
                </div>
            </div>
            <div id="name">
                <p id="first_name"><?php echo $res2['firstName']?></p>
                <p id="last_name"><?php echo $res2['lastName']?></p>
                <p id="proffesion"><?php echo $res2['designation']?></p>
            </div>
            <div id="experience">
                <h2>Experience</h2>
                <h3><?php echo $res['position']?> - <?php echo $res['end_date']?></h3>
                <h4><?php echo $res['company_name']?>/ <?php echo $res['address']?></h4>
                <p><?php echo $res['description']?></p>
                <!-- <h3>Creative User Interface Designer - 2016</h3>
                <h4>Company Name/ California USA</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus sit quae similique ex quam
                    consequatur accusamus esse animi quos voluptatum praesentium reiciendis </p> -->
            </div>

            <div id="pro_skills">
                <h2>Pro Skills</h2>
                <div id="photoshop">
                    <p>Photoshop</p>
                    <div class="bar"></div>
                </div>
                <div id="illustrator">
                    <p>Illustrator</p>
                    <div class="bar"></div>
                </div>
                <div id="indesign">
                    <p>Indesign</p>
                    <div class="bar"></div>
                </div>
                <div id="after_effect">
                    <p>After Effect</p>
                    <div class="bar"></div>
                </div>
                <div id="sketch">
                    <p>Sketch</p>
                    <div class="bar"></div>
                </div>
            </div>
        </div>
        <div id="right">
            <div class="box">
                <img src="<?php echo $res2['image']?>" alt="" id="profile_pic">
            </div>
            <div id="profile">
                <h2>Profile</h2>
                <p><?php echo $res2['profile']?></p>
            </div>
            <div id="education">
                <h2>Education</h2>
                <h4><?php echo $res3['startDate1']?> to <?php echo $res3['endDate1']?></h4>
                <h4><?php echo $res3['degreeName1']?> Degree, <?php echo $res3['majorSubject1']?></h4>
                <p><?php echo $res3['instituteName1']?></p>
                <h4><?php echo $res3['startDate2']?> to <?php echo $res3['endDate2']?></h4>
                <h4><?php echo $res3['degreeName2']?> Degree, <?php echo $res3['subjectName2']?></h4>
                <p><?php echo $res3['instituteName2']?></p>
            </div>
            <div id="reference">
                <h2>Reference</h2>
                <p>Senior Designer</p>
                <h4>Jhon Ander Smith</h4>
                <p>Company name here</p>
            </div>
        </div>
    </div>
</body>

</html>