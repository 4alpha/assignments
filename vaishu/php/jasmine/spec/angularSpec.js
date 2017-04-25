describe('angularTest', function () {
  beforeEach(angular.mock.module('ChaayWaayApp'));
  var $controller;
  beforeEach(angular.mock.inject(function(_$controller_){
	  $controller = _$controller_;
	}));

     describe("add  test", function(){
       it("adding element test", function(){
          $scope ={};
          var controller = $controller("DemoCtrl",{$scope: $scope});
          $scope.addItem(1,2);
          $scope.addItem(2,2);
          expect($scope.totalBillAmt).toBe(80);
          $scope.addItem(3,1);
          expect($scope.totalBillAmt).toBe(90);
       });
        
       it("add element avaliable items length test", function(){
         $scope ={};
         var controller = $controller("DemoCtrl",{$scope: $scope});
         $scope.addItem(1,2);
         $scope.addItem(2,2);
         expect($scope.avaliableItems.length).toBe(2);
       });
     }); 

     describe("delete  test", function() {
        it("delete element test", function() {
          $scope ={};
          var controller = $controller("DemoCtrl",{$scope: $scope});
          $scope.addItem(1,2);
          $scope.addItem(2,2);
          expect($scope.totalBillAmt).toBe(80);
          $scope.deleteItem(2);
          expect($scope.totalBillAmt).toBe(60);
          $scope.deleteItem(1);
          expect($scope.totalBillAmt).toBe(0);
        });

        it("delete element avaliable items length test", function(){
            $scope ={};
            var controller = $controller("DemoCtrl",{$scope: $scope});
            $scope.addItem(2,2);
            $scope.addItem(1,2);
            expect($scope.totalBillAmt).toBe(80);
            $scope.deleteItem(2);
            expect($scope.items.length).toBe(1);
          });

     });

    describe("Update  test", function() {
        it("Update element test", function(){
          $scope ={};
          var controller = $controller("DemoCtrl",{$scope: $scope});
          $scope.addItem(1,2);
          $scope.addItem(2,2);
          $scope.updateItem(1,3);
          expect($scope.totalBillAmt).toBe(110);
          $scope.updateItem(2,3);
          expect($scope.totalBillAmt).toBe(120);
          
        });
        
        it("Upate element avaliable items length test", function(){
            $scope ={};
            var controller = $controller("DemoCtrl",{$scope: $scope});
            $scope.addItem(2,2);
            $scope.addItem(1,2);
            $scope.updateItem(2,3);
            expect($scope.items.length).toBe(2);
          });
      });

});