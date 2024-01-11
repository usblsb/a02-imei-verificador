function luhnCheck(imei) {
  let sum = 0;
  let isSecond = false;

  for (let i = imei.length - 1; i >= 0; i--) {
    let digit = parseInt(imei[i]);

    if (isSecond) {
      digit *= 2;
      if (digit > 9) {
        digit -= 9;
      }
    }

    sum += digit;
    isSecond = !isSecond;
  }

  return sum % 10 === 0;
}

function sanitizeInput(input) {
  return input.replace(/[^0-9]/g, '');
}

function validarIMEI() {
  const imeiInput = document.getElementById("imei");
  const imei = sanitizeInput(imeiInput.value);
  imeiInput.value = imei;
  const result = document.getElementById("result");

  if (imei.match(/^\d{15}$/) && luhnCheck(imei)) {
    result.innerHTML = "IMEI válido";
  } else {
    result.innerHTML = "IMEI no válido";
  }
}
