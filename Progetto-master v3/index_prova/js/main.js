$(document).ready(function(){
  var z = document.getElementById("signup_back");
  z.style.display = "none";

  $('#submit').click(function(){
     if($.trim($('#username').val()) == ''){
        alert('VUOTO');
        returnToPreviousPage();
     }
  });
});

function toggleElement(divId) {
    var div = document.getElementById(divId);
    var shadow = document.getElementById("shadow");
    if (div.style.display !== "block" ) {
        div.style.display = "block";
        shadow.style.display = "block";
    } else {
        div.style.display = "none";
        shadow.style.display = "none";
    }
}

function toggleSignUp() {
var x = document.getElementById("signup1");
var y = document.getElementById("signup2");
var z = document.getElementById("signup_back");

if( x.style.display === "none"){
  x.style.display = "block";
  y.style.display = "none";
  z.style.display = "none";
} else{
  x.style.display = "none";
  y.style.display = "block";
  z.style.display = "block";
}

}

function check(input) {
  if (input.value != document.getElementById('password').value) {
    input.setCustomValidity('La password deve coincidere.');
  } else {
    // input is valid -- reset the error message
    input.setCustomValidity('');
    }
}
