let table = document.getElementById('table-cont-js'); 
let choise = document.getElementById('course_select');
let grade = document.getElementById('selectedCourseData');
let bar = document.querySelector('.grade_per');

function updateBarColor() {
    let total = parseInt(grade.value);
    
    if(isNaN(total)) return; // Exit if not a number
    
    if(total < 50){
        console.log('Fail');
        bar.style.background = "linear-gradient(45deg, #ff0000 50%, #ffffff 50%)";
    }else if(total >= 50 && total < 65){
        console.log('Pass');
        bar.style.background = "linear-gradient(45deg, #5a3301 65%, #ffffff 35%)";
    }else if(total >= 65 && total < 75){
        console.log('Good');
        bar.style.background = "linear-gradient(45deg, #ffaa00 75%, #ffffff 25%)";
    }else if(total >= 75 && total < 85){
        console.log('Very Good');
        bar.style.background = "linear-gradient(45deg, #c8ff00 85%, #ffffff 15%)";
    }else if(total >= 85 && total < 90){
        console.log('Excellent');
        bar.style.background = "linear-gradient(45deg, #1c7600 90%, #ffffff 10%)";
    }else if(total >=90){
        console.log('Distinction');
        bar.style.background = "linear-gradient(45deg, #3902ff 95%, #ffffff 5%)";
    }
}

// Run on page load
document.addEventListener('DOMContentLoaded', updateBarColor);

// Also run when select changes (but the page will reload anyway due to form submit)
if(choise) {
    choise.addEventListener('change', function() {
        // This will run but page will reload immediately
        updateBarColor();
    });
}