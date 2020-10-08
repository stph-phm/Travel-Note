regex = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;



initValidate() {
     document.getElementById('email').innerHTML = ;
     if (this.regex.test(document.getElementById(email).value)) {
          document.getElementById('email').innerHTML = "L 'adresse mail est valide";
          document.getElementById('email').style.color = green;
     } else {
          document.getElementById('email').innerHTML = " L 'adresse mail n\' est pas valide";
          document.getElementById('email').style.color = red;
     }
     return false;
}

var btn = document.getElementById('btnForm');
btn.addEventListener('click', initValidate);