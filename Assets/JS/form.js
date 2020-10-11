regex = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;



initValidate(); {
     var email = document.getElementById('email').innerHTML;
     if (this.regex.test(email.value)) {
          email = "L 'adresse mail est valide";
          email.style.color = green;
     } else {
          email = " L 'adresse mail n\' est pas valide";
          email.style.color = red;
     }
     return false;
}

var btn = document.getElementById('btnForm');
btn.addEventListener('click', initValidate);