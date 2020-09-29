<?php
session_start();

if ($_SESSION['Loggedin'] == true) {
  $id = $_SESSION['updateid'];
  $topicname = $_SESSION['updatetopicname'];
  $filename = $_SESSION['updatefilename'];
  $deadline = $_SESSION['updatedeadline'];
  $type = $_SESSION['type'];
  $token = $_SESSION['token'];
  // echo $type;

  $conn = mysqli_connect('localhost', 'root', '', 'ip_project');

  if (isset($_POST['Submit'])) 
  {
    if ($type == '.pdf') {
      // echo $id;
      $newfilename = $_FILES['file']['name'];
      $topicname = $_POST['TopicName'];
      $pdfpath = '../upload/pdf/';
      //$deadline = $_POST['deadline'];
      $select = "SELECT id from pdfmaterials WHERE id = $id";
      $selectrun = mysqli_query($conn,$select);
      $row = mysqli_num_rows($selectrun);
      if($row == 1)
      {
        $update = "UPDATE pdfmaterials set topicname = '$topicname', file_name = '$newfilename', directory = '$pdfpath$newfilename' where id = $id and token = '$token'";
        if (mysqli_query($conn, $update)) 
        {

          if (move_uploaded_file($_FILES['file']['tmp_name'], '../upload/pdf/' . $newfilename)) 
          {
            $_SESSION['Updatemsg'] = "PDF Updated";
            $_SESSION['updatetopicname'] = $topicname;
            $_SESSION['updatefilename'] = $newfilename;
          } 
          else 
          {
            $update = "UPDATE pdfmaterials set topicname = '$topicname', file_name = '$filename', directory = '$pdfpath$filename' where id = $id and token = '$token'";
            $updaterun = mysqli_query($conn,$update);
            $_SESSION['updatetopicname'] = $topicname;
            $_SESSION['Updatemsg'] = "Changes Done Successfully";        
          }
        }
      }
      else{
          $_SESSION['Updatemsg']  = "ID Not Found";

      }
    } 

    if ($type == '.pptx') 
    {
      // echo $id;
      $newfilename = $_FILES['file']['name'];

      $topicname = $_POST['TopicName'];
      $pptpath = '../upload/ppt/';
      //$deadline = $_POST['deadline'];
      $select = "SELECT id from pdfmaterials WHERE id = $id";
      $selectrun = mysqli_query($conn,$select);
      $row = mysqli_num_rows($selectrun);
      if($row == 1)
      {
        $update = "UPDATE pptmaterials set topicname = '$topicname', file_name = '$newfilename', directory = '$pptpath$newfilename' where id = $id and token = '$token'";
        if (mysqli_query($conn, $update)) 
        {

          if (move_uploaded_file($_FILES['file']['tmp_name'], '../upload/ppt/' . $newfilename)) {
            $_SESSION['Updatemsg'] = "PPT Updated";
            $_SESSION['updatetopicname'] = $topicname;
            $_SESSION['updatefilename'] = $newfilename;
          } 
          else 
          {
            $update = "UPDATE pptmaterials set topicname = '$topicname', file_name = '$filename', directory = '$pptpath$filename' where id = $id and token = '$token'";
            $updaterun = mysqli_query($conn,$update);
            $_SESSION['updatetopicname'] = $topicname;
            $_SESSION['Updatemsg'] = "Changes Done Successfully";
          }
        } 
      }
      else {
        $_SESSION['Updatemsg']  = "ID Not Found";
      }
    } 
    
  }

  if (isset($_POST['Delete'])) 
  {
    if ($type == '.pdf') 
    {
      $select = "SELECT id from pdfmaterials WHERE id = $id";
      $selectrun = mysqli_query($conn,$select);
      $row = mysqli_num_rows($selectrun);
      if($row == 1)
      {
        $pdfpath = '../upload/pdf/';
        $delete = "DELETE FROM pdfmaterials WHERE id= $id";
        if (mysqli_query($conn, $delete)) 
        {
            unlink($pdfpath . "/" . $filename);
            $_SESSION['Updatemsg'] = "PDF Deleted Successfully";
        } 
        else 
        {
            $_SESSION['Updatemsg'] = "Failed to Delete";
        }    
      }
      else
      {
        $_SESSION['Updatemsg'] = "Already Deleted";
      }
    }

    if ($type == '.pptx') 
    {
      $select = "SELECT id from pptmaterials WHERE id = $id";
      $selectrun = mysqli_query($conn,$select);
      $row = mysqli_num_rows($selectrun);
      if($row == 1)
      {
        $pptpath = '../upload/ppt/';
        $delete = "DELETE FROM pptmaterials WHERE id= $id";
        if (mysqli_query($conn, $delete)) 
        {
            unlink($pptpath . "/" . $filename);
            $_SESSION['Updatemsg'] = "PPT Deleted Successfully";
        } 
        else 
        {
            $_SESSION['Updatemsg'] = "Failed to Delete";
        }    
      }
      else
      {
        $_SESSION['Updatemsg'] = "Already Deleted";
      }
    }
    
  }

  mysqli_close($conn);
} 
else {
  if ($_SESSION['Loggedin'] == false) {
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
  <title>Material Updation Form</title>
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
        width: 96%;
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
        border: 2px;
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
        <i class="fas fa-chalkboard-teacher"></i> Material Updation
        Form
      </h1>
      <nav>
        <p>
          <?php if (isset($_SESSION['Username'])) {
            $user = $_SESSION['Username'];
            echo "Welcome, $user!!!";
          } ?>
        </p>
        <a href="../PHP/logout.php"><button id="logout" name="Logout">Logout</button></a>
      </nav>
    </div>
  </header>
  <main>
    <br />
    <div class="container">
      <form class="Form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-25">
            <label for="Topic">Topic Name:</label>
          </div>
          <div class="col-75">
            <input name="TopicName" value="<?php echo $_SESSION['updatetopicname'] ?>" type="text" size="30" id="Topic" placeholder="Enter the Chapter Topic Name" required />
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="currentmaterial">Current File</label>
          </div>
          <div class="col-75">
            <input name="CurrentMaterial" value="<?php echo $_SESSION['updatefilename'] ?>" disabled type="text" size="30" id="currentmaterial" />
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="Choose_Material">Choose File:</label>
          </div>
          <div class="col-75">
            <input type="file" value="<?php echo $_SESSION['updatedeadline'] ?>" name="file" accept="<?php echo $type ?>" id="Choose_Material" />
          </div>
        </div>
        <?php
        if ($type == ".assignment") { ?>

          <div class="row">
            <div class="col-25">
              <label for="Submission">Submission URL:</label>
            </div>
            <div class="col-75">
              <input name="Submission" type="text" size="30" value="<?php echo $_POST['Submission'] ?? ''; ?>" id="Submission" placeholder="Enter the Assignment Submission URL">
            </div>

            <div class="row">
              <div class="col-25">
                <label for="Dead_Date">Deadline Date:</label>
              </div>
              <div class="col-75">
                <input name="deadline" value="<?php echo $_SESSION['updatedeadline'] ?>" type="datetime-local" placeholder="Enter the Deadline Time" value="" id="Dead_Date" required />
              </div>
            </div>



          <?php } ?>

          <div class="checkemail">
            <p class="checkemailmsg <?php if (isset($_SESSION['Updatemsg'])) echo "display"; ?>">
              <?php
              if (isset($_SESSION['Updatemsg'])) {
                echo $_SESSION['Updatemsg'];
              }
              ?>
            </p>
          </div>

          <input name="Submit" type="submit" id="Submit" value="Update" />
          <input name="Delete" type="submit" id="Delete" value="Delete" />
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
  <script src="https://kit.fontawesome.com/6d617ef3fb.js" crossorigin="anonymous"></script>
</body>

</html>