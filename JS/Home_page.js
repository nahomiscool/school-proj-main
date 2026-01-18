let  diplayhidden = document.querySelector('.profile-img');
let diva = document.querySelector('.dropdown');
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














    

