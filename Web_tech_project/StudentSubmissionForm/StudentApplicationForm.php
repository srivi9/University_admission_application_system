<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Application</title>
    <link rel="stylesheet" href="../StudentSubmissionForm/StyleSheets/form.css"/>
</head>
<body>
    <div class="form-container">
        <form method="post" action="StudentSubmissionValidator.php" enctype="multipart/form-data">
        <main>
            <div class="div1"> 
                <div class="img-container">
                    <img src="../StudentSubmissionForm/Images/download (1).png" alt="Student Image" />
                </div>
                <h3 id="info">Personal Information</h3>
                <ol>
                    <li id="num">1</li>
                </ol>
            </div>
            <div class="div2">
                <!--PERSONAL DETAILS-->
                <section id="sec1" class="fade-in">
                    <div class="label-container">
                        <label for="fname">First Name:
                            <input type="text" name="fname">
                        </label>
                        <label for="sname">Surname:
                            <input type="text" name="sname">
                        </label>
                    </div>
            
                <div class="label-container">
                    <label for="onames">Other Names:
                        <input type="text" name="onames">
                    </label><br>
            
                    <label for="email">Email:
                        <input type="email" name="email">
                    </label><br>
                </div>
            
                    <div class="label-container">
                        <label for="telPhone">TelNumber:
                            <input type="number" name="telPhone">
                        </label><br>
                
                        <label for="phone">Phone Number:
                            <input type="number" name="phone">
                        </label><br>
                    </div>
            
                <div class="label-container">
                    <label for="nationality">Nationality:
                        <input type="text" name="nationality">
                    </label><br>
                    <label for="pass/omang">Passport/Omang Number:
                        <input type="text" name="pass/omang">
                    </label><br>
                </div>
            
                <div class="label-container">
                    <label for="dob">Date of Birth:
                        <input type="date" name="dob">
                    </label><br>
                    <label for="marital">Marital Status:<br>
                        <select name="marital">
                            <option value="">Select</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </label><br>
                </div>
            
                    <div class="label-container">
                        <label for="gender">Gender:<br>
                            <select name="gender">
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </label><br>
                
                        <label for="gender">Title:<br>
                            <select name="title">
                                <option value="">Select</option>
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                                <option value="other">Others</option>
                            </select>
                        </label><br>
                    </div>
            
                    <label for="address">Address:
                        <input type="text" name="address" class="address"> 
                    </label><br>
            
                    <label for="address2">Address 2(optional):
                        <input type="text" name="address2" class="address"> 
                    </label><br>
            
                
                    <label><strong>For International Applicants ONLY:</strong> Are you or your parents/guardian resident in Botswana 
                        <select name="resident">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </label><br>
                    <button type="button" onclick="nextSection('sec1', 'sec2')">Next</button>
                </section>

                <!--DISABILITY DETAILS-->
                <section id="sec2" class="hide-section">
                    <label for="isDisable">Any Disabilities?<br>
                        <select name="isDisable">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <p>If 'Yes' please state the nature of your disability</p> <input type="text" name="disability"/>
                    </label><br>
                    <button type="button" onclick="prevSection('sec2', 'sec1')">Previous</button>
                    <button type="button" onclick="nextSection('sec2', 'sec3')">Next</button>
                </section>

                <!--KIN-->
                <section id="sec3">
                    <div class="label-container">
                        <label for="fname">First Name:
                            <input type="text" name="kname">
                        </label><br>
                
                        <label for="sname">Surname:
                            <input type="text" name="ksname">
                        </label><br>
                    </div>
            
                <div class="label-container">
                        <label for="onames">Other Names:
                            <input type="text" name="oknames">
                        </label><br>
                
                        <label for="email">Email:
                            <input type="email" name="kemail">
                        </label><br>
                </div>

                <div class="label-container">
                        <label for="telPhone">TelNumber:
                            <input type="number" name="ktelPhone">
                        </label><br>
                
                        <label for="phone">Phone Number:
                            <input type="number" name="kphone">
                        </label><br>
                </div>

                <div class="label-container">
                        <label for="gender">Gender:<br>
                            <select name="kgender">
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </label><br>
                
                        <label for="gender">Title:<br>
                            <select name="ktitle">
                                <option value="">Select</option>
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                                <option value="other">Others</option>
                            </select>
                        </label><br>
                </div>
                
                    <label for="nationality">Nationality:
                        <input type="text" name="knationality">
                    </label><br>

                    <label for="address">Address:
                        <input type="text" name="kaddress"> 
                    </label><br>
            
                    <label for="address2">Address 2(optional):
                        <input type="text" name="kaddress2"> 
                    </label><br>
            
                    <button type="button" onclick="prevSection('sec3', 'sec2')">Previous</button>
                    <button type="button" onclick="nextSection('sec3', 'sec4')">Next</button>
                </section>

                <!--PROGRAMMES OF STUDY -->
                <section id="sec4">
                    <label for="">
                        <p>SELECT TWO PROGRAMMES OF STUDY AT THIS UNIVERSITY IN ORDER OF PREFERENCE</p>
                        <ol>
                            <li>First choice<input type="text" name="firstchoice"/></li>
                            <li>Second choice<input type="text" name="secondchoice"/></li>
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
                            <li>Parent Tax Cerfificate
                                <label for="file-upload" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File
                                    <span id="fileName"></span>
                                    <input id="file-upload" type="file" style="display: none;" name="tax">
                                </label>
                            <li>Parent Payslip
                                <label for="file-upload1" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File, <br>
                                    <span id="fileName1"></span>
                                    <input id="file-upload1" type="file" style="display: none;" name="payslip">
                                </label>                        </li>
                            <li>Parent Resident Permit
                                <label for="file-upload2" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File
                                    <span id="fileName2"></span>
                                    <input id="file-upload2" type="file" style="display: none;" name="residentpermit">
                                </label>                        
                            </li>
                        </ol>
                    </label>
                    <button type="button" onclick="prevSection('sec5', 'sec4')">Previous</button>
                    <button type="button" onclick="nextSection('sec5', 'sec6')">Next</button>
                </section>

                <!--DOCUMENTATION/CERTIFCATIONS-->
                <section id="sec6">
                    <label>REQUIRED DOCUMENTS<br>
                        <ol>
                            <li>Application Fee receipt<br>
                                <label for="file-upload3" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File
                                    <span id="fileName3"></span>
                                    <input id="file-upload3" type="file" style="display: none;" name="fee">
                                </label>                         </li>
                            <li>A certified copy of the National Identity Card/Passport (Omang for citizens)<br>
                                <label for="file-upload4" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File
                                    <span id="fileName4"></span>
                                    <input id="file-upload4" type="file" style="display: none;" name="identity">
                                </label>                         </li>
                            
                            <li>
                                Certified copies of the following: Senior Secondary
                                School certificate, Post School certificate &
                                Transcript<br>
                                <label for="file-upload5" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File
                                    <span id="fileName5"></span>
                                    <input id="file-upload5" type="file" style="display: none;" name="certificate">
                                </label>                         
                            </li>

                            <li>
                                Copy of proof of change of names(If it has been changed before)<br>
                                <label for="file-upload6" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File
                                    <span id="fileName6"></span>
                                    <input id="file-upload6" type="file" style="display: none;" name="namechange">
                                </label>                         </li>
                            <li>
                                Certfied copy of Registration Certificate/card or
                                Nursing Licence<br>
                                <label for="file-upload7" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File
                                    <span id="fileName7"></span>
                                    <input id="file-upload7" type="file" style="display: none;" name="licence">
                                </label>                         </li>

                            <li>
                                Certified copy of Statement of results (from Examining Council/Body)<br>
                                <label for="file-upload8" class="custom-file-upload">
                                    <i class="fas fa-upload"></i> Choose File
                                    <span id="fileName8"></span>
                                    <input id="file-upload8" type="file" style="display: none;" name="results">
                                </label>                         </li>
                        </ol>
                        
                        <p>NOTE: The original statement of results is required for foreign qualifications</p>
                    </label>
                    <button type="button" onclick="prevSection('sec6', 'sec5')">Previous</button>
                    <button type="button" onclick="nextSection('sec6', 'sec7')">Next</button>
                </section>

                <!--GRADES-->
                <section id="sec7">
                    <div class="label-container">
                        <label for="setswana">Setswana:
                            <input type="number" name="setswana">
                        </label>
                        <label for="math">Math:
                            <input type="number" name="math">
                        </label>
                    </div>
                    <div class="label-container">
                        <label for="english">English:
                            <input type="number" name="english">
                        </label>
                        <label for="physics">Physics:
                            <input type="number" name="physics">
                        </label>
                    </div>
                    <div class="label-container">
                        <label for="biology">Biology:
                            <input type="number" name="biology">
                        </label>
                        <label for="chemistry">Chemistry:
                            <input type="number" name="chemistry">
                        </label>
                    </div>
                    <div class="label-container">
                        <label for="geography">Geography:
                            <input type="number" name="geography">
                        </label>
                        <label for="devstudies">Devstudies:
                            <input type="number" name="devstudies">
                        </label>
                    </div>
                    <div class="label-container">
                        <label for="comstudies">Comstudies:
                            <input type="number" name="comstudies">
                        </label>
                        <label for="commerce">Commerce:
                            <input type="number" name="commerce">
                        </label>
                    </div>
                    <label for="points">Points:
                        <input type="number" name="points">
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

                <section id="sec9">
                    <button type="button" onclick="prevSection('sec9', 'sec8')">Previous</button>
                    <input type="submit" value="Submit"/>
                    
                </section>
            </div>
        </main>
        </form>
    </div>
    <script src="../StudentSubmissionForm/Javascript/form.js"></script>
</body>
</html>