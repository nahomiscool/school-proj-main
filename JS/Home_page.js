

let header = document.getElementById('header-js');
let  diplayhidden = document.querySelector('.profile-img');
let diva = document.querySelector('.dropdown');
let regstrationForm = document.getElementById('registration-form-js');
let studentID = document.getElementById('ID');
let studentFname = document.getElementById('Fname');
let studentLname = document.getElementById('Lname');
let studentMname = document.getElementById('Mname');
let programStatus = document.getElementById('program-status');
let grade = document.getElementById('class-level');
let semester = document.getElementById('semester');
let courseList = document.getElementById('course-list-js');
export let Student;
let count = 0;


diplayhidden.style.cursor = "pointer";
diplayhidden.addEventListener('click', (e) => {
    
    if(count === 0){
        console.log('Dropdown opened');
        diva.style.display = 'block';
        count = 1;
        

    }else if(count === 1){
        console.log('Dropdown closed');
        count = 0;
        diva.style.display = 'none';
    }  
});














    

