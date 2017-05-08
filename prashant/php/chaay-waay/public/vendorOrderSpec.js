(function() {
  
	beforeEach(angular.mock.module('Le-Aa'));
	
  var $controller;
	beforeEach(angular.mock.inject(function(_$controller_){
    $controller = _$controller_;
  }));
	
	describe('Vendors Order view spec', function(){
		var $scope, controller;

		beforeEach(function(){
			$scope = {};
			controller = $controller('DemoCtrl', {$scope: $scope});
		});

		it('Initial suite', function(){
			$scope.getUndeliverdOrderList();
			calculateGrandTotal();
			expect($scope.grandTotal).toBe(5000);
		});

		it('pack Item to bag', function(){
			$scope.displayOrder(orderId);
			expect($scope.packedItems).toBe(0);
			$scope.packItem(itemId);
			$scope.packItem(itemId);
			expect($scope.packedItems).toBe(2);
			expect($scope.totalBill).toBe();
		});

		it('dispatch order', function() {
			$scope.getUndeliverdOrderList();
			var beforeDeliverOrderLength = $scope.undeliverdOrderList.length;
			$scope.dispatchOrder();
			$scope.getUndeliverdOrderList();
			expect($scope.undeliverdOrderList.length).toBe(beforeDeliverOrderLength - 1);
			expect(showForm).toBeFalsy();
		});

		it('cancel dospatch', function(){
			
			$scope.cancelDilivery();
			expect($scope.showForom).toBeFalsy();
		});
	});

})();
  