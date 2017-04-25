describe("ajax spec's suite", function() {
	beforeEach(function() {
      jasmine.Ajax.install();
    });	

    afterEach(function() {
      jasmine.Ajax.uninstall();
    });

it("spec for insert Records", function() {
var doneFn = jasmine.createSpy("success");
	

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(args) {
        if (this.readyState == this.DONE) {
          doneFn(this.responseText);
        }
      };

      xhr.open("GET", "/php/common.php");
      xhr.send({view: "Employee",
								emp_name:'sharad',
								emp_address: 'mumbai',
								DOB:'1992-09-07',
								contact_no: '9503061424',
								departments: '4_t,3_t',
								operation:'insert'});
	

      expect(jasmine.Ajax.requests.mostRecent().url).toBe("/php/common.php");
      expect(doneFn).not.toHaveBeenCalled();
	

	jasmine.Ajax.requests.mostRecent().respondWith({
		"status": 200,
		"contentType": "text/plain",
		"responseText": "data inserted successfully"

	});

	expect(doneFn).toHaveBeenCalledWith("data inserted successfully");
});
});