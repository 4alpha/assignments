describe("Calculator", function() {
  var calculator;

  beforeEach(function() {
    calculator = new Calculator();
    
  });
  
  it("should be addition of two number", function() {
    
    expect(calculator.addition(20,30)).toBe(50);
   
});

  it("should be addition of two number", function() {
    expect(calculator.substraction(30,20)).not.toEqual(20);
  });

});



describe("mocking ajax", function() {



  describe("suite wide usage", function() {



    beforeEach(function() {
      jasmine.Ajax.install();
    });

afterEach(function() {
      jasmine.Ajax.uninstall();
    });
it("specifying response when you need it", function() {
      var doneFn = jasmine.createSpy("success");
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(args) {
        if (this.readyState == this.DONE) {
          doneFn(this.responseText);
        }
      };
      xhr.open("GET", "/some/cool/url");
      xhr.send();


      expect(jasmine.Ajax.requests.mostRecent().url).toBe('/some/cool/url');
      expect(doneFn).not.toHaveBeenCalled();



      jasmine.Ajax.requests.mostRecent().respondWith({



        "status": 200,



        "contentType": 'text/plain',



        "responseText": 'awesome response'
      });

expect(doneFn).toHaveBeenCalledWith('awesome response');
    });
    it("allows responses to be setup ahead of time", function () {
      var doneFn = jasmine.createSpy("success");

      console.log("before stud req");
      jasmine.Ajax.stubRequest('/another/url').andReturn({
        "status": 200,
        "responseText": 'immediate response'
      });
      console.log("after stud req");



      var xhr = new XMLHttpRequest();
      console.log(xhr.readyState);
      xhr.onreadystatechange = function(args) {
        console.log(this.readyState);
        if (this.readyState == this.DONE) {
          console.log(this.status+"status");
          doneFn(this.responseText);
        }
      };

      xhr.open("GET", "/another/url");
      console.log("request send");
      xhr.send();
      console.log("before expect");
      expect(doneFn).toHaveBeenCalledWith('immediate response');
      console.log("after expect");
    });
  });

it("allows use in a single spec", function() {
    var doneFn = jasmine.createSpy('success');
    jasmine.Ajax.withMock(function() {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(args) {
        if (this.readyState == this.DONE) {
          doneFn(this.responseText);
        }
      };

      xhr.open("GET", "/some/cool/url");
      xhr.send();

      expect(doneFn).not.toHaveBeenCalled();

      jasmine.Ajax.requests.mostRecent().respondWith({
        "status": 200,
        "responseText": 'in spec response'
      });

      expect(doneFn).toHaveBeenCalledWith('in spec response');
    });
  });
});