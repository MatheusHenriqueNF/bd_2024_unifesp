$(document).ready(function(){
    $('#mobile_btn').on('click', function(){
        $('#mobile_menu').toggleClass('active');
        $('#mobile_btn').find('i').toggleClass('fa-x');
    });
});

function aparecerTexto() {
    document.getElementById("div1").innerHTML = "jdsiohdhuffffffffffffffffffffffffffffffffffffffffffffffffff";
  }
  function reset() {
    document.getElementById("div1").innerHTML = "";
  }