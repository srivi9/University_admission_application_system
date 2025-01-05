<?php
session_start();

if (isset($_SESSION["usersid"])) {
    // Retrieve username from session
    $username = $_SESSION["usersid"];
    // Parameters to connect
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
    $stmt = $conn->prepare("SELECT Staff_FirstName, Staff_Email,Staff_ID FROM Uni_Staff WHERE Staff_Username = ?");
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
    <title>Staff Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins">
    <link rel="stylesheet" href="../Stylesheets/staff.css">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        .top-nav {
            background-color: #ffff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: fadeIn 1s ease;
        }

        .logout-navigation {
            color: black;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background-color: #1a1a2e;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            animation: fadeIn 1s ease;
        }


        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: fadeIn 1s ease;
        }

        .profile-info {
            margin-bottom: 20px;
            animation: fadeIn 1s ease;
        }

        .profile-details p {
            margin-bottom: 5px;
        }

        .navigation a {
            text-decoration: none;
            color: black;
            margin-left: 20px;
        }

      

        .button-container button {
     
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }

        .apps {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            animation: fadeIn 1s ease;
        }

        .apps a {
            margin-right: 20px;
            animation: fadeIn 1s ease;
        }

        .apps img {
            width: 180px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .apps img:hover {
            transform: scale(1.05);
        }

        .footer {
            background-color: #3ba7ff;
            color: black;
            text-align: center;
            padding: 20px 0;
            bottom: 0;
            width: 100%;
            position: fixed;
            left: 0;
            animation: fadeIn 1s ease;
        }
    </style>
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
                    <h2>Welcome, <?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : "Unknown"; ?>,</h2>
                    <p><strong>ID:</strong> <?php echo isset($_SESSION["ID"]) ? $_SESSION["ID"] : "Unknown"; ?></p>
                    <p><strong>Name:</strong> <?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : "Unknown"; ?></p>
                    <p><strong>Email:</strong> <?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "Unknown"; ?></p>
                </div>
            </div>
            <div class="action-buttons">
                <div class="apps">
                    <div class="button-container">
                        <img src="../Images/rank.jpg" alt="appIcon1" class="app2">
                        <a href="ApplicantRankings.php"><button class="view-ranking-button">Generate Ranking Report</button></a>
                    </div>
                    <div class="button-container">
                        <img src="../Images/appform.jpg" alt="appIcon3" class="app3">
                        <a href="ViewingApplicationForm.php" ><button class="view-application-button">View Application Forms</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        &copy; 2024 University of Brilliance
    </div>
</body>

</html>
