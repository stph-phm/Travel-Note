var regex = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;



function initValidate(event) {

     var email = document.getElementById('email');
     if (regex.test(email.value)) {

     } else {
          email.title = " L 'adresse mail n\' est pas valide";
          email.style.borderColor = 'red';
          event.preventDefault();
     }
     return false;
}

var btn = document.getElementById('formCheck');
if (btn != null) {
     btn.addEventListener('submit', initValidate);
}
