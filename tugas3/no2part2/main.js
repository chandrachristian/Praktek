const hitung = (operator) => {
  const num1 = parseFloat(document.getElementById("num1").value);
  const num2 = parseFloat(document.getElementById("num2").value);
  let hasil;

  switch (operator) {
    case "+":
      hasil = num1 + num2;
      break;
    case "-":
      hasil = num1 - num2;
      break;
    case "*":
      hasil = num1 * num2;
      break;
    case "/":
      hasil = num1 / num2;
      break;
    case "%":
      hasil = num1 % num2;
      break;
    default:
      hasil = "Operator tidak dikenal";
  }

  document.getElementById("hasil").innerHTML = `Hasil: ${hasil}`;
};
