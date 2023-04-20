function printFibonacci() {
  var number = parseInt(document.getElementById("number").value);
  
  var a = 0, b = 1, c;
  var result = "";
  
  for (var i = 0; i < number; i++) {
    result += a + " ";
    c = a + b;
    a = b;
    b = c;
  }
  
  document.getElementById("result").innerHTML = result;
}
