const form=document.getElementById('form');
const submit_prof=document.getElementById('submit_prof');
const select=document.getElementById('selection');
/* 
function get_fetch(url)
{
    fetch(url).then(response => response.json().then(data => {
       console.log(data)
    })); 
}
select.addEventListener('change',()=>{
  form.submit();
  get_fetch('http://localhost:8000/lister-prof-mod');
}); */

/* submit_prof.addEventListener('click',(e)=>{
    //e.preventDefault();
    Swal.fire(
        'Enregistrement réussi',
        'You clicked the button!',
        'success'
      )
}) */
$(document).ready( function () {
  $('#test').DataTable();
} );