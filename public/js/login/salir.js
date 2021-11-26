document.addEventListener("DOMContentLoaded", function (event) {
  //we ready baby
  let elem = document.getElementById("btnSalir");
  if (elem) {
    elem.onclick = function () {
      localStorage.setItem("token", "");
      //let url = document.getElementById("url000").value;
      //console.log(url);
    };
  }
});
