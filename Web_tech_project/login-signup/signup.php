<?php
$localhost = "10.0.19.74";
$username = "kad08203";
$password = "kad08203";
$dbname = "db_kad08203";
$conn = new mysqli($localhost, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstname = $surname = $email = $usernameInput = $passwordInput = $confirmPassword = "";
$firstnameErr = $surnameErr = $emailErr = $usernameErr = $passwordErr = $confirmPasswordErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = test_input($_POST["firstname"]);
    if (empty($firstname)) {
        $firstnameErr = "Name is required";
    }

    $surname = test_input($_POST["surname"]);
    if (empty($surname)) {
        $surnameErr = "Surname is required";
    }

    $email = test_input($_POST["email"]);
    if (empty($email)) {
        $emailErr = "Email is required";
    }

    $usernameInput = test_input($_POST["username"]);
    if (empty($usernameInput)) {
        $usernameErr = "Username is required";
    } elseif (!preg_match("/^stu\d{3}$/", $usernameInput)) {
        $usernameErr = "Username must start with 'stu' and end with 3 numbers.";
    }

    $passwordInput = test_input($_POST["password"]);
    if (empty($passwordInput)) {
        $passwordErr = "Password is required";
    } elseif (strlen($passwordInput) < 9 || !preg_match("/\d/", $passwordInput)) {
        $passwordErr = "Password must be at least 9 characters long and contain at least one number.";
    }

    $confirmPassword = test_input($_POST["confirm-pass"]);
    if (empty($confirmPassword)) {
        $confirmPasswordErr = "Confirmation is required";
    } elseif ($passwordInput !== $confirmPassword) {
        $confirmPasswordErr = "Passwords do not match.";
    }

    // If no errors, insert into database
    if (empty($firstnameErr) && empty($surnameErr) && empty($emailErr) && empty($usernameErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $stmt = $conn->prepare("INSERT INTO Prospective_Applicant (Applicant_Email, Applicant_FirstName, Applicant_Surname, Applicant_Username, Applicant_Password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $email, $firstname, $surname, $usernameInput, $passwordInput);
        if ($stmt->execute()) {
            header("Refresh: 1; URL=successful.html");
            exit();
        } else {
            echo "Error: Unable to execute query.";
        }
    }
}

// If there are errors, include the signup page
if (!empty($firstnameErr) || !empty($surnameErr) || !empty($emailErr) || !empty($usernameErr) || !empty($passwordErr) || !empty($confirmPasswordErr)) {
    include 'signup-page.html';
}
