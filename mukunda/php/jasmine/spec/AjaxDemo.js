describe("Mock ajax test suite", function() {
  
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
 
  xhr.open("GET", "demo.php");
  xhr.send();
  expect(jasmine.Ajax.requests.mostRecent().url).toBe('demo.php');
  expect(doneFn).not.toHaveBeenCalled();

  jasmine.Ajax.requests.mostRecent().respondWith({
        "status": 200,
        "contentType": 'text/plain',
        "responseText": 'Getting employee names successfully'
      });
  expect(doneFn).toHaveBeenCalledWith('Getting employee names successfully');   
   });  

});

