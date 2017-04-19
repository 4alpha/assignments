describe("Maths", function(){
  var num1,num2;

  beforeEach(function() {
    Maths = new MathsDemo();
  });

  it("This is for addition of positive integers", function() {
    expect(Maths.addition(10,11)).toEqual(21);
  });

  it("This is for facorial", function() {
    expect(Maths.factorial(5)).toEqual(120);
  });

});