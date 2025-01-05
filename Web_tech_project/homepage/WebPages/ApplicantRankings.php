<?php
// Connect to your database

$servername ="10.0.19.74"; 
$username = "kad08203"; 
$password = "kad08203"; 
$dbname = "db_kad08203";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from your database
$sql = "SELECT Applicant_ID, Applicant_First_Name, Applicant_Surname, Applicant_Points FROM Prospective_Applicant_Details ORDER BY Applicant_Points DESC";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Stylesheets/ViewingApplicationForms.css"/>
</head>
<body>
    
    <table id="students">
        <caption>Applicant Point Ranking Report</caption>

        <thead>
            <tr>
                <th>Application ID</th>
                <th>Applicant Name</th>
                <th>BGCE Points</th>

            </tr>
        </thead>

         <!--APPLICANT-->
         <tbody>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Applicant_ID"] . "</td>";
                    echo "<td>" . $row["Applicant_First_Name"] ." ". $row["Applicant_Surname"]. "</td>";
                    echo "<td>" . $row["Applicant_Points"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </tbody>
    </table>


    <script src="../JavaScript/ViewingApplicationForms.js"></script>
        
</body>
</html>