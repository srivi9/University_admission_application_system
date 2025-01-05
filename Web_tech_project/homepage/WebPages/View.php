<?php
// Check if the form is submitted and the delete_application button is clicked
//if (isset($_POST['view_application'])) {
    session_start();
    //$applicant_id2=$_SESSION["App_ID"];
    $servername="10.0.19.74";
    $username="kad08203";
    $password="kad08203";
    $dbname = "db_kad08203";
    //Connecting to the Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the Applicant ID from the form
    //$applicant_id2 = $_POST['applicant_id2'];
    // Get the Applicant ID from the form
    $applicant_id2 = intval($_POST['applicant_id2']); // Convert to integer once
    //$theid = $_POST['applicant_id2'];

// Construct the SQL query
    $sql = "SELECT * FROM Prospective_Applicant_Details WHERE Applicant_ID = $applicant_id2";
    $sql2 = "SELECT * FROM Next_Of_Kin WHERE Applicant_ID = $applicant_id2";
    //$theid = trim($theid);

    // Prepare the SQL statement with a parameter placeholder
$sql3 = "SELECT * FROM Prospective_Applicant_Documents WHERE Applicant_ID = $applicant_id2";

// Debugging: Print SQL queries


    $result= $conn->query($sql);
    $result2= $conn->query($sql2);
    $result3= $conn->query($sql3);


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
   

    if($result->num_rows>0){
        $row=$result->fetch_assoc();

        $form_firstname = $row["Applicant_First_Name"];
        $form_surname = $row["Applicant_Surname"];
        $form_othernames = $row["Applicant_Other_Names"];
        $form_email = $row["Applicant_Email"];
        $form_telnumber = $row["Applicant_Tel_Number"];
        $form_phonenumber = $row["Applicant_Phone_Number"];
        $form_nationality = $row["Applicant_Nationality"];
        $form_ID = $row["Applicant_Passport_Omang"];//omang
        $form_dob = $row["Applicant_DOB"];
        $form_maritalstatus = $row["Applicant_Marital_Status"];
        $form_gender = $row["Applicant_Gender"];
        $form_title = $row["Applicant_Title"];
        $form_address = $row["Applicant_Address"];
        $form_second_address = $row["Applicant_Second_Address"];
        $form_residency_status = $row["Applicant_Residency_Status"];
        $form_disability_nature=$row["Applicant_Disability_Nature"];
        $form_disability_status=$row["Applicant_Disability_Status"];
        $form_first_choice = $row["Applicant_First_Choice"];
        $form_second_choice = $row["Applicant_Second_Choice"];

        //Grades
        $form_setswana = $row["Applicant_Setswana_Mark"];
        $form_math = $row["Applicant_Math_Mark"];
        $form_english = $row["Applicant_Eng_Mark"];
        $form_physics = $row["Applicant_Phy_Mark"];
        $form_biology = $row["Applicant_Bio_Mark"];
        $form_chemistry = $row["Applicant_Chem_Mark"];
        $form_geography = $row["Applicant_Geo_Mark"];
        $form_development_studies = $row["Applicant_DevStudies_Mark"];
        $form_computer_studies = $row["Applicant_CompStudies_Mark"];
        $form_commerce = $row["Applicant_Commerce_Mark"];
        $form_points = $row["Applicant_Points"];
    }
    if($result2->num_rows>0){
        $row=$result2->fetch_assoc();

        $form_nok_firstname = $row["NOK_First_Name"];
        $form_nok_surname =  $row["NOK_Surname"];
        $form_nok_othernames = row["NOK_Other_Names"];
        $form_nok_email = $row["NOK_Email"];
        $form_nok_telnumber =  $row["NOK_Tel_Number"];
        $form_nok_phonenumber = $row["NOK_Phone_Number"];
        $form_nok_gender = $row["NOK_Gender"];
        $form_nok_title = $row["NOK_Title"];
        $form_nok_nationality = $row["NOK_Nationality"];
        $form_nok_address =  $row["NOK_Address"];
        $form_nok_second_address = $row["NOK_Second_Address"];
    }

   

    // Function to initiate file download
function downloadFile($filePath) {
    if (!empty($filePath) && file_exists($filePath)) {
        echo"$filePath";
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
}if (isset($_GET['download_permit']) && $_GET['download_permit'] === 'true') {
    downloadFile($filepath_residentpermit);
}if (isset($_GET['download_fee']) && $_GET['download_fee'] === 'true') {
    downloadFile($filepath_feereceipt);
}if (isset($_GET['download_identity']) && $_GET['download_identity'] === 'true') {
    downloadFile($filepath_id);
}if (isset($_GET['download_certificate']) && $_GET['download_certificate'] === 'true') {
    downloadFile($filepath_transcript);
}if (isset($_GET['download_name']) && $_GET['download_name'] === 'true') {
    downloadFile($filepath_name);
}if (isset($_GET['download_licence']) && $_GET['download_licence'] === 'true') {
    downloadFile($filepath_register);
}if (isset($_GET['download_results']) && $_GET['download_results'] === 'true') {
    downloadFile($filepath_results);
}



    // Close the database connection
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <!-- <link rel="stylesheet" href="../Stylesheets/ViewingApplicationForms.css"/> -->
    <link rel="stylesheet" href="../Stylesheets/form.css"/> 
</head>
<body>

<div id="myModal" class="modal">
        <div class="modal-content">
            <form action="">
                <main>
                  <div class="div2">
                    <span class="close">&times;</span>
                      <!--PERSONAL DETAILS-->
                      <section id="sec1" class="fade-in">
                          <div class="label-container">
                              <label for="fname">First Name:
                                  <input id="fnaame" type="text" name="fname" value="<?php echo $form_firstname?>" readonly>
                              </label>
                              <label for="sname">Surname:
                                  <input type="text" name="sname" value="<?php echo $form_surname?>" readonly>
                              </label>
                          </div>
                  
                         <div class="label-container">
                          <label for="onames">Other Names:
                              <input type="text" name="onames" value="<?php echo $form_othernames?>"readonly>
                          </label><br>
                  
                          <label for="email">Email:
                              <input type="email" name="email" value="<?php echo $form_email?>"readonly>
                          </label><br>
                         </div>
                  
                          <div class="label-container">
                              <label for="telPhone">TelNumber:
                                  <input type="number" name="telPhone" value="<?php echo $form_telnumber?>"readonly>
                              </label><br>
                      
                              <label for="phone">Phone Number:
                                  <input type="number" name="phone" value="<?php echo $form_phonenumber?>"readonly>
                              </label><br>
                          </div>
                  
                         <div class="label-container">
                          <label for="nationality">Nationality:
                              <input type="text" name="nationality" value="<?php echo $form_nationality?>"readonly>
                          </label><br>
                          <label for="pass/omang">Passport/Omang Number:
                              <input type="text" name="pass/omang" value="<?php echo $form_ID?>"readonly>
                          </label><br>
                         </div>
                  
                        <div class="label-container">
                          <label for="dob">Date of Birth:
                              <input type="date" name="dob" value="<?php echo $form_dob?>"readonly>
                          </label><br>
                          <label for="marital">Marital Status:<br>
                              <input name="marital" value="<?php echo $form_maritalstatus?>"readonly>
                                  
                          </label><br>
                        </div>
                  
                          <div class="label-container">
                              <label for="gender">Gender:<br>
                                  <input name="gender" value="<?php echo $form_gender?>"readonly>
                                  
                              </label><br>
                      
                              <label for="gender">Title:<br>
                                  <input name="title" value="<?php echo $form_title?>"readonly>
                                      
                                  
                              </label><br>
                          </div>
                  
                          <label for="address">Address:
                              <input type="text" name="address" class="address" value="<?php echo $form_address?>"readonly> 
                          </label><br>
                  
                          <label for="address2">Address 2(optional):
                              <input type="text" name="address2" class="address" value="<?php echo $form_second_address?>"readonly> 
                          </label><br>
                  
                         
                          <label><strong>For International Applicants ONLY:</strong> Are you or your parents/guardian resident in Botswana 
                              <input name="resident" value="<?php echo $form_residency_status?>"readonly>
                                  
                          </label><br>
                          <button type="button" onclick="nextSection('sec1', 'sec2')">Next</button>
                      </section>
          
                      <!--DISABILITY DETAILS-->
                      <section id="sec2" class="hide-section">
                          <label for="isDisable">Any Disabilities?<br>
                              <input name="isDisable" value="<?php echo $form_disability_status?>"readonly>
                               
                              <p>If 'Yes' please state the nature of your disability</p> <input type="text" name="disability" value="<?php echo $form_disability_nature?>"readonly/>
                          </label><br>
                          <button type="button" onclick="prevSection('sec2', 'sec1')">Previous</button>
                          <button type="button" onclick="nextSection('sec2', 'sec3')">Next</button>
                      </section>
          
                      <!--KIN-->
                      <section id="sec3">
                          <div class="label-container">
                              <label for="fname">First Name:
                                  <input type="text" name="kname" value="<?php echo $form_nok_firstname?>"readonly>
                              </label><br>
                      
                              <label for="sname">Surname:
                                  <input type="text" name="kname" value="<?php echo $form_nok_surname?>"readonly>
                              </label><br>
                          </div>
                  
                        <div class="label-container">
                              <label for="onames">Other Names:
                                  <input type="text" name="oknames" value="<?php echo $form_nok_othernames?>"readonly>
                              </label><br>
                      
                              <label for="email">Email:
                                  <input type="email" name="kemail" value="<?php echo $form_nok_email?>"readonly>
                              </label><br>
                        </div>
          
                         <div class="label-container">
                              <label for="telPhone">TelNumber:
                                  <input type="number" name="ktelPhone" value="<?php echo $form_nok_telnumber?>"readonly>
                              </label><br>
                      
                              <label for="phone">Phone Number:
                                  <input type="number" name="kphone" value="<?php echo $form_nok_phonenumber?>"readonly>
                              </label><br>
                         </div>
          
                         <div class="label-container">
                              <label for="gender">Gender:<br>
                                  <input name="kgender" value="<?php echo $form_nok_gender?>"readonly>
                                      
                              </label><br>
                      
                              <label for="gender">Title:<br>
                                  <input name="ktitle" value="<?php echo $form_nok_title?>"readonly>
                                     
                              </label><br>
                         </div>
                         
                          <label for="nationality">Nationality:
                              <input type="text" name="knationality" value="<?php echo $form_nok_nationality?>"readonly>
                          </label><br>
          
                          <label for="address">Address:
                              <input type="text" name="kaddress" value="<?php echo $form_nok_address?>"readonly> 
                          </label><br>
                  
                          <label for="address2">Address 2(optional):
                              <input type="text" name="kaddress2" value="<?php echo $form_nok_second_address?>"readonly> 
                          </label><br>
                  
                          <button type="button" onclick="prevSection('sec3', 'sec2')">Previous</button>
                          <button type="button" onclick="nextSection('sec3', 'sec4')">Next</button>
                      </section>
          
                      <!--PROGRAMMES OF STUDY -->
                      <section id="sec4">
                          <label for="">
                              <p>SELECT TWO PROGRAMMES OF STUDY AT THIS UNIVERSITY IN ORDER OF PREFERENCE</p>
                              <ol>
                              <li>First choice<input type="text" name="firstchoice" value="<?php echo $form_first_choice?>"readonly/></li>
                              <li>Second choice<input type="text" name="secondchoice" value="<?php echo $form_second_choice?>"readonly/></li>
                              </ol>
                          </label>
                          <button type="button" onclick="prevSection('sec4', 'sec3')">Previous</button>
                          <button type="button" onclick="nextSection('sec4', 'sec5')">Next</button>
                      </section>
          
                      
                      <!--IDENTITY DOCUMENTATION-->
                      <section id="sec5">
                          <label>IDENTITY DOCUMENT<br>
                              <p>If you selected <strong>'Yes'</strong> for you or your parents or guardian being a resident in Botswana, please provide proof of resident status by attaching a Copy of each of the following: Tax certificate, payslip and resident
                                  permit for your parents or guardian 
                              </p>
                              <ol>
                              <li><a href="?download_tax=true">Tax</a></li>
                              <li><a href="?download_pay=true">Payslip</a></li>
                              <li><a href="?download_permit=true">Resident Permit</a></li>
                              </ol>
                          </label>
                          <button type="button" onclick="prevSection('sec5', 'sec4')">Previous</button>
                          <button type="button" onclick="nextSection('sec5', 'sec6')">Next</button>
                      </section>
          
                      <!--DOCUMENTATION/CERTIFCATIONS-->
                      <section id="sec6">
                          <label>REQUIRED DOCUMENTS<br>
                            <ol>
                            <li><a href="?download_fee=true">Application Fee receipt</a></li>
                            <li><a href="?download_identity=true">National Identity Card</a></li>
                            <li><a href="?download_certificate=true">Certificates</a></li>
                            <li><a href="?download_name=true">Name Change</a></li>
                            <li><a href="?download_licence=true">Licence</a></li>
                            <li><a href="?download_results=true">Results</a></li>
                          </ol>                            
                          <button type="button" onclick="prevSection('sec6', 'sec5')">Previous</button>
                          <button type="button" onclick="nextSection('sec6', 'sec7')">Next</button>
                      </section>
                  <!--GRADES-->
                <section id="sec7">
                    <div class="label-container">
                        <label for="setswana">Setswana:
                            <input type="number" name="setswana" value="<?php echo $form_setswana?>" readonly>
                        </label>
                        <label for="math">Math:
                            <input type="number" name="math" value="<?php echo $form_math?>" readonly>
                        </label>
                    </div>
                    <div class="label-container">
                        <label for="english">English:
                            <input type="number" name="english" value="<?php echo $form_english?>" readonly>
                        </label>
                        <label for="physics">Physics:
                            <input type="number" name="physics" value="<?php echo $form_physics?>" readonly>
                        </label>
                    </div>
                    <div class="label-container">
                        <label for="biology">Biology:
                            <input type="number" name="biology" value="<?php echo $form_biology?>" readonly>
                        </label>
                        <label for="chemistry">Chemistry:
                            <input type="number" name="chemistry" value="<?php echo $form_chemistry?>" readonly>
                        </label>
                    </div>
                    <div class="label-container">
                        <label for="geography">Geography:
                            <input type="number" name="geography" value="<?php echo $form_geography?>" readonly>
                        </label>
                        <label for="devstudies">Devstudies:
                            <input type="number" name="devstudies" value="<?php echo $form_development_studies?>" readonly>
                        </label>
                    </div>
                    <div class="label-container">
                        <label for="comstudies">Comstudies:
                            <input type="number" name="comstudies" value="<?php echo $form_computer_studies?>" readonly>
                        </label>
                        <label for="commerce">Commerce:
                            <input type="number" name="commerce" value="<?php echo $form_commerce?>" readonly>
                        </label>
                    </div>
                    <label for="points">Points:
                        <input type="number" name="points" value="<?php echo $form_points?>" readonly>
                    </label>
                    <button type="button" onclick="prevSection('sec7', 'sec6')">Previous</button>
                    <button type="button" onclick="nextSection('sec7', 'sec8')">Next</button>
                </section>
            
                      <!--DECLARATION BY APPLICANT-->
                      <section id="sec8">
                          <p>I declare that:</p>
                          <p> all the information is true and correct to the best of my knowledge and belief. I am aware that the University reserves
                              the right to reject any application and or withdraw and cancel any offer of admission should all or part of the above information be
                              found to be untrue and or incorrect, or if an offer was erroneously made. I agree that if I am accepted at the University I shall be
                              under the disciplinary control of the University authorities and I undertake to acquaint myself with, and to conform to the rules and
                              regulations of the University
                          </p>
                          <input type="checkbox"> I confirm the declaration
                          <button type="button" onclick="prevSection('sec8', 'sec7')">Previous</button>
                          <button type="button" onclick="nextSection('sec8', 'sec9')">Next</button>

                      </section>   
          
                      <section id="sec8">
                          <button type="button" onclick="prevSection('sec9', 'sec8')">Previous</button>
                      </section>
                  </div>
                </main>
              </form>
          
            <div id="modal-form-content"></div>
        </div>
    </div>
    
     <script src="../JavaScript/ViewingApplicationForms.js"></script>
    <script src="../JavaScript/form.js"></script> 

        
</body>
</html>