class Main {

slider = new Slider();

}

var ReqXHR = new XMLHttpRequest();
ReqXHR.onreadystatechange = function() {
     if(this.status == 200 && this.readyState == 4) {
          var div = document.getElementById("httpRequest");
          div.innerHTML = this.responseText;
     }
}

ReqXHR.open("GET", "View/Articles/displayArticleView.php");
ReqXHR.send();
