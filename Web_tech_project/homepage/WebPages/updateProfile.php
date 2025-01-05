<?php
 session_start();
 if (isset($_SESSION["usersid"])) {
    $username = $_SESSION["usersid"];
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming $conn is your database connection

    // Sanitize and validate input data
    $applicantEmail = mysqli_real_escape_string($conn, $_POST['studentEmail']);
    $applicantPassword = mysqli_real_escape_string($conn, $_POST['studentPassword']);
    

    // Prepare and execute SQL query to update Prospective_Applicant table
    $query = "UPDATE Prospective_Applicant SET Applicant_Email = ?, Applicant_Password = ? WHERE Applicant_Username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $applicantEmail, $applicantPassword,$username);
    $result = mysqli_stmt_execute($stmt);

    // Check if the query executed successfully
    if ($result) {
        // Redirect to accepted.html
        $x = "Successfully updated details";
        header("Location: updateProfile.php?x=" . urlencode($x));
        exit(); // Make sure to exit after redirecting
    } else {
        echo "Error updating details: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
}
 else {
    // Handle case where session variable is not set
    echo "Session variable 'usersid' not set.";
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
            <a href="studentProfile.php">Home</a>
        </nav>
    </header>
    <div class="container">
        <div class="profile-container">
            <div class="profile-info">
            </div>
            <div class="action-buttons">
                <div class="apps">
                    <h1>Update your profile information</h1><br>
                    <div class="updateDetails">
                    <form method="post" action="">
                        <label for="studentEmail">Update your email:</label>
                        <input type="text" name="studentEmail" id="studentEmail" required>
                        <br><br>
                        <label for="studentPassword">Update password:</label>
                        <input type="password" name="studentPassword" id="studentPassword" required>
                        <br><br>
                        <button type="submit" style="background-color: lightblue;">Submit</button>
                    </form>
                    <?php 
                // Check if $x is set in the query parameters
                if (isset($_GET['x'])) {
                    echo $_GET['x']; // Echo the value of $x if it's set in the query parameters
                }
                ?>
                </div>
                </div>
                <br>
            </div>
          
        </div>
    </div>
   
</body>
</html>

