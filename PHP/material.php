<?php
session_start();
if($_SESSION['Loggedin'] == true)
{
    $Subjectname = $_SESSION['Subject_Name'];
    $Department = $_SESSION['Department'];
    $Year = $_SESSION['Year'];
    $Sem = $_SESSION['Sem'];
    $CAY  = $_SESSION['CAY'];
    $topicname = $_SESSION['TopicName'];
    $deadlinetime = $_SESSION['Deadline'];
    $token = $_SESSION['token'];
    $Email = $_SESSION['Email'];

    $conn = mysqli_connect('localhost', 'root', '', 'ip_project');

    if ($conn->connect_error) {
        die("Error in DB connection: " . $conn->connect_errno . " : " . $conn->connect_error);
    }

    if (isset($_POST['AddPDF'])) {
        $a = 0;
        $totalfiles = count($_FILES['PDF']['name']);
        $pdfpath = '../upload/pdf/';
        for ($i = 0; $i < $totalfiles; $i++) {
            $filename = $_FILES['PDF']['name'][$i];

            if (move_uploaded_file($_FILES["PDF"]["tmp_name"][$i], '../upload/pdf/' . $filename)) {
                $insert = "INSERT into pdfmaterials(topicname,file_name,directory,subject_name,department,year,sem,cay,uploaded_on,status,token) values('$topicname', '$filename','$pdfpath$filename', '$Subjectname','$Department','$Year','$Sem','$CAY',now(),1, '$token')";
                if (mysqli_query($conn, $insert)) {
                    $select = "SELECT * FROM pdfmaterials WHERE id = (SELECT MAX(id) FROM pdfmaterials)";
                    $selectrun = mysqli_query($conn, $select);
                    while ($row =  mysqli_fetch_array($selectrun)) {
                        $Id = $row['id'];
                        $Filename = $row['file_name'];
                        $Subjectname = $row['subject_name'];
                        $Uploadedon = $row['uploaded_on'];
                        $Year = $row['year'];
                        $AcademicYear = $row['cay'];
                    }

                    $subject = "PDF for $topicname Submission Receipt";
                    $headers = "From: smmauryatwo@gmail.com";
                    $body = "The Following are the PDF Submission Details for '$topicname': Material '$a': FileName '$Filename';

                            ID = $Id;
                            Filename = $Filename;
                            Subject Name = $Subjectname;
                            Uploaded On = $Uploadedon;
                            Year = $Year;
                            Academic Year = $AcademicYear;";

                    if (mail($Email, $subject, $body, $headers)) 
                    {
                        $a++;
                        //echo "Email successfully sent to $Email...";
                    } else {
                        echo "Email sending failed...";
                    }
                } else {
                    echo 'Error: ' . mysqli_error($conn);
                }
            } else {
                echo 'Error in uploading file - ' . $_FILES['PDF']['name'][$i] . '<br/>';
            }
        }
    }

    if (isset($_POST['DeletePDF'])) {

        $path = "../upload/pdf";
        $totalfiles =  count($_FILES['PDF']['name']);

        for ($i = 0; $i < $totalfiles; $i++) {
            $filename = $_FILES['PDF']['name'][$i];
            $delete = "DELETE FROM `pdfmaterials` WHERE `file_name`= '$filename' AND 'token'= '$token'";
            if (mysqli_query($conn, $delete)) {
                unlink($path . "/" . $filename);
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }

    if (isset($_POST['AddPPT'])) {
        $a = 0;
        $totalfiles = count($_FILES['PPT']['name']);
        $pptpath = '../upload/ppt/';
        for ($i = 0; $i < $totalfiles; $i++) {
            $filename = $_FILES['PPT']['name'][$i];

            if (move_uploaded_file($_FILES["PPT"]["tmp_name"][$i], '../upload/ppt/' . $filename)) {
                $insert = "INSERT into pptmaterials(topicname,file_name, directory, subject_name,department,year,sem,cay,uploaded_on,status,token) values('$topicname', '$filename','$pptpath$filename', '$Subjectname','$Department','$Year','$Sem','$CAY',now(),1,'$token')";
                if (mysqli_query($conn, $insert)) {
                    $select = "SELECT * FROM pptmaterials WHERE id = (SELECT MAX(id) FROM pptmaterials)";
                    $selectrun = mysqli_query($conn, $select);
                    while ($row =  mysqli_fetch_array($selectrun)) {
                        $Id = $row['id'];
                        $Filename = $row['file_name'];
                        $Subjectname = $row['subject_name'];
                        $Uploadedon = $row['uploaded_on'];
                        $Year = $row['year'];
                        $AcademicYear = $row['cay'];
                    }

                    $subject = "PPT Materials for $topicname Submission Receipt";
                    $headers = "From: smmauryatwo@gmail.com";
                    $body = "The Following are the PPT Submission Details for '$topicname': Material '$a': FileName '$Filename';

                        ID = $Id;
                        Filename = $Filename;
                        Subject Name = $Subjectname;
                        Uploaded On = $Uploadedon;
                        Year = $Year;
                        Academic Year = $AcademicYear;";

                    if (mail($Email, $subject, $body, $headers)) {
                        $a++;
                        //echo "Email successfully sent to $Email...";
                    } else {
                        echo "Email sending failed...";
                    }
                } else {
                    echo 'Error: ' . mysqli_error($conn);
                }
            } else {
                echo 'Error in uploading file - ' . $_FILES['PPT']['name'][$i] . '<br/>';
            }
        }
    }

    if (isset($_POST['DeletePPT'])) {
        $path = "../upload/ppt";
        $totalfiles =  count($_FILES['PPT']['name']);

        for ($i = 0; $i < $totalfiles; $i++) {
            $filename = $_FILES['PPT']['name'][$i];
            $delete = "DELETE FROM `pptmaterials` WHERE `file_name`= '$filename' AND 'token'= '$token'";
            if (mysqli_query($conn, $delete)) {
                unlink($path . "/" . $filename);
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }

    if (isset($_POST['AddAssignment'])) {
        $Submission = $_POST['Submission'];
        $totalfiles = count($_FILES['DOCS']['name']);
        $Assignpath = '../upload/assignments/';
        $a = 0;
        for ($i = 0; $i < $totalfiles; $i++) {
            $filename = $_FILES['DOCS']['name'][$i];

            if (move_uploaded_file($_FILES["DOCS"]["tmp_name"][$i], '../upload/assignments/' . $filename)) {
                $insert = "INSERT into assignment(topicname,file_name, directory, submission, subject_name,department,year,sem,cay,uploaded_on,deadline_on,status, token) values('$topicname', '$filename','$Assignpath$filename','$Submission','$Subjectname','$Department','$Year','$Sem','$CAY',now(),'$deadlinetime',1,'$token')";
                if (mysqli_query($conn, $insert)) {
                    $select = "SELECT * FROM assignment WHERE id = (SELECT MAX(id) FROM assignment)";
                    $selectrun = mysqli_query($conn, $select);
                    while ($row =  mysqli_fetch_array($selectrun)) {
                        $Id = $row['id'];
                        $Filename = $row['file_name'];
                        $URL = $row['submission'];
                        $Subjectname = $row['subject_name'];
                        $Uploadedon = $row['uploaded_on'];
                        $Deadline = $row['deadline_on'];
                        $Year = $row['year'];
                        $AcademicYear = $row['cay'];
                    }
                    $subject = "Assignment for $topicname Submission Receipt";
                    $headers = "From: smmauryatwo@gmail.com";
                    $body = "The Following are the Assignment Submission Details for '$topicname': Material '$a': FileName '$Filename';

                            ID = $Id;
                            Filename = $Filename;
                            URL = $URL;
                            Subject Name = $Subjectname;
                            Uploaded On = $Uploadedon;
                            Deadline On = $Deadline;
                            Year = $Year;
                            Academic Year = $AcademicYear;";

                    if (mail($Email, $subject, $body, $headers)) {
                        $a++;
                      //  echo "Email successfully sent to $Email...";
                    } else {
                        echo "Email sending failed...";
                    }
                } else {
                    echo 'Error: ' . mysqli_error($conn);
                }
            } else {
                echo 'Error in uploading file - ' . $_FILES['DOCS']['name'][$i] . '<br/>';
            }
        }
    }

    if (isset($_POST['DeleteAssignment'])) {
        $path = "../upload/assignments";
        $totalfiles =  count($_FILES['DOCS']['name']);
        for ($i = 0; $i < $totalfiles; $i++) {
            $filename = $_FILES['DOCS']['name'][$i];
            $delete = "DELETE FROM `assignment` WHERE `file_name`= '$filename' AND 'token'= '$token' AND 'deadline_on'= '$deadlinetime'";
            if (mysqli_query($conn, $delete)) {
                unlink($path . "/" . $filename);
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }

    if (isset($_POST['AddQuiz'])) {
        $QuizURL = $_POST['Quiz'];
        $insert = "INSERT into quiz(topicname,URL,subject_name,department,year,sem,cay,uploaded_on,deadline_no,status,token) values('$topicname','$QuizURL','$Subjectname','$Department','$Year','$Sem','$CAY',now(),'$deadlinetime',1,'$token')";
        if (mysqli_query($conn, $insert)) {
            $select = "SELECT * FROM quiz WHERE id = (SELECT MAX(id) FROM quiz)";
            $selectrun = mysqli_query($conn, $select);

            while ($row =  mysqli_fetch_array($selectrun)) {
                $subject = "Quiz for $topicname Submission Receipt";
                $body = "The Following are the Quiz Submission Details for $topicname:
        
                        Id = $row[id];
                        Url = $row[URL];
                        Subject Name = $row[subject_name];
                        Uploaded on = $row[uploaded_on];
                        Deadline on = $row[deadline_no];
                        Year = $row[year];
                        Academic Year = $row[cay];
            
                    ";
                $headers = "From: smmauryatwo@gmail.com";

                if (mail($Email, $subject, $body, $headers)) {
                 //   echo "Email successfully sent to $Email...";
                } else {
                    echo "Email sending failed...";
                }
            }
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }

    if (isset($_POST['DeleteQuiz'])) {
        $QuizURL = $_POST['Quiz'];

        $delete = "DELETE FROM `quiz` WHERE `URL` = '$QuizURL' AND 'token'= '$token' AND 'deadline_on'= '$deadlinetime'";
        if (mysqli_query($conn, $delete)) {
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }

    if (isset($_POST['AddVideo'])) {
        $VideoURL = $_POST['Video'];
        $insert = "INSERT into video(topicname,URL,subject_name,department,year,sem,cay,uploaded_on,status,token) values('$topicname','$VideoURL','$Subjectname','$Department','$Year','$Sem','$CAY',now(),1,'$token')";
        if (mysqli_query($conn, $insert)) {
            $select = "SELECT * FROM video WHERE id = (SELECT MAX(id) FROM video)";
            $selectrun = mysqli_query($conn, $select);

            while ($row =  mysqli_fetch_array($selectrun)) {
                $subject = "Video for $topicname Submission Receipt";
                $body = "The Following are the Video Submission Details for $topicname:
        
                        Id = $row[id];
                        Url = $row[URL];
                        Subject Name = $row[subject_name];
                        Uploaded on = $row[uploaded_on];
                        Year = $row[year];
                        Academic Year = $row[cay];
            
                    ";
                $headers = "From: smmauryatwo@gmail.com";

                if (mail($Email, $subject, $body, $headers)) {
                  //  echo "Email successfully sent to $Email...";
                } else {
                    echo "Email sending failed...";
                }
            }
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }

    if (isset($_POST['DeleteVideo'])) {
        $VideoURL = $_POST['Video'];
        $delete = "DELETE FROM `video` WHERE `URL` = '$VideoURL' AND 'token'= '$token'";
        if (mysqli_query($conn, $delete)) {
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
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
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Material Submission Form</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/circle-cropped.png">
    <link rel="stylesheet" href="../css/materialform.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class='title'><i class="fas fa-chalkboard-teacher"></i> Material Submission Form</div>
    </header>
    <main>
    <div class="container">
        <form id="material" class="material" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="PDF_Materials">PDF Materials:</label>
                </div>
                <div class="col-75">
                    <input type="file" name="PDF[]" accept=".pdf" id="PDF_Materials" multiple>
                    <button class="Add_Button" name="AddPDF">Add</button>
                    <button name="DeletePDF" class="Delete_Button">Delete</button>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="PPT_Materials">PPT Materials:</label>
                </div>
                <div class="col-75">
                    <input type="file" name="PPT[]" accept=".pptx" id="PPT_Materials" multiple>
                    <button name="AddPPT" class="Add_Button">Add</button>
                    <button name="DeletePPT" class="Delete_Button">Delete</button>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="Assignments">Assignments (Docs):</label>
                </div>
                <div class="col-75">
                    <input type="file" name="DOCS[]" accept=".docx" id="Assignments" multiple>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="Submission">Assignment Submission URL:</label>
                </div>
                <div class="col-75">
                    <input name="Submission" type="text" size="30" value="<?php echo $_POST['Submission'] ?? ''; ?>" id="Submission" placeholder="Enter the Assignment Submission URL">
                    <button name="AddAssignment" class="Add_Button" style="left: 52.65%;">Add</button>
                    <button name="DeleteAssignment" class="Delete_Button" style="left: 52.7%;">Delete</button> </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="Quiz">Quiz (URL):</label>
                </div>
                <div class="col-75">
                    <input name="Quiz" type="text" size="30" value="<?php echo $_POST['Quiz'] ?? ''; ?>" id="Quiz" placeholder="Enter the Quiz URL">
                    <button name="AddQuiz" class="Add_Quiz">Add</button>
                    <button name="DeleteQuiz" class="Delete_Quiz">Delete</button>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="Video">Video URL:</label>
                </div>
                <div class="col-75">
                    <input name="Video" type="text" size="30" id="Video" value="<?php echo $_POST['Video'] ?? ''; ?>" placeholder="Enter the Video URL">
                    <button name="AddVideo" class="Add_Video">Add</button>
                    <button name="DeleteVideo" class="Delete_Video">Delete</button>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="Publish_Date">Published Date:</label>
                </div>
                <div class="col-75">
                    <input name="publish" type="datetime-local" value="<?php echo $_POST['publish'] ?? ''; ?>" id="Publish_Date" required>
                </div>
            </div>
            <div class="buttons">
                <a href="../html/admin.php"><input name="Back" type="button" id="Back" value="Back"></a>
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
                <li><i class="fas fa-external-link-alt"></i><a href="student.php" target="_blank">Student</a></li>
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
    <script src="https://kit.fontawesome.com/6d617ef3fb.js" crossorigin="anonymous"></script>
</body>

</html>