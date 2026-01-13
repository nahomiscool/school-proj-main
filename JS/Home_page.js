import { studentInfo } from "./data.js";
import { displayCourses } from "./data.js";
//import { coursesByGrade } from "./data.js";
import { teachersInfo } from "./data.js";
let header = document.getElementById('header-js');
let div = document.createElement('div');
let logoutButton = document.createElement('button');
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

div.id = "dropDown";
logoutButton.id = "logout_button";
logoutButton.innerHTML = "Logout";
header.appendChild(div);
div.appendChild(logoutButton);


logoutButton.addEventListener('click', function() {
    window.location.href = "login.html";
});

function getStudentInfo(){
    Student = new studentInfo(
        studentID.value,
        studentFname.value,
        studentLname.value,
        studentMname.value,
        programStatus.value,
        grade.value, 
        semester.value 
    );
    console.log(Student.Grade);
    displayCourses(Student);
    console.log(Student);
    
}

function displayOnScreen(){
    let p;
    courseList.innerHTML = "";
    for(let i=0; i<coursesByGrade[Student.Grade].length; i++){
        p = document.createElement('p');
        p.textContent = coursesByGrade[Student.Grade][i].name + " - " + coursesByGrade[Student.Grade][i].code;
        courseList.appendChild(p);
    }
}

//regstrationForm.addEventListener('submit', function(event){
  //  event.preventDefault();
    //getStudentInfo();
    //window.location.href = "Finance.html";

//});

//grade.addEventListener('change', function(){
 //   getStudentInfo();
  //  displayOnScreen();
//});






    

