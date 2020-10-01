function addComment() {

var ReqXHR = new XMLHttpRequest();
ReqXHR.onreadystatechange = function () {
     if (this.status == 200 && this.readyState == 4) {
          var div = document.getElementById("httpRequest");
          div.innerHTML = this.responseText;
     }
}

ReqXHR.open("POST", "index.php?action=addComment&id=" + this.dataset.id);
var comment = {
     comment : document.getElementById('comment').value
}
ReqXHR.setRequestHeader("Content-Type", "application/json")
ReqXHR.send(JSON.stringify(comment));
}

var button = document.getElementById('sendComment');

button.addEventListener('click', addComment);

