<?php
$servername = "10.0.19.74";
$username = "kad08203";
$password = "kad08203";
$dbname = "db_kad08203";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

if(isset($_POST['submit'])){
    $message = '';
    $file1 = $_FILES['fileToUpload1']['name'];
    $file2 = $_FILES['fileToUpload2']['name'];

    $target_dir = "../uploads/";
    $target_file1 = $target_dir . basename($file1);
    $target_file2 = $target_dir . basename($file2);
    
    $FileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $FileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

    $check1 = getimagesize($_FILES['fileToUpload1']['tmp_name']);
    $check2 = getimagesize($_FILES['fileToUpload2']['tmp_name']);

    $allowed_extensions = array("jpg", "jpeg", "pdf", "png");
    if($check1 == false || $check2 == false){
        $message = "This file format is not allowed";
    }
    elseif ($_FILES["fileToUpload1"]["size"] > 102400 || $_FILES["fileToUpload2"]["size"] > 102400){
        $message = "The size is too large";
    }
    elseif(file_exists($target_file1) || file_exists($target_file2)){
        $message = "The file already exists";
    }
    elseif(!in_array($FileType1, $allowed_extensions) || !in_array($FileType2, $allowed_extensions)){
        $message = "Invalid format";
    }
    else{
        move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1);
        move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);

        // Using prepared statement to prevent SQL injection
        $sql = "INSERT INTO testinguploads (tax, payslip) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $target_file1, $target_file2);
        
        if ($stmt->execute()) {
            $message = "Files uploaded successfully";
        } else {
            $message = "Error uploading files: " . $stmt->error;
        }
        $stmt->close();
    }
    echo "$message";
}

$conn->close();
?>
