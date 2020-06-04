const adminbtn = document.querySelector('.admin-btn');
let click = 0 ;
loadEventListener();
function loadEventListener(){
    adminbtn.addEventListener('click', showLogin)
}
    function showLogin(e){
            click++
            if (click == 1){
          document.querySelector('.loginbox').classList.remove('hidden');
            }
          if(click == 2){
        document.querySelector('.loginbox').classList.add('hidden')
        click = 0;
          }
        }