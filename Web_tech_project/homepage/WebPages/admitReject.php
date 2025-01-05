<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit or Reject</title>
    <link rel="stylesheet" href="../Stylesheets/studentStyle.css">
</head>
<body>
    <header class="top-nav">
        <img src="../Images/UBLogo.png" alt="logo">
        <nav class="logout-navigation">
            <a href="LandingPage.html">Logout</a>
        </nav>
    </header>
    <div class="container">
        <div class="profile-container"> 
            <div class="reject-container">
            <form action="process.php" method="post">
                <label for="students">Select a student:</label>
                <select name="student" id="cars">
                    <?php
                    session_start();
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

                    // Query to fetch Applicant_ID and Applicant_FirstName from Prospective_Applicant table
                    $sql = "SELECT Applicant_ID, Applicant_First_Name FROM Prospective_Applicant_Details";
                    $result = $conn->query($sql);

                    // Check if there are rows returned
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Concatenate Applicant_ID and Applicant_FirstName as option value
                            $option_value = $row["Applicant_ID"] . " - " . $row["Applicant_First_Name"];
                            // Output each option with concatenated value
                            echo "<option value='" . $option_value . "'>" . $option_value . "</option>";
                        }
                    } else {
                        echo "<option value=''>No applicants found</option>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </select>
                <br><br>
                <button type="submit" class="accept-button" name="action" value="accept">Accept</button>
                <button type="submit" class="reject-button" name="action" value="reject">Reject</button><br><br>
                <span style="color: red;"><?php echo $x; ?></span>

             </form>
            </div>
        </div>
    </div>
</body>
</html>

