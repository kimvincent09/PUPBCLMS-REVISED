const indicator = document.querySelector('.studentIndicator2');
const indicator1 = document.querySelector('.studentIndicator1');
const scan = document.querySelector('.scanstudent');
loadEventListener();
function loadEventListener(){
    indicator.addEventListener('click', changeScan)
}
function changeScan(e){
    scan.classList.remove('scanstudent');
    indicator.classList.remove('bookIndicator2')
    indicator1.classList.remove('bookIndicator1')
}
