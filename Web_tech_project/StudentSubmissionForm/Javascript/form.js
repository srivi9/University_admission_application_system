const info = document.getElementById('info');
const num = document.getElementById('num');
function nextSection(currentSectionId, nextSectionId) {
 
    document.getElementById(currentSectionId).style.display = 'none';
   
    document.getElementById(nextSectionId).style.display = 'block';
    const currentSection = document.getElementById(currentSectionId);
    const nextSection = document.getElementById(nextSectionId);

    if (currentSection && nextSection) {
        currentSection.classList.add('hide-section', 'fade-out');
        nextSection.classList.remove('hide-section');
        nextSection.classList.add('fade-in');
    }
    switch (nextSectionId) {
        case 'sec1':
            info.innerText = 'Personal Information';
            num.innerText = '1';
            break;
        case 'sec2':
            info.innerText = 'Disability Information';
            num.innerText = '2';
            break;
        case 'sec3':
            info.innerText = 'Next of Kin Information';
            num.innerText = '3';

            break;
        case 'sec4':
            info.innerText = 'Programmes of Study';
            num.innerText = '4';
            break;
        case 'sec5':
            info.innerText = 'Identity Documentation';            
            num.innerText = '5';
            break;
        case 'sec6':
            info.innerText = 'Required Documents';
            num.innerText = '6';
            break;
        case 'sec7':
            info.innerText = 'Points';
            num.innerText = '7';
            break;
        case 'sec8':
            info.innerText = 'Declaration by Applicant';
            num.innerText = '8';
            break;
            case 'sec9':
                info.innerText = 'Submission';
                num.innerText = '9';
                break;
        default:
            info.innerText = 'Unknown Section';
    }
}
function prevSection(currentSectionId, prevSectionId) {
 
    document.getElementById(currentSectionId).style.display = 'none';
   
    document.getElementById(prevSectionId).style.display = 'block';
    const currentSection = document.getElementById(currentSectionId);
    const prevSection = document.getElementById(prevSectionId);

    if (currentSection && prevSection) {
        currentSection.classList.add('hide-section', 'fade-out');
        prevSection.classList.remove('hide-section');
        prevSection.classList.add('fade-in');
    }
    switch (prevSectionId) {
        case 'sec1':
            info.innerText = 'Personal Information';
            num.innerText = '1';
            break;
        case 'sec2':
            info.innerText = 'Disability Information';
            num.innerText = '2';
            break;
        case 'sec3':
            info.innerText = 'Next of Kin Information';
            num.innerText = '3';

            break;
        case 'sec4':
            info.innerText = 'Programmes of Study';
            num.innerText = '4';
            break;
        case 'sec5':
            info.innerText = 'Identity Documentation';            
            num.innerText = '5';
            break;
        case 'sec6':
            info.innerText = 'Required Documents';
            num.innerText = '6';
            break;
        case 'sec7':
            info.innerText = 'Declaration by Applicant';
            num.innerText = '7';
            break;
        case 'sec8':
            info.innerText = 'Submission';
            num.innerText = '8';
            break;
        default:
            info.innerText = 'Unknown Section';
    }
}



// Get the file input elements
let input = document.getElementById("file-upload");
let input1 = document.getElementById("file-upload1");
let input2 = document.getElementById("file-upload2");

let input3 = document.getElementById("file-upload3");
let input4 = document.getElementById("file-upload4");
let input5 = document.getElementById("file-upload5");

let input6 = document.getElementById("file-upload6");
let input7 = document.getElementById("file-upload7");
let input8 = document.getElementById("file-upload8");



// Get the span elements to display the file names
let imageName = document.getElementById("fileName");
let imageName1 = document.getElementById("fileName1");
let imageName2 = document.getElementById("fileName2");

let imageName3 = document.getElementById("fileName3");
let imageName4 = document.getElementById("fileName4");
let imageName5 = document.getElementById("fileName5");

let imageName6 = document.getElementById("fileName6");
let imageName7 = document.getElementById("fileName7");
let imageName8 = document.getElementById("fileName8");

// Event listener for the first file input
input.addEventListener("change", () => {
    // Check if a file is selected
    if (input.files.length > 0) {
        let inputImage = input.files[0];
        imageName.innerText = inputImage.name;
    }
});

// Event listener for the second file input
input1.addEventListener("change", () => {
    // Check if a file is selected
    if (input1.files.length > 0) {
        let inputImage1 = input1.files[0];
        imageName1.innerText = inputImage1.name;
    }
});

// Event listener for the second file input
input2.addEventListener("change", () => {
    // Check if a file is selected
    if (input2.files.length > 0) {
        let inputImage2 = input2.files[0];
        imageName2.innerText = inputImage2.name;
    }
});


input3.addEventListener("change", () => {
    // Check if a file is selected
    if (input3.files.length > 0) {
        let inputImage3 = input3.files[0];
        imageName3.innerText = inputImage3.name;
    }
});

input4.addEventListener("change", () => {
    // Check if a file is selected
    if (input4.files.length > 0) {
        let inputImage4 = input4.files[0];
        imageName4.innerText = inputImage4.name;
    }
});


input5.addEventListener("change", () => {
    // Check if a file is selected
    if (input5.files.length > 0) {
        let inputImage5 = input5.files[0];
        imageName5.innerText = inputImage5.name;
    }
});

input6.addEventListener("change", () => {
    // Check if a file is selected
    if (input6.files.length > 0) {
        let inputImage6 = input6.files[0];
        imageName6.innerText = inputImage6.name;
    }
});

input7.addEventListener("change", () => {
    // Check if a file is selected
    if (input7.files.length > 0) {
        let inputImage7 = input7.files[0];
        imageName7.innerText = inputImage7.name;
    }
});

input8.addEventListener("change", () => {
    // Check if a file is selected
    if (input8.files.length > 0) {
        let inputImage8 = input8.files[0];
        imageName8.innerText = inputImage8.name;
    }
});
