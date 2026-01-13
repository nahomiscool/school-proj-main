import { Course } from "./data.js";

let table = document.getElementById('table-cont-js'); 
let choise = document.getElementById('course-select');

choise.addEventListener('change', function() {
    // 1. Find the data for the selected course ID
    const selectedCourse = Course.find(c => c.id === choise.value);

    // If "Select Course" (0) is picked, don't do anything or clear table
    if (!selectedCourse) return;

    // 2. Calculate the total for THIS specific course
    let total = 0;
    selectedCourse.results.forEach(score => {
        total += score;
    });

    // 3. Update the HTML Table with the specific course results
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
});