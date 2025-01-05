<?php
// Check if the form is submitted and the delete_application button is clicked
if (isset($_POST['delete_application'])) {
    session_start();
    $applicant_id=$_SESSION["App_ID"];
    $servername="10.0.19.74";
    $username="kad08203";
    $password="kad08203";
    $dbname = "db_kad08203";
    //Connecting to the Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the Applicant ID from the form
    $applicant_id = $_POST['applicant_id'];

    // Delete the applicant details from Prospective_Applicant_Details table
    $delete_query = "DELETE FROM Prospective_Applicant_Details WHERE Applicant_ID = '$applicant_id'";
    $delete_result = mysqli_query($conn, $delete_query);

    // Insert the Applicant ID into the rejectedstudents table
    $insert_query = "INSERT INTO Rejected_Students (Applicant_ID) VALUES ('$applicant_id')";
    $insert_result = mysqli_query($conn, $insert_query);

    // Check if deletion and insertion were successful
    if ($delete_result && $insert_result) {
        echo "Applicant details deleted and Applicant ID stored in Rejected_Students table successfully.";
        header("Location:ViewingApplicationForm.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
