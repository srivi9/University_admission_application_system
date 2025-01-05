<?php
session_start();

if (isset($_SESSION["usersid"])) {
    // Retrieve username from session
    $username = $_SESSION["usersid"];
    
    // Fetch user details from the database based on username
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
    $stmt = $conn->prepare("SELECT Administrator_FirstName, Administrator_Email,Administrator_ID FROM Uni_Administrator WHERE Administrator_Username = ?");
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Profile</title>
    <link rel="stylesheet" href="../Stylesheets/administratorStyle.css">
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
                    
                <h2>Welcome <?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : "Unknown"; ?></h2>
                <p><strong>ID:</strong> <?php echo isset($_SESSION["ID"]) ? $_SESSION["ID"] : "Unknown"; ?></p>
                    <p><strong>Name:</strong> <?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : "Unknown"; ?></p>
                    <p><strong>Email:</strong> <?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "Unknown"; ?></p>
                    
                    <br>
                    
                </div>
            </div>
            <div class="action-buttons">
                <div class="apps">
                    <div class="button-contanier">
                        <a href="#"><img src="../Images/rank.jpg" alt="appIcon1" class="app2" ></a>
                        <a href="ApplicantRankings.php"><button class="view-ranking-button">View Ranking Report</button></a>
                    </div>

                    <div class="button-contanier">
                        <a href="#"><img src="../Images/adrej.jpg" alt="appIcon2" class="app2"></a>
                        <a href="admitReject.php"><button class="admit-reject-button" >Admit/Reject</button></a>
                    </div>

                    <div class="button-contanier">
                        <a href="#"><img src="../Images/appform.jpg" alt="appIcon3" class="app3"></a>
                        <a href="adminViewApplicationForm.php"><button class="view-application-button">View Application Forms</button></a>
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
