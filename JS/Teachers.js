import { teachersInfo } from "./data.js";
let teacherGrid = document.getElementById('teacher-grid-js');


for(let i = 0; i <teachersInfo.length; i++){
    teacherGrid.innerHTML += `
    <div class="teacher-card" id="teacher-card-js" value = "${ teachersInfo[i].id }" >
        <img  src="${teachersInfo[i].image}" class="teacher-photo"></img>
        <h3>${teachersInfo[i].name}</h3>
        <p>${teachersInfo[i].subject}</p>
        <p class="stars">${ratig(i)}</p>
    </div>`;
}

let body = document.querySelector('body');
let popUp = document.createElement('div');
popUp.id = "popUp-js";

function ratig(i){
    let star = '';
    for(let j = 0; j<teachersInfo[i].stars ; j++){
        star += '⭐';
    }
    return star;
}

teacherGrid.addEventListener('click', function(event){
    let card = event.target.closest('.teacher-card');
    let value = card.getAttribute('value');
    event.preventDefault();
    let i = 0;
    while(value){
        if(value === teachersInfo[i].id){
            console.log(value);
            popUp.innerHTML = `
            <h1 id="close-js">X</h1> 
            <img src="${teachersInfo[i].image}" class="teacher-photo"></img>
            <h2>${teachersInfo[i].name}</h2>
            <h2>${ratig(i)}</h2>
            <p> &#128214 ${teachersInfo[i].subject}</p>
            <p> &#9993  ${teachersInfo[i].Email}</p>
            <p> &#128205  ${teachersInfo[i].officeLocation}</p>
            <p> &#128338  ${teachersInfo[i].officeHoures}</p>
            <p> &#128222  ${teachersInfo[i].phone}</p>
            `;
            break;
        }
        i++; 
    }
    
    body.appendChild(popUp);
    let colse = document.getElementById('close-js');
    colse.addEventListener('click', function(event){
        event.preventDefault();
        body.removeChild(popUp);
    });
});
    
