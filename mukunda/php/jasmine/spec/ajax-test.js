describe("AjaxTest", function() {
  beforeEach(function() {
    jasmine.Ajax.install();
    var calci = new calci();
  });

  afterEach(function(){
    jasmine.Ajax.uninstall();
  });
  
  it("test add function" ,function(){
    jasmine.Ajax.stubRequest('ajaxDemo.js').and.returnValue({
    "responseText": '7'
    
    });
  });
  
});