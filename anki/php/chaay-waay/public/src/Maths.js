MathsDemo = function() {
};

MathsDemo.prototype.addition = function(num1,num2) {
  if(num1 < 0 && num2 < 0) {
    throw new Error("Number must be Positive !!");
  } else {
    return num1 + num2;
  } 
}

MathsDemo.prototype.factorial = function(num1) {
  if(num1 < 0) {
    throw new Error("Number Must be positive !!");
  } else if(num1 == 1){
    return 1;
  } else {
    return num1 * MathsDemo.prototype.factorial(num1-1);
  }
}
