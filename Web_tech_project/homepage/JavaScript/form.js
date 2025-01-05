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
let input = document.getElementById("file-upload");
let imageName = document.getElementById("fileName")

input.addEventListener("change", ()=>{
    let inputImage = document.querySelector("input[type=file]").files[0];

    imageName.innerText = inputImage.name;
})