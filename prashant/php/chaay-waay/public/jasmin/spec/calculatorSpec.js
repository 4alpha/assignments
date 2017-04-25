describe("calculator's Spec", function() {
	var num1;
	var num2;
	var calculator;

	beforeEach(function() {
		num1 = 22;
		num2 = 2;
		calculator = new Calculator();
	});

	it("Addition", function() {
		expect(calculator.add(num1, num2)).toEqual(24);
	});

	it("Subtraction", function() {
		expect(calculator.sub(num1,num2)).toBe(20);
	});

	it("Multiplication", function() {
		expect(calculator.mul(num1,num2)).toBe(44);
	});

	it("Division", function() {
		expect(calculator.div(num1,num2)).toBeCloseTo(11, 0);
	});

	afterEach(function() {
		num1 = 0;
		num2 = 0;
		calculator = null;
	});
});