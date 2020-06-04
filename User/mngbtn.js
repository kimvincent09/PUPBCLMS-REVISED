const student = document.querySelector('.student')
const book = document.querySelector('.book')
let click = 0 ;
loadEventListener();
function loadEventListener(){
    student.addEventListener('click', showStudents)
    book.addEventListener('click', showBooks)
}
    function showStudents(e){
            click++
            if (click == 1){
          document.querySelector('.studtbl').classList.remove('hidden');
          document.querySelector('.bktbl').classList.add('hidden')
            }
          if(click == 2){
        document.querySelector('.studtbl').classList.add('hidden')
        click = 0;
          }
        }
    function showBooks(e){
            click++
            if (click == 1){
          document.querySelector('.bktbl').classList.remove('hidden');
          document.querySelector('.studtbl').classList.add('hidden')
            }
          if(click == 2){
        document.querySelector('.bktbl').classList.add('hidden')
        click = 0;
          }
        }