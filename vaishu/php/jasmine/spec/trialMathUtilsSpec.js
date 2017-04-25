describe("MathUtils", function() {
    var calc;
    var tape;
    beforeEach(function() {
        calci = jasmine.createSpyObj('calci', [ 'positive']);
        calc = new MathUtils();
        spyOn(calc, 'sum');
        calci.positive(8);
        
    });
    describe("when calc is used to peform basic math operations", function(){

        // it("should be able to calculate sum of 3 and 5", function() {
        //     expect(calc.sum(3,5)).toEqual(8);
            
        // });

        it("should be able to calculate sum of 3 and 5", function() {
            calc.sum(3,5);
            expect(calc.sum).toHaveBeenCalled();
            expect(calc.sum).toHaveBeenCalledWith(3,5);
        });

        it("should be able to multiply 10 and 40", function() {
            expect(calc.multiply(10, 40)).toEqual(400);
        });

        it("tracks all the arguments of its calls", function() {
            expect(calci.positive).toHaveBeenCalledWith(8);
        });

        it("check calls count", function() {
            expect(calci.positive.calls.count()).toBe(1);
        });
    });
});