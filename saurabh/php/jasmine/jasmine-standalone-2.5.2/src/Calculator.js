function Calculator() {
}

Calculator.prototype.addition = function(number1, number2) {
  return number1 + number2;
}

Calculator.prototype.substraction = function(number1, number2) {
  return number1 - number2;
}

Calculator.prototype.multiplication = function(number1, number2) {
  return number1 * number2;
}

Calculator.prototype.division = function(number1, number2) {
  return number1 / number2;
}

Calculator.prototype.defaultPiValue = function() {
  PI = 3.14;  
  return PI;
}