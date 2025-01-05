<?php

session_start();
$applicant_id2 = 20240002;
$servername = "10.0.19.74";
$username = "kad08203";
$password = "kad08203";
$dbname = "db_kad08203";
// Connecting to the Database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql3 = "SELECT * FROM Prospective_Applicant_Documents WHERE Applicant_ID=$applicant_id2";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    $row = $result3->fetch_assoc();
    $filepath_tax = "../" . $row["Applicant_Parent_Tax_Certificate"];
    $filepath_payslip = "../" . $row["Applicant_Parent_Payslip"];
    $filepath_residentpermit = "../" . $row["Applicant_Parent_Resident_Permit"];
    $filepath_feereceipt = "../" . $row["Applicant_Fee_Receipt"];
    $filepath_id = "../" . $row["Applicant_Certified_ID"];
    $filepath_transcript = "../" . $row["Applicant_Certified_Transcript"];
    $filepath_name = "../" . $row["Applicant_Name_Change_Proof"];
    $filepath_register = "../" . $row["Applicant_Certified_Registration_Certificate"];
    $filepath_results = "../" . $row["Applicant_Certified_Results"];
}


// Function to initiate file download
function downloadFile($filePath)
{

    if (!empty($filePath) && file_exists($filePath)) {
        echo "$filePath";
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        ob_clean();
        flush();
        readfile($filePath);
        exit;
    } else {
        echo "File not found or invalid file path.";
        exit;
    }
}


// Download the tax document if requested
if (isset($_GET['download_tax']) && $_GET['download_tax'] === 'true') {
    downloadFile($filepath_tax);
}
if (isset($_GET['download_pay']) && $_GET['download_pay'] === 'true') {
    downloadFile($filepath_payslip);
}
if (isset($_GET['download_permit']) && $_GET['download_permit'] === 'true') {
    downloadFile($filepath_residentpermit);
}
if (isset($_GET['download_fee']) && $_GET['download_fee'] === 'true') {
    downloadFile($filepath_feereceipt);
}
if (isset($_GET['download_identity']) && $_GET['download_identity'] === 'true') {
    downloadFile($filepath_id);
}
if (isset($_GET['download_certificate']) && $_GET['download_certificate'] === 'true') {
    downloadFile($filepath_transcript);
}
if (isset($_GET['download_name']) && $_GET['download_name'] === 'true') {
    downloadFile($filepath_name);
}
if (isset($_GET['download_licence']) && $_GET['download_licence'] === 'true') {
    downloadFile($filepath_register);
}
if (isset($_GET['download_results']) && $_GET['download_results'] === 'true') {
    downloadFile($filepath_results);
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<form action="">
    <li><a href="?download_tax=true">Tax</a></li>
    <li><a href="?download_pay=true">Payslip</a></li>
    <li><a href="?download_permit=true">Resident Permit</a></li>
    <li><a href="?download_fee=true">Application Fee receipt</a></li>
    <li><a href="?download_identity=true">National Identity Card</a></li>
    <li><a href="?download_certificate=true">Certificates</a></li>
    <li><a href="?download_name=true">Name Change</a></li>
    <li><a href="?download_licence=true">Licence</a></li>
    <li><a href="?download_results=true">Results</a></li>
</form>

</html>