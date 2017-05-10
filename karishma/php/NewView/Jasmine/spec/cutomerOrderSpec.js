(function() {
  describe("Order", function() {
    beforeEach(module('LeAaApp'));
    var $controller, httpBackend;
    beforeEach(inject(function(_$httpBackend_){
      httpBackend = _$httpBackend_;
       availableGlobleList = [
      { id:1, name: 'Sugar', quantity:1, price:44},
      { id:2, name: 'Onion', quantity:1 , price:24},
      { id:3, name: 'Panir', quantity:1, price:4 },
      { id:4, name: 'Potato', quantity:1, price:10}
    ];
    }));

    beforeEach(inject(function(_$controller_) {
      $controller = _$controller_;
    }));
     afterEach(function() {
      httpBackend.verifyNoOutstandingExpectation();
      httpBackend.verifyNoOutstandingRequest();
    });

  describe("create Order", function() {
    it("get globle list", inject(function(){
      var ctrl = $controller('customerOrder', {
        $scope: {}
      });
      httpBackend.whenGET('/rest/order/get/globleList').respond(availableGlobleList);
      ctrl.getProductsList();
      expect(ctrl.availableList).toBeDefined();
      // expect(ctrl.availableList.length).toBeGreaterThan(0);
      expect(ctrl.orderView).toBe(true);
      httpBackend.flush();
    }));
    it("create order by onSelect", inject(function(){
      var temp = [];
      var ctrl = $controller('customerOrder', {
        $scope: {}
      });
      httpBackend.whenGET('/rest/order/get/globleList').respond(availableGlobleList);
      ctrl.getProductsList();
      httpBackend.flush();
      httpBackend.whenPOST('/rest/customer/order/selectedList').respond(function(method, url, data){
        var selectedProduct = angular.fromJson(data)
        temp.push(selectedProduct);
        return [201, temp];
      })
      ctrl.id = 1;
      ctrl.onSelect();
      httpBackend.flush();
      expect(ctrl.selectedProducts.length).toBe(1);
      expect(ctrl.selectedProducts[0].name).toBe("Sugar");
      expect(ctrl.availableList.length).toBe(3);      
      expect(ctrl.totalBillAmt).toBe(44);
  }));
    it("update quantity in selected list", inject(function(){
      var temp = [];
      var ctrl = $controller('customerOrder', {
        $scope: {}
      });
      httpBackend.whenGET('/rest/order/get/globleList').respond(availableGlobleList);
      ctrl.getProductsList();
      httpBackend.flush();
      httpBackend.whenPOST('/rest/customer/order/selectedList').respond(function(method, url, data){
        var selectedProduct = angular.fromJson(data);
        temp.push(selectedProduct);
        for(var i=0; i<temp.length; i++) { 
          ctrl.totalBillAmt = temp[i].price + ctrl.totalBillAmt; 
        }
        return [201, temp];
      })
      ctrl.id = 1;
      ctrl.onSelect();
      httpBackend.flush();
      httpBackend.whenPUT('/rest/customer/order/selectedList/1').respond(function(method, url,data){
        var dataToUpdate = angular.fromJson(data);
        alert(data)
        for(var i=0; i<selectedList.length; i++) {
          if(selectedList[i].id == dataToUpdate.id){
            selectedList[1].quantity = dataToUpdate.quantity;
            selectedList[1].price =  dataToUpdate.price;
          }
        }
        return[200,dataToUpdate]
      })
      ctrl.id = 1;
      ctrl.quantity = 2;
      ctrl.updateQuantity();
      httpBackend.flush();
      expect(ctrl.selectedProducts.length).toBe(1);
      expect(ctrl.selectedProducts[0].quantity).toBe(2);
      expect(ctrl.selectedProducts[0].price).toBe(88);
      expect(ctrl.totalBillAmt).toBe(88);
    }));
  });
  });
})();

