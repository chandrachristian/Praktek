function cetakBubar() {
  var number = parseInt(document.getElementById("num1").value);
  
  var a = 0, b = 1, c;
  var result = "";
  
  for (var i = 0; i < number; i++) {
    result += a;
    if (i !== number - 1) {
      result += ", ";
    }
    c = a + b;
    a = b;
    b = c;
  }
  
  document.getElementById("hasil").innerHTML = result;
}