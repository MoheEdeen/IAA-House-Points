


$(document).ready(function () {
    $('#example').DataTable({
    });
    $('#example2').DataTable();
    $('#example3').DataTable();
});

const btn = document.getElementById('new_user_button');
const hideme = document.getElementById('hideme');
const fname = document.getElementById('floatingFirstName');
const grade = document.getElementById('gradeInput');
const lname = document.getElementById('floatingLastName');



let toggler = 0;
ses = sessionStorage.getItem('logged')
console.log(ses, typeof(ses))

if (toggler===0 && ses != "0"){
        document.getElementById('blur').classList.add('blur');
        toggler = 1;
        document.getElementById('pop').classList.remove('hide');
}else{
    var els = document.querySelectorAll('.disable')
        for (var i = 0; i < els.length; i++) {
            els[i].classList.remove('disable')
   }
}

en.addEventListener('click',(e)=>{
    const pass = document.getElementById('in').value;
    if (pass === 'x903ft'){
        document.getElementById('blur').classList.remove('blur');
        toggle = 0;
        document.getElementById('pop').classList.add('hide');
        var els = document.querySelectorAll('.disable')
        sessionStorage.setItem('logged',0)
        for (var i = 0; i < els.length; i++) {
            els[i].classList.remove('disable')
        }
    }else{
        alert('incorrect passsword')
    }});