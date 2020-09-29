<?php
session_start();
$stafftoken = $_SESSION['token'];
if($_SESSION['Loggedin'] == true)
{
    if (isset($_POST['Submit'])) 
    {
        $id = $_POST['ID'];
        $type = $_POST['ChooseMaterial'];

        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn, "ip_project");

        if ($type == 'pdf') {

            $idmquery = "SELECT token FROM pdfmaterials WHERE id = '$id'";
            $idmtoken = mysqli_query($conn,$idmquery);
            while($idmtokenrowarray =  mysqli_fetch_array($idmtoken))
            {
                $idmtokenrow = $idmtokenrowarray['token'];
                //echo "$idmtokenrow";
            }

            $idmrow = mysqli_num_rows($idmtoken);

            if($idmrow==0)
            {
                $_SESSION['deletemsg'] = "No PDF File Found";
            }
            else
            {

                    if($idmtokenrow == $stafftoken)
                    {
                        $pdfpath = '../upload/pdf/';
                        $deletefile = "SELECT * FROM pdfmaterials where id='$id'";
                        $deletefilerun = mysqli_query($conn, $deletefile);
                        while ($row = mysqli_fetch_array($deletefilerun)) 
                        {
                            $filename = $row['file_name'];
                            unlink($pdfpath . $filename);
                        }
                        $query = "DELETE FROM pdfmaterials WHERE id='$id'";
                        $output = mysqli_num_rows($deletefilerun);
                        if($output == 1) 
                        {
                            $queryrun = mysqli_query($conn, $query);
                        // echo "deleted";
                            $_SESSION['deletemsg'] = "PDF Deleted";
                        } 
                    } 
                    else
                    {
                    // echo  "Cannot Delete Other Staffs Files";
                        $_SESSION['deletemsg'] = "Cannot Delete Other Staffs Files";
                    }
            
            }
        }

        if ($type == 'ppt') 
        {
            
            $idmquery = "SELECT token FROM pptmaterials WHERE id = '$id'";
            $idmtoken = mysqli_query($conn,$idmquery);

            while($idmtokenrowarray =  mysqli_fetch_array($idmtoken))
            {
                $idmtokenrow = $idmtokenrowarray['token'];
                //echo "$idmtokenrow";
            }

            $idmrow = mysqli_num_rows($idmtoken);

            if($idmrow==0)
            {
                $_SESSION['deletemsg'] = "No PPT File Found";
            }
            else
            {
               if($idmtokenrow == $stafftoken)
                {
                    $pptpath = '../upload/ppt/';
                    $deletefile = "SELECT * FROM pptmaterials where id='$id'";
                    $deletefilerun = mysqli_query($conn, $deletefile);
                    while ($row = mysqli_fetch_array($deletefilerun)) 
                    {
                        $filename = $row['file_name'];
                        unlink($pptpath . $filename);
                    }
                    $query = "DELETE FROM pptmaterials WHERE id='$id'";
                    $output = mysqli_num_rows($deletefilerun);
                    if ($output == 1) 
                    {
                        $queryrun = mysqli_query($conn, $query);
                        $_SESSION['deletemsg'] = "PPT Deleted";
                    } 
                }  
                else
                {
                    $_SESSION['deletemsg'] = "Cannot Delete Other Staffs Files";
                }

            }

        }
        if ($type == 'assignments') 
        {
            $idmquery = "SELECT token FROM assignment WHERE id = '$id'";
            $idmtoken = mysqli_query($conn,$idmquery);

            while($idmtokenrowarray =  mysqli_fetch_array($idmtoken))
            {
                $idmtokenrow = $idmtokenrowarray['token'];
                //echo "$idmtokenrow";
            }

            $idmrow = mysqli_num_rows($idmtoken);

            if($idmrow==0)
            {
                $_SESSION['deletemsg'] = "No Assignment File Found";
            }
            else
            {
                if($idmtokenrow == $stafftoken)
                {
                    $pdfpath = '../upload/assignments/';
                    $deletefile = "SELECT * FROM assignment where id='$id'";
                    $deletefilerun = mysqli_query($conn, $deletefile);
                    while ($row = mysqli_fetch_array($deletefilerun)) 
                    {
                        $filename = $row['file_name'];
                        unlink($pdfpath . $filename);
                    }
                    $query = "DELETE FROM assignment WHERE id='$id'";
                    $output = mysqli_num_rows($deletefilerun);
                    if ($output == 1) 
                    {
                        $queryrun = mysqli_query($conn, $query);
                        //echo "pdf deleted";
                        $_SESSION['deletemsg'] = "Assignment Deleted";
                    } 
                
                }
                else
                {
                    $_SESSION['deletemsg'] = "Cannot Delete Other Staffs Files";
                }
            }

        }


        if ($type == 'quiz') 
        {
            $idmquery = "SELECT token FROM quiz WHERE id = '$id'";
            $idmtoken = mysqli_query($conn,$idmquery);

            while($idmtokenrowarray =  mysqli_fetch_array($idmtoken))
            {
                $idmtokenrow = $idmtokenrowarray['token'];
                //echo "$idmtokenrow";
            }

            $idmrow = mysqli_num_rows($idmtoken);

            if($idmrow==0)
            {
                $_SESSION['deletemsg'] = "No Quiz File Found";
            }
            else
            {
                if($idmtokenrow == $stafftoken)
                {
                    $deletefile = "SELECT * FROM quiz where id='$id'";
                    $deletefilerun = mysqli_query($conn, $deletefile);
                    $query = "DELETE FROM quiz WHERE id='$id'";
                    $output = mysqli_num_rows($deletefilerun);
                    if ($output == 1) 
                    {
                        $queryrun = mysqli_query($conn, $query);
                        //echo "pdf deleted";
                        $_SESSION['deletemsg'] = "Quiz Deleted";
                    } 
                    
                }
                else
                {
                    $_SESSION['deletemsg'] = "Cannot Delete Other Staffs Files";
                }
                
            }
        }

        if ($type == 'video') 
        {
            $idmquery = "SELECT token FROM video WHERE id = '$id'";
            $idmtoken = mysqli_query($conn,$idmquery);

            while($idmtokenrowarray =  mysqli_fetch_array($idmtoken))
            {
                $idmtokenrow = $idmtokenrowarray['token'];
                //echo "$idmtokenrow";
            }

            $idmrow = mysqli_num_rows($idmtoken);

            if($idmrow==0)
            {
                $_SESSION['deletemsg'] = "No Video File Found";
            }
            else
            {
                if($idmtokenrow == $stafftoken)
                {
                    $deletefile = "SELECT * FROM video where id='$id'";
                    $deletefilerun = mysqli_query($conn, $deletefile);
                    $query = "DELETE FROM video WHERE id='$id'";
                    $output = mysqli_num_rows($deletefilerun);
                    if ($output == 1) 
                    {
                        $queryrun = mysqli_query($conn, $query);
                        //echo "pdf deleted";
                        $_SESSION['deletemsg'] = "Video File Deleted";
                    }
                }
                else
                {
                    $_SESSION['deletemsg'] = "Cannot Delete Other Staffs Files";
                }
                
            }
    }   }
}
else
{
  if($_SESSION['Loggedin'] == false)
  {
    header("location:../php/login.php");
  }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Delete Material Form</title>
        <link rel="stylesheet" href="../css/loginformstyle.css">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/circle-cropped.png">
        <script src="https://kit.fontawesome.com/6d617ef3fb.js" crossorigin="anonymous"></script>

        <style>
            @media only screen and (min-width: 651px) and (max-width:1024px)
                {
        
                    input[type="submit"]
                    {
                        margin-left: 8%;
                        width: 40%;
                    }
        
                    input[type="button"]
                    {
                        margin-left: 4%;
                        width: 40%;
                    }
        
                    .display
                    {
                        width:40%;
                        padding: 15px;
                        margin-left:29.3%;
                        margin-bottom: 5px;
                    }
                }
        
            @media screen and (max-width: 650px) 
            {
                input[type="submit"]
                    {
                        margin:2% auto;
                        margin-left:5%;
                        width: 90%;
                        
                    }
        
                    input[type="button"]
                    {
                        margin:2% auto;
                        margin-left:5%;
                        width: 90%;
                    }

        
                    .container 
                    {
                        padding-bottom: 2%;
                    }

                            
                    .display
                    {
                        width:60%;
                        padding: 13px;
                        margin-left:21%;
                        margin-bottom: 20px;
                    }
            }
        
            @media screen and (max-width: 350px) 
            {
                .container 
                    {
                        padding-bottom: 4%;
                    }
        
                    input[type="submit"]
                    {
                        margin:2% auto;
                        width: 100%;
                        margin-bottom: 4%;
                        
                    }
        
                    input[type="button"]
                    {
                        margin: 2% auto;
                        width: 100%;
                    }
            }
            </style>
    </head>
    <body>
        <header>
            <div class='title'>
                <h1><i class="fas fa-chalkboard-teacher"></i> Delete Material Form</h1>
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
            <div class="container">
                <form class="Form" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method = "POST">
                    <br>
                        <div class="row">
                        <div class="id">
                        <div class="col-25">
                            <label for="ID">Material ID:</label>
                        </div>
                        <div class="col-75">
                            <input name="ID" value="<?php echo $_POST['ID'] ?? ''; ?>" type="text" size="30" id="ID" placeholder="Enter the Material ID" required>
                        </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="ChooseMaterial">
                            <div class="col-25">
                                <label for="ChooseMaterial">Material Type:</label>
                            </div>
                            <div class="col-75">
                                <select name="ChooseMaterial" id="ChooseMaterial" required>
                                    <option value="" disabled selected>Select Material Type</option>
                                    <option value="pdf">PDF</option>
                                    <option value="ppt">PPT</option>
                                    <option value="assignments">Assignments</option>
                                    <option value="quiz">Quiz</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="checkemail">
                    <p class = "checkemailmsg <?php if(isset($_SESSION['deletemsg'])) echo "display";?>">
                        <?php 
                        if(isset($_SESSION['deletemsg']))
                            {
                                echo $_SESSION['deletemsg']; 
                            }
                        ?>
                    </p>
                    </div>
                
                    <div class="row">
                        <input name="Submit" type="submit" id="Submit" value="Delete Material">
                        <a href="admin.php"><input name="Admin" type="button" id="Back" value="Back"></a>
                     </div>
                </form>
              </div>
              </main>
              <footer>
                  <div class="Useful-links">
                    <h2>Useful Links</h2>
                    <ul>
                        <li><i class="fas fa-link"></i><a href="" target="_blank">Student Educational Verification</a></li>
                        <li><i class="fas fa-link"></i><a href="" target="_blank">Mumbai University</a></li>
                        <li><i class="fas fa-link"></i><a href="" target="_blank">AICTE</a></li>
                        <li><i class="fas fa-link"></i><a href="" target="_blank">DTE</a></li>
                  </div>
                  <div class="Menu">
                    <h2>Menu</h2>
                    <ul>
                        <li><i class="fas fa-external-link-alt"></i><a href="" target="_blank">Home</a></li>
                        <li><i class="fas fa-external-link-alt"></i><a href="" target="_blank">Mandatory Disclosure</a></li>
                        <li><i class="fas fa-external-link-alt"></i><a href="" target="_blank">German Language Club</a></li>
                        <li><i class="fas fa-external-link-alt"></i><a href="" target="_blank">AICTE FeedBack</a></li>
                        <li><i class="fas fa-external-link-alt"></i><a href="" target="_blank">Fee Proposal (2020-21)</a></li>
                  </div>
                  <div class="Contacts">
                    <h2>Contacts</h2>
                    <ul>
                        <li><i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;K.T. Marg, Vartak College Campus, Vasai Road (W),<br>Dist-Palghar, Vasai, Maharashtra 401202</li>
                        <li><i class="fas fa-tty"></i>&nbsp;&nbsp;0250-233 9486</li>
                        <li><i class="fab fa-facebook-f"></i><a href="" target="_blank">Facebook</a></li>
                        <li><i class="fab fa-linkedin"></i><a href="" target="_blank">Linkedin</a></li>
                        <li><i class="fab fa-youtube"></i><a href="" target="_blank">Youtube</a></li>
                    </ul>
                  </div>
              </footer>
    </body>
</html>