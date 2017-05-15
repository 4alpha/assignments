describe("PersonInformation", function() {
  
  beforeEach(function() {
    P = new Person();
    spyOn(P,"getName");
    spyOn(P,"setName");
    P.p1 = jasmine.createSpy("Ankita spy");
  });
  
  it("Call the getName() method", function() {
    P.getName();
    expect(P.getName).toHaveBeenCalled();
  });

  it("call the setName() testing", function() {
    P.setName("Aishwarya Landekar");
    expect(P.setName).toHaveBeenCalled();
  });

  describe("For create spy demo", function() {

    it("create spy method testing", function() {
      P.p1();
      expect(P.p1).toHaveBeenCalled();
      expect(P.p1.calls.count()).toEqual(1);
      expect(P.p1.calls.mostRecent().args[0]).toEqual();
    });

    it("create spy mostrecent with qual", function() {
      P.p1("Ankita","Karishma","Vaishu");
      expect(P.p1).toHaveBeenCalledWith("Ankita","Karishma","Vaishu");
      expect(P.p1.calls.mostRecent().args[0]).toEqual("Ankita");
    });
  });
});