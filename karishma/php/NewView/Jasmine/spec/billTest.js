(function() {
  describe("testing bill menu", function() {
    beforeEach(module('ChaayWaayApp'));
    var $controller;
    beforeEach(inject(function(_$controller_){
      $controller = _$controller_;
    }));
    
    describe("totaling bill amount", function() {
      it("adding elemnet test", function(){
        $scope ={};
        var controller = $controller("DemoCtrl",{$scope:$scope});
        $scope.addItem(1,2);
        expect($scope.totalBillAmt).toBe(88);
        $scope.addItem(2, 1);
        expect($scope.selectedProductList).toBe(2);
        expect($scope.totalBillAmt).toBe(112);
      });
      it("remove elemnet test", function(){
        $scope ={};
        var controller = $controller("DemoCtrl",{$scope:$scope});
        $scope.addItem(1, 2);
        $scope.addItem(2, 1);
        $scope.deleteItem(1);
        expect($scope.selectedProductList).toBe(1);
        expect($scope.totalBillAmt).toBe(24);
      });
      it("update elemnet test", function(){
        $scope ={};
        var controller = $controller("DemoCtrl",{$scope:$scope});
        $scope.addItem(1,1);
        $scope.addItem(2,1);
        $scope.updateItemList(1,2);
        expect($scope.selectedProductList).toBe(2);
        expect($scope.totalBillAmt).toBe(112);
      });
    });
  });
})();

