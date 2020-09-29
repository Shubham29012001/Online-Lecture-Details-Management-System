<?php
session_start();
unset($_SESSION['deletemsg']);
if($_SESSION['Loggedin'] == true)
{

  if(isset($_REQUEST['Submit'])) 
  {
    $username = $_SESSION['Username'];
    $Department = $_POST['Staff_Department'];
    $_SESSION['Department'] = $Department;
    $Year = $_POST['Year'];
    $_SESSION['Year'] = $Year;
    $Sem = $_POST['Sem'];
    $_SESSION['Sem'] = $Sem;
    $SubjectName = $_POST['Subject_Name'];
    $_SESSION['Subject_Name'] = $SubjectName;
    $CAY = $_POST['Academic_Year'];
    $_SESSION['CAY'] = $CAY;
    $TopicName = $_POST['TopicName'];
    $_SESSION['TopicName'] = $TopicName;
    $Deadline = $_POST['deadline'];
    $_SESSION['Deadline'] = $Deadline;

    $conn = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn, "ip_project");
    $query1 = "SELECT * FROM user WHERE Username = '$username'";

    $queryrun = mysqli_query($conn, $query1);
    while ($row = mysqli_fetch_array($queryrun)) {
        $Name = $row['Name'];
    }

    $_SESSION['Name'] = $Name;
    $query = "INSERT INTO staff (Name,Department,Year,Sem,Subject_Name,CAY)
        VALUES ('$Name','$Department','$Year','$Sem','$SubjectName','$CAY');";

    if (!mysqli_query($conn, $query)) {
        echo "Not Inserted";
    } 
    else {
        echo "Inserted";
        header("Location: ../php/material.php");
    }

    mysqli_close($conn);
  }
}
else
{
  if($_SESSION['Loggedin'] == false)
  {
    header("location:../php/login.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/loginformstyle.css" />
  <link rel="icon" type="image/png" sizes="32x32" href="../images/circle-cropped.png" />
  <title>Staff Detail Form</title>
  <style>
    @media only screen and (min-width: 651px) and (max-width: 1024px) {
      input[type="submit"] {
        margin-left: 8%;
        width: 40%;
      }

      input[type="button"] {
        margin-left: 4%;
        width: 40%;
      }

      input[type="datetime-local"] {
        font-size: small;
        padding: 7px;
        width:96%;
      }
    }

    @media screen and (max-width: 650px) {
      input[type="submit"] {
        margin: 2% auto;
        margin-left: 5%;
        width: 90%;
      }

      input[type="button"] {
        margin: 2% auto;
        margin-left: 5%;
        width: 90%;
      }

      input[type="datetime-local"] {
        font-size: small;
        padding: 9px;
        border:2px;
      }

      .container {
        padding-bottom: 2%;
      }
    }

    @media screen and (max-width: 350px) {
      .container {
        padding-bottom: 4%;
      }

      input[type="submit"] {
        margin: 2% auto;
        width: 100%;
        margin-bottom: 4%;
      }

      input[type="button"] {
        margin: 2% auto;
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="title">
        <h1>
          <i class="fas fa-chalkboard-teacher"></i> Staff Details Management
          Form
        </h1>
        <nav>
        <p>
          <?php if(isset($_SESSION['Username']))
        { 
          $user = $_SESSION['Username'];
          echo "Welcome, $user!!!"; 
        }?>
        </p>
          <a href="../PHP/logout.php"><button id="logout" name="Logout">Logout</button></a>
      </nav>
    </div>
  </header>
  <main>
    <br />
    <div class="container">
      <form class="Form" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
        <span class="GetSubjectName" onchange="setSubjectName();">
          <div class="row">
            <div class="GetSubjectName">
              <div class="col-25">
                <label for="Staff_Department">Department:</label>
              </div>
              <div class="col-75">
                <select name="Staff_Department" onchange="getDepartmentName();" id="Staff_Department" onchange="getDepartmentName();" required>
                  <option value="" disabled selected>
                    Enter your Department
                  </option>
                  <option value="Mech">Mechanical</option>
                  <option value="EXTC">Electronics and Telecommunication</option>
                  <option value="Instru">Instrumental</option>
                  <option value="CS">Computer Science</option>
                  <option value="IT">Information Technology</option>
                  <option value="Civil">Civil</option>
                  <option value="DS">Data Science</option>
                  <option value="AI">Artifical Intelligence</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="Year">Year:</label>
            </div>
            <div class="col-75">
              <select name="Year" id="Year" onchange="getYear();" required>
                <option value="" disabled selected>Choose Year</option>
                <option value="1">First Year</option>
                <option value="2">Second Year</option>
                <option value="3">Third Year</option>
                <option value="4">Fourth Year</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="Semtype">Sem Type:</label>
            </div>
            <div class="col-75">
              <select name="Sem" id="Semtype" onchange="semtype();" required>
                <option value="" disabled selected>Choose Sem Type</option>
                <option value="odd">Odd Sem</option>
                <option value="even">Even Sem</option>
              </select>
            </div>
          </div>
        </span>

        <div class="row">
          <div class="col-25">
            <label for="Subject_Name">Subject Name:</label>
          </div>
          <div class="col-75">
            <select name="Subject_Name" class="Subject" id="Subject_Name" onchange="getSubject();" required>
              <option value="" disabled selected>Choose your Subject</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="Academic_Year">Current Academic Year:</label>
          </div>
          <div class="col-75">
            <select name="Academic_Year" id="Academic_Year" required onchange="getAcademicYear();">
              <option value="" disabled selected>Choose Academic Year</option>
              <option value="17">2017-18</option>
              <option value="18">2018-19</option>
              <option value="19">2019-20</option>
              <option value="20">2020-21</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="Topic">Topic Name:</label>
          </div>
          <div class="col-75">
            <input name="TopicName" type="text" size="30" id="Topic" placeholder="Enter the Chapter Topic Name"
              required />
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="Dead_Date">Deadline Date:</label>
          </div>
          <div class="col-75">
            <input name="deadline" type="datetime-local" placeholder="Enter the Deadline Time" value="" id="Dead_Date" required/>
          </div>
        </div>
        <input name="Submit" type="submit" id="Submit" value="Add Materials" />
        <a href="deletematerial.php"><input name="Delete" type="button" id="Delete" value="Delete Materials" /></a>
      </form>
    </div>
  </main>
  <footer>
    <div class="Useful-links">
      <h2>Useful Links</h2>
      <ul>
        <li>
          <i class="fas fa-link"></i><a href="" target="_blank">Student Educational Verification</a>
        </li>
        <li>
          <i class="fas fa-link"></i><a href="" target="_blank">Mumbai University</a>
        </li>
        <li>
          <i class="fas fa-link"></i><a href="" target="_blank">AICTE</a>
        </li>
        <li><i class="fas fa-link"></i><a href="" target="_blank">DTE</a></li>
      </ul>
    </div>
    <div class="Menu">
      <h2>Menu</h2>
      <ul>
        <li>
          <i class="fas fa-external-link-alt"></i><a href="" target="_blank">Home</a>
        </li>
        <li>
          <i class="fas fa-external-link-alt"></i><a href="" target="_blank">Mandatory Disclosure</a>
        </li>
        <li>
          <i class="fas fa-external-link-alt"></i><a href="" target="_blank">German Club</a>
        </li>
        <li>
          <i class="fas fa-external-link-alt"></i><a href="" target="_blank">AICTE FeedBack</a>
        </li>
        <li>
          <i class="fas fa-external-link-alt"></i><a href="" target="_blank">Fee Proposal (2020-21)</a>
        </li>
      </ul>
    </div>
    <div class="Contacts">
      <h2>Contacts</h2>
      <ul>
        <li>
          <i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;K.T. Marg, Vartak
          College Campus, Vasai Road (W), Dist-Palghar, Vasai, Maharashtra
          401202
        </li>
        <li><i class="fas fa-tty"></i>&nbsp;&nbsp;0250-233 9486</li>
        <li>
          <i class="fab fa-facebook-f"></i><a href="" target="_blank">Facebook</a>
        </li>
        <li>
          <i class="fab fa-linkedin"></i><a href="" target="_blank">Linkedin</a>
        </li>
        <li>
          <i class="fab fa-youtube"></i><a href="" target="_blank">Youtube</a>
        </li>
      </ul>
    </div>
  </footer>
  <script src="../js/staffform.js"></script>
  <script src="https://kit.fontawesome.com/6d617ef3fb.js" crossorigin="anonymous"></script>
</body>

</html>