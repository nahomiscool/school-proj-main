import { studentInfo } from "./data.js";
import {Student} from "./Home_page.js";

let name = document.getElementById('name-js');
let id = document.getElementById('id-js');
let grade = document.getElementById('grade-js');
let status = document.getElementById('status-js');
let total = document.getElementById('total-js');
let balance = document.getElementById('balance-js');
let dueDate = document.getElementById('dueDate-js');


name.textContent = Student.Fname + " " + Student.Lname;
id.textContent = Student.ID;
grade.textContent = Student.Grade;/*
status.textContent = studentInfo[0].status;
*/
total.textContent = paymentInfo.total;
balance.textContent = paymentInfo.balance;
dueDate.textContent = paymentInfo.dueDate;