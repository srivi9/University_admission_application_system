<?php
session_start();

// Database connection parameters
$db_host = '10.0.19.74';
$db_username = 'kad08203';
$db_password = 'kad08203';
$db_name = 'db_kad08203';

$x="";

// Check if the form was submitted and the required fields are set
if (isset($_POST['student']) && isset($_POST['action'])) {
    // Get the selected student and action
    $selected_student = $_POST['student'];
   
    $action = $_POST['action'];

    // Split the selected value to get the student ID
    $student_id = explode(" - ", $selected_student)[0];

    // Create connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform action based on button clicked
    if ($action === 'accept') {
        // Insert into Admitted_Students table
        $sql = "INSERT INTO Admitted_Students (Applicant_ID) VALUES ('$student_id')";
    } elseif ($action === 'reject') {
        // Insert into Rejected_Students table
        $sql = "INSERT INTO Rejected_Students (Applicant_ID) VALUES ('$student_id')";
    }

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        header("Refresh: 1; URL=successful.html");
        exit();
        header("Location: admitReject.php");
        exit();        
    } else {
        $x="Error: Student decision has already been made ";
    }

    if(!empty($x)){
        include 'admitReject.php';
    }
    // Close connection
    $conn->close();
}
?>
