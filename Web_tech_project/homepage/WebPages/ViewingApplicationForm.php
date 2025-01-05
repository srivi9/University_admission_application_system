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
$sql = "SELECT Applicant_ID, Applicant_First_Name, Applicant_Surname FROM Prospective_Applicant_Details";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Stylesheets/ViewingApplicationForms.css"/>
    <link rel="stylesheet" href="../Stylesheets/form.css"/>
</head>
<body>
    
<table id="students">
    <caption>Application Applicant(BSC General)</caption>
    <thead>
        <tr>
            <th>Application ID</th>
            <th>Applicant Name</th>
            <th>Check Student Application</th>
            <th>Delete Student Application</th>
        </tr>
    </thead>
    <!--APPLICANT-->
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $var=$row["Applicant_ID"];
                echo "<tr>";
                echo "<td>" . $row["Applicant_ID"] . "</td>";
                echo "<td>" . $row["Applicant_First_Name"] ." ". $row["Applicant_Surname"]. "</td>";
                //echo "<td><button class='button button1'>View</button></td>";
                echo "<td>
                        <form method='post' action='View.php' >
                            <input type='hidden' name='applicant_id2' value=$var>
                            <button type='submit' class='button button1' name='view_application'>View</button>

                        </form>
                      </td>";
                echo "<td>
                        <form method='post' action='delete_application.php'>
                            <input type='hidden' name='applicant_id' value='" . $row["Applicant_ID"] . "'>
                            <button type='submit' class='button button2' name='delete_application'>Delete</button>

                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </tbody>
</table>
        
</body>
</html>