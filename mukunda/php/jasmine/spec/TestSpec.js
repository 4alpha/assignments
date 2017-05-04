describe("Test the calculator functoins", function() {
  var calculator;
  var num1;
  var num2;

  beforeEach(function() {
    calculator = new Calculator();
    num1 = 15;
    num2 = 5;

    spyOn(calculator, "subtract").and.returnValue(10);
    
    spyOn(calculator, "add").and.callFake(function() {
      return 20;
    });
    //spyOn(calculator, "add").and.callThrough();
    
 
  });    

  // it("test spy for add function ", function() {
  //   expect(calculator.add).toHaveBeenCalled();
  //   // expect(calculator.subtract).toHaveBeenCalled();
    
  //   expect(calculator.add).toHaveBeenCalledWith(num1, num2);
  //   expect(calculator.add).toHaveBeenCalledTimes(2);
  // });

  it("test spy", function(){
    expect(calculator.subtract(num1, num2)).toEqual(10);
  })
  
  it("test the addition", function() {
    
    expect(calculator.add(num1, num2)).toEqual(20);
   // expect(calculator.add).toHaveBeenCalled();
  });
  
   it("test the subtract function", function() {
    expect(num1).toBeGreaterThan(num2);
    expect(calculator.subtract(num1, num2)).toEqual(10);
  });
    
   it("test the multiplication", function() {
    expect(calculator.multiply(num1, num2)).toEqual(75);
  });

   it("test the divide", function() {
    expect(num2).not.toEqual(0);
    expect(calculator.divide(num1, num2)).toEqual(3);
  });
});