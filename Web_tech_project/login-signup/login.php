<?php
session_start();
$localhost = "10.0.19.74";
$username = "kad08203";
$password = "kad08203";
$dbname = "db_kad08203";
$conn = new mysqli($localhost, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$_SESSION["usersid"] = "Bob";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$error="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_username = test_input($_POST["username"]);
    $form_password = test_input($_POST["password"]);
    if (preg_match('/^stu[0-9]+$/', $form_username)) {

        // Gets the student information from the users table
        $sql = 'SELECT * FROM Prospective_Applicant';
        $result = mysqli_query($conn, $sql);
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        // Checks if the information from the form matches any records of student usernames and passwords
        foreach ($students as $student) {
            $username = $student['Applicant_Username'];
            $password = $student['Applicant_Password'];
            if (($username == $form_username) and ($password == $form_password)) {
                $_SESSION["usersid"] = $username;

                if (isset($_SESSION["usersid"])) {
                    // Retrieve username from session
                    $username = $_SESSION["usersid"];
                   
                    // Prepare and bind the statement
                    $stmt = $conn->prepare("SELECT Applicant_ID FROM Prospective_Applicant WHERE Applicant_Username = ?");
                    $stmt->bind_param("s", $username);
                    
                    // Execute the statement
                    $stmt->execute();
                    
                    // Bind result variables
                    $stmt->bind_result($app_id);
                    
                    if ($stmt->fetch()) {
                        // fetching statement
                        $_SESSION["App_ID"] = $app_id;
                    } else {
                        echo "Failed to fetch name";
                    }
                    
                    // Close statement and connection
                    $stmt->close();
                    $conn->close();
                }
                // Link to the students web page
                header('location:../homepage/WebPages/studentProfile.php');

                break;
            }
            else{
                $error="The username or password are incorrect";
            }
        }
    } elseif (preg_match('/^admin[0-9]+$/', $form_username)) {

        // Gets the organisation information from the organisations table
        $sql = 'SELECT * FROM Uni_Administrator';
        $result = mysqli_query($conn, $sql);
        $administrators = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);


        foreach ($administrators as $administrator) {
            $username = $administrator['Administrator_Username'];
            $password = $administrator['Administrator_Password'];

            // Checks if the information from the form matches any records of organisation usernames and passwords
            if (($username == $form_username) and ($password == $form_password)) {
                $_SESSION["usersid"] = $username;
                // Link to the organisation web page
                header('location:../homepage/WebPages/administratorProfile.php');
                break;
            }
            else{
                $error="The username or password are incorrect";
            }
        }
    } elseif (preg_match('/^staff[0-9]+$/', $form_username)) {

        // Gets the supervisor/coordinator information from the ub_staff table
        $sql = 'SELECT * FROM Uni_Staff';
        $result = mysqli_query($conn, $sql);
        $staff = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        // Checks if the information from the form matches any records of ub_staff usernames and passwords
        foreach ($staff as $member) {
            $username = $member['Staff_Username'];
            $password = $member['Staff_Password'];

            if (($username == $form_username) and ($password == $form_password)) {
                $_SESSION["usersid"] = $username;
                header('location:../homepage/WebPages/staff.php');
                break;
            }
            else{
                $error="The username or password are incorrect";
            }
        }
    }
    // If there are errors, include the signup page
if (!empty(error)) {
    include 'login-page.html';
}
}
