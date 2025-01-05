<?php
session_start();
$applicant_id=$_SESSION["App_ID"];
$servername="10.0.19.74";
$username="kad08203";
$password="kad08203";
$dbname = "db_kad08203";
//Connecting to the Database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Function to sanitize data input from users
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //getting input from forms
    //Page 1 Personal Details Database(Prospective_Applicant_Details)
    //Applicant ID will be taken from session
    $form_firstname = test_input($_POST["fname"]);
    $form_surname = test_input($_POST["sname"]);
    $form_othernames = test_input($_POST["onames"]);
    $form_email = test_input($_POST["email"]);
    $form_telnumber = test_input($_POST["telPhone"]);
    $form_phonenumber = test_input($_POST["phone"]);
    $form_nationality = test_input($_POST["nationality"]);
    $form_ID = test_input($_POST["pass/omang"]);//id can either be omang or passport
    $form_dob = test_input($_POST["dob"]);
    $form_maritalstatus = test_input($_POST["marital"]);
    $form_gender = test_input($_POST["gender"]);
    $form_title = test_input($_POST["title"]);
    $form_address = test_input($_POST["address"]);
    $form_second_address = test_input($_POST["address2"]);
    $form_residency_status = test_input($_POST["resident"]);

    //Page2 Disability Information Database(Prospective_Applicant_Details)
    $form_disability_nature=test_input($_POST["disability"]);
    $form_disability_status=test_input($_POST["isDisable"]);

    //Page3 Next of Kin Database(Next_Of_Kin)
    //To enter the Applicant id might need session
    //Applicant ID will be taken from session
    $form_nok_firstname = test_input($_POST["kname"]);
    $form_nok_surname = test_input($_POST["ksname"]);
    $form_nok_othernames = test_input($_POST["oknames"]);
    $form_nok_email = test_input($_POST["kemail"]);
    $form_nok_telnumber = test_input($_POST["ktelPhone"]);
    $form_nok_phonenumber = test_input($_POST["kphone"]);
    $form_nok_gender = test_input($_POST["kgender"]);
    $form_nok_title = test_input($_POST["ktitle"]);
    $form_nok_nationality = test_input($_POST["knationality"]);
    $form_nok_address = test_input($_POST["kaddress"]);
    $form_nok_second_address = test_input($_POST["kaddress2"]);

    //Page 4 Programmes Of study Database(Prospective_Applicant_Details)
    $form_first_choice = test_input($_POST["firstchoice"]);
    $form_second_choice = test_input($_POST["secondchoice"]);

    //Page 5 Student Grades
    $form_setswana = test_input($_POST["setswana"]);
    $form_math = test_input($_POST["math"]);
    $form_english = test_input($_POST["english"]);
    $form_physics = test_input($_POST["physics"]);
    $form_biology = test_input($_POST["biology"]);
    $form_chemistry = test_input($_POST["chemistry"]);
    $form_geography = test_input($_POST["geography"]);
    $form_development_studies = test_input($_POST["devstudies"]);
    $form_computer_studies = test_input($_POST["comstudies"]);
    $form_commerce = test_input($_POST["commerce"]);
    $form_points = test_input($_POST["points"]);

    //File Uploads  
       
    $message = '';
    $file1 = $_FILES['tax']['name'];
    $file2 = $_FILES['payslip']['name'];
    $file3 = $_FILES['residentpermit']['name'];
    $file4 = $_FILES['fee']['name'];
    $file5 = $_FILES['identity']['name'];
    $file6 = $_FILES['certificate']['name'];
    $file7 = $_FILES['namechange']['name'];
    $file8 = $_FILES['licence']['name'];
    $file9 = $_FILES['results']['name'];
    
    // Set the target directory
    $target_dir = "../uploads/";
    
    // Set the target file paths
    $target_file1 = $target_dir . basename($file1);
    $target_file2 = $target_dir . basename($file2);
    $target_file3 = $target_dir . basename($file3);
    $target_file4 = $target_dir . basename($file4);
    $target_file5 = $target_dir . basename($file5);
    $target_file6 = $target_dir . basename($file6);
    $target_file7 = $target_dir . basename($file7);
    $target_file8 = $target_dir . basename($file8);
    $target_file9 = $target_dir . basename($file9);
    
    // Get file extensions
    $FileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $FileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $FileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
    $FileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));
    $FileType5 = strtolower(pathinfo($target_file5, PATHINFO_EXTENSION));
    $FileType6 = strtolower(pathinfo($target_file6, PATHINFO_EXTENSION));
    $FileType7 = strtolower(pathinfo($target_file7, PATHINFO_EXTENSION));
    $FileType8 = strtolower(pathinfo($target_file8, PATHINFO_EXTENSION));
    $FileType9 = strtolower(pathinfo($target_file9, PATHINFO_EXTENSION));
    
    // Check if files are images
    $check1 = getimagesize($_FILES['tax']['tmp_name']);
    $check2 = getimagesize($_FILES['payslip']['tmp_name']);
    $check3 = getimagesize($_FILES['residentpermit']['tmp_name']);
    $check4 = getimagesize($_FILES['fee']['tmp_name']);
    $check5 = getimagesize($_FILES['identity']['tmp_name']);
    $check6 = getimagesize($_FILES['certificate']['tmp_name']);
    $check7 = getimagesize($_FILES['namechange']['tmp_name']);
    $check8 = getimagesize($_FILES['licence']['tmp_name']);
    $check9 = getimagesize($_FILES['results']['tmp_name']);
    
    // Allowed file extensions
    $allowed_extensions = array("jpg", "jpeg", "pdf", "png");
    
    // Check file formats, sizes, and existing files
    if ($check1 == false || $check2 == false || $check3 == false || $check4 == false || $check5 == false || $check6 == false || $check7 == false || $check8 == false || $check9 == false) {
        $message = "One or more files have an invalid format";
    } elseif (!in_array($FileType1, $allowed_extensions) || !in_array($FileType2, $allowed_extensions) || !in_array($FileType3, $allowed_extensions) || !in_array($FileType4, $allowed_extensions) || !in_array($FileType5, $allowed_extensions) || !in_array($FileType6, $allowed_extensions) || !in_array($FileType7, $allowed_extensions) || !in_array($FileType8, $allowed_extensions) || !in_array($FileType9, $allowed_extensions)) {
        $message = "One or more files have an invalid extension";
    } else {
        // Move uploaded files to target directory
        move_uploaded_file($_FILES["tax"]["tmp_name"], $target_file1);
        move_uploaded_file($_FILES["payslip"]["tmp_name"], $target_file2);
        move_uploaded_file($_FILES["residentpermit"]["tmp_name"], $target_file3);
        move_uploaded_file($_FILES["fee"]["tmp_name"], $target_file4);
        move_uploaded_file($_FILES["identity"]["tmp_name"], $target_file5);
        move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file6);
        move_uploaded_file($_FILES["namechange"]["tmp_name"], $target_file7);
        move_uploaded_file($_FILES["licence"]["tmp_name"], $target_file8);
        move_uploaded_file($_FILES["results"]["tmp_name"], $target_file9);
    
       
    
       
    }


//Query to add into Prospective_applicant_Details table
// NOTE I HAVE JUST PUT APPLICANT ID VALUE 6 AS A PLACEHOLDER
$applicant_details= "INSERT INTO Prospective_Applicant_Details (
    Applicant_ID,
    Applicant_First_Name,
    Applicant_Surname,
    Applicant_Other_Names,
    Applicant_Email,
    Applicant_Tel_Number,
    Applicant_Phone_Number,
    Applicant_Nationality,
    Applicant_Passport_Omang,
    Applicant_DOB,
    Applicant_Marital_Status,
    Applicant_gender,
    Applicant_Title,
    Applicant_Address,
    Applicant_Second_Address,
    Applicant_Residency_Status,
    Applicant_Disability_Status,
    Applicant_Disability_Nature,
    Applicant_First_Choice,
    Applicant_Second_Choice,
    Applicant_Setswana_Mark,
    Applicant_Math_Mark,
    Applicant_Eng_Mark,
    Applicant_Phy_Mark,
    Applicant_Bio_Mark,
    Applicant_Chem_Mark,
    Applicant_Geo_Mark,
    Applicant_DevStudies_Mark,
    Applicant_CompStudies_Mark,
    Applicant_Commerce_Mark,
    Applicant_Points
) VALUES (
    '$applicant_id',
    '$form_firstname',
    '$form_surname',
    '$form_othernames',
    '$form_email',
    '$form_telnumber',
    '$form_phonenumber',
    '$form_nationality',
    '$form_ID',
    '$form_dob',
    '$form_maritalstatus',
    '$form_gender',
    '$form_title',
    '$form_address',
    '$form_second_address',
    '$form_residency_status',
    '$form_disability_status',
    '$form_disability_nature',
    '$form_first_choice',
    '$form_second_choice',
    '$form_setswana',
    '$form_math',
    '$form_english',
    '$form_physics',
    '$form_biology',
    '$form_chemistry',
    '$form_geography',
    '$form_development_studies',
    '$form_computer_studies',
    '$form_commerce',
    '$form_points'
)";

//Query to add to next of kin table
//NOTE I USED 11 as a dummy value for applicant id
$next_of_kin="INSERT INTO Next_Of_Kin (
    Applicant_ID,
    NOK_First_Name,
    NOK_Surname,
    NOK_Other_Names,
    NOK_Email,
    NOK_Tel_Number,
    NOK_Phone_Number,
    NOK_Gender,
    NOK_Title,
    NOK_Nationality,
    NOK_Address,
    NOK_Second_Address
) VALUES (
    '$applicant_id',
    '$form_nok_firstname',
    '$form_nok_surname',
    '$form_nok_othernames',
    '$form_nok_email',
    '$form_nok_telnumber',
    '$form_nok_phonenumber',
    '$form_nok_gender',
    '$form_nok_title',
    '$form_nok_nationality',
    '$form_nok_address',
    '$form_nok_second_address'
)";

//query for file uploads
$files = "INSERT INTO Prospective_Applicant_Documents( 
  Applicant_ID,
  Applicant_Parent_Tax_Certificate, 
  Applicant_Parent_Payslip,
  Applicant_Parent_Resident_Permit,
  Applicant_Fee_Receipt,
  Applicant_Certified_ID,
  Applicant_Certified_Transcript,
  Applicant_Name_Change_Proof,
  Applicant_Certified_Registration_Certificate,
  Applicant_Certified_Results) 
VALUES (
  '$applicant_id',
   '$target_file1',
   '$target_file2',
   '$target_file3',
   '$target_file4',
   '$target_file5',
   '$target_file6',
   '$target_file7', 
   '$target_file8',
   '$target_file9'
)";
//Entering the Student Details into Database
if ($conn->query($applicant_details) === TRUE) {
  if ($conn->query($next_of_kin) === TRUE) {
      if ($conn->query($files) === TRUE) {
        header("Refresh: 1; URL=successful.html");
        exit();
      } else {
        header("Location: failed.html");
      }
  } else {
    header("Location: failed.html");

  }
} else {
  header("Location: failed.html");

}

  $conn->close();
  
}
?>
