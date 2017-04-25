describe("Calculator",function(){

  var answer;
  beforeEach(function() {
      answer = new Calculator();
      spyOn(answer, 'addition');
  });
  
  describe("operation in calculator class", function(){

    it("call to addition function", function(){
      answer.addition(6,7);
      expect(answer.addition).toHaveBeenCalled();
      expect(answer.addition).toHaveBeenCalledWith(6,7);
    });
    it("call to subtraction function", function(){
      expect(answer.subtraction(7,7)).toEqual(0);
    });
    it("call to multiplication function", function(){
      expect(answer.multiplication(6,7)).toEqual(42);
    });
    it("call to division function", function(){
      expect(answer.division(35,7)).toEqual(5);
    });
  });
});