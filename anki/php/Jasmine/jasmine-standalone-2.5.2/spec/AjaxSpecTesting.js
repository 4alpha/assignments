// define(['jquery'], function ($) {
describe("Ajax Code Testing", function() {
  
  beforeEach(function() {
      jasmine.Ajax.install();
  });

  afterEach(function() {
      jasmine.Ajax.uninstall();
  });

  it("ajax response when need it", function() {
    var donefn = jasmine.createSpy("success");
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(args) {
      if(this.readyState == this.DONE) {
        donefn(this.responseText);
      }
    };
    xhr.open("GET",'php/werSetDepartment.php');
    xhr.send();
    expect(jasmine.Ajax.requests.mostRecent().url).toBe('php/werSetDepartment.php');
    expect(donefn).not.toHaveBeenCalled();
    jasmine.Ajax.requests.mostRecent().respondWith({
      "status": 200,
      "contentType": 'text/plain',
      "responseText": 'Department names set'
    });
    expect(donefn).toHaveBeenCalledWith('Department names set');
  });

  it("stub request demo", function () {
      var doneFn = jasmine.createSpy("success");
      jasmine.Ajax.stubRequest('/php/SetDepartment.php').andReturn({
        "responseText": 'getting immediate response'
      });
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(args) {
        if (this.readyState == this.DONE) {
          doneFn(this.responseText);
        }
      };
      xhr.open("GET", "/php/SetDepartment.php");
      xhr.send();

      expect(doneFn).toHaveBeenCalledWith('getting immediate response');
    });

});
// });