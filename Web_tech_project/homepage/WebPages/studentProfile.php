<?php
session_start();

if (isset($_SESSION["usersid"])) {
    // Retrieve username from session
    $username = $_SESSION["usersid"];
    
    // Fetch user details from the database based on username
    // Replace the database connection code and query with your actual implementation
    $db_host = '10.0.19.74';
    $db_username = 'kad08203';
    $db_password = 'kad08203';
    $db_name = 'db_kad08203';
    
    // Create connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and bind the statement
    $stmt = $conn->prepare("SELECT Applicant_FirstName, Applicant_Email,Applicant_ID FROM Prospective_Applicant WHERE Applicant_Username = ?");
    $stmt->bind_param("s", $username);
    
    // Execute the statement
    $stmt->execute();
    
    // Bind result variables
    $stmt->bind_result($name, $email, $ID);
    
    if ($stmt->fetch()) {
        // Fetching statement
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["ID"]= $ID;
    } else {
        echo "Failed to fetch name and email";
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();

    function checkApplicationStatus() {
        if (isset($_SESSION["ID"])) {
            $student_id = $_SESSION["ID"];
    
            // Database connection parameters
            $db_host = '10.0.19.74';
            $db_username = 'kad08203';
            $db_password = 'kad08203';
            $db_name = 'db_kad08203';
    
            // Create connection
            $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            // Check if the student's ID exists in Admitted_Students or Rejected_Students table
            $admitted_sql = "SELECT * FROM Admitted_Students WHERE Applicant_ID = '$student_id'";
            $rejected_sql = "SELECT * FROM Rejected_Students WHERE Applicant_ID = '$student_id'";
            
            $admitted_result = $conn->query($admitted_sql);
            $rejected_result = $conn->query($rejected_sql);
    
            if ($admitted_result->num_rows > 0) {
                // Redirect to admitted.html
                header("Location: accepted.html");
                exit();
            } elseif ($rejected_result->num_rows > 0) {
                // Redirect to reject.html
                header("Location: rejected.html");
                exit();
            } else {
                // Redirect to examined.html
                header("Location: examined.html");
                exit();
            }
    
            // Close connection
            $conn->close();
        }
    }
}
    
    // Check if the "View Application Status" button is clicked
    if (isset($_POST["view_status"])) {
        checkApplicationStatus();
    
}
elseif(isset($_POST["appsub"])) {
    header("Location:../../StudentSubmissionForm/StudentApplicationForm.php");

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="../Stylesheets/studentStyle.css">
</head>
<body>
    <header class="top-nav">
        <img src="../Images/UBLogo.png" alt="logo">
        <nav class="logout-navigation">
        <a href="../../login-signup/logout.php">Logout</a>
        </nav>
    </header>
    <div class="container">
        <div class="profile-container">
            <div class="profile-info">
                <div class="profile-details">
                    <h2>Welcome, <?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : "Unknown"; ?></h2>
                    <p><strong>ID:</strong> <?php echo isset($_SESSION["ID"]) ? $_SESSION["ID"] : "Unknown"; ?></p>
                    <p><strong>Name:</strong> <?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : "Unknown"; ?></p>
                    <p><strong>Email:</strong> <?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "Unknown"; ?></p>
                    <a href="updateProfile.php"><p>Update Profile Information</p></a>
                </div>
            </div>
            <div class="action-buttons">
                
                <div class="apps">

                    <div class="button-container">
                        <img src="../Images/app.jpg" alt="appIcon1" >
                        <form method="post">
                            <button type="submit" class="view-status-button" name="view_status">View Application Status</button>
                        </form>
                    </div>

                    <div class="button-container">
                        <img src="../Images/app2.jpg" alt="appIcon2" class="app2">
                        <form method="post">
                            <button type="submit" class="submit-application-button" name="appsub">Submit an Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        &copy; 2024 University of Botswana
    </div>
</body>
</html>

