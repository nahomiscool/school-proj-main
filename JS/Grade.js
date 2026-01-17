import { Course } from "./data.js";
let table = document.getElementById('table-cont-js'); 
let choise = document.getElementById('course-select');
let metadata = document.querySelector('.table_metadata');
let bar = document.querySelector('.grade_per');
choise.addEventListener('change', function() {
    const selectedCourse = Course.find(c => c.id === choise.value);

    if (!selectedCourse){
        return;
    } 

    let total = 0;
    selectedCourse.results.forEach(score => {
        total += score;
    });

    metadata.innerHTML = `
                <h4>Course Title</br><span>${selectedCourse.title}</span> </h4>
                <h4>Course Code</br><span>${selectedCourse.courseCode}</span> </h4>
                <h4>Grade</br><span>${selectedCourse.Grade}</span> </h4>
    `;
    table.innerHTML = `
        <tr>
            <th>Assessment Name</th>
            <th>Assessment Type</th>
            <th>Maximum Mark</th>
            <th>Result</th>
        </tr>
        <tr>
            <td bgcolor="#e0e0e0">Mid Exam</td>
            <td bgcolor="#e0e0e0">Continuous</td>
            <td bgcolor="#e0e0e0">20</td>
            <td bgcolor="#e0e0e0">${selectedCourse.results[0]}</td>
        </tr>
        <tr>
            <td>Assessment</td>
            <td>Continuous</td>
            <td>10</td>
            <td>${selectedCourse.results[1]}</td>
        </tr>
        <tr>
            <td bgcolor="#e0e0e0">Laboratory Assignment</td>
            <td bgcolor="#e0e0e0">Continuous</td>
            <td bgcolor="#e0e0e0">10</td>
            <td bgcolor="#e0e0e0">${selectedCourse.results[2]}</td>
        </tr>
        <tr>
            <td>Project Assignment</td>
            <td>Continuous</td>
            <td>10</td>
            <td>${selectedCourse.results[3]}</td>
        </tr>
        <tr>
            <td bgcolor="#e0e0e0">Final Exam</td>
            <td bgcolor="#e0e0e0">Final</td>
            <td bgcolor="#e0e0e0">50</td>
            <td bgcolor="#e0e0e0">${selectedCourse.results[4]}</td>
        </tr>
        <tr class="total-row">
            <th colspan="2" style="text-align: right;">Total</th>
            <th style="text-align: left;">100</th>
            <th style="text-align: left;">${total}/100</th>
        </tr>
    `;
    
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
});
