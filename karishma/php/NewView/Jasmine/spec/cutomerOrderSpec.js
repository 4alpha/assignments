(function() {
  describe("Order", function() {
    beforeEach(module('LeAaApp'));
    var $controller;
    beforeEach(inject(function(_$controller_){
      $controller = _$controller_;
    }));

  describe("create Order", function() {
    it("open create new order form", inject(function(){
      $scope ={};
      var controller = $controller("customerOrderCtrl",{$scope:$scope});
      $scope.createOrder();
      expect($scope.orderView).toBe(false);
      expect($scope.createOrderForm).toBe(true);
    }));
    it("select product to selected list", inject(function(){
      $scope ={};
      var controller = $controller("customerOrderCtrl",{$scope:$scope});
      $scope.createOrder();
      expect($scope.orderView).toBe(false);
      expect($scope.createOrderForm).toBe(true);
      expect($scope.selectedListCount).toBe(2);
      expect($scope.availableListCount).toBe(2);
      expect($scope.totalBillAmt).toBe(68);
    }));
    it("update quantity of product list", inject(function(){
      $scope ={};
      var controller = $controller("customerOrderCtrl",{$scope:$scope});
      $scope.createOrder();
      expect($scope.orderView).toBe(false);
      expect($scope.createOrderForm).toBe(true);
      expect($scope.selectedListCount).toBe(2);
      expect($scope.availableListCount).toBe(2);
      $scope.updateQuantity(1,2);
      expect($scope.totalBillAmt).toBe(112);
      $scope.deleteProduct(1);
      expect($scope.totalBillAmt).toBe(24);
    }));
     it("select provider", inject(function(){
      $scope ={};
      var controller = $controller("customerOrderCtrl",{$scope:$scope});
      $scope.createOrder();
      expect($scope.orderView).toBe(false);
      expect($scope.createOrderForm).toBe(true);
      $scope.selectedProvider(1);
      expect($scope.done).toBe(true);
      expect($scope.selectedListCount).toBe(2);
      expect($scope.orderView).toBe(true);
      expect($scope.createOrderForm).toBe(false);
      expect($scope.totalBillAmt).toBe(104);
    }));
  });
  });
})();

