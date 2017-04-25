(function() {
  
	beforeEach(angular.mock.module('ChaayWaayApp'));
	
  var $controller;
	beforeEach(angular.mock.inject(function(_$controller_) {
    $controller = _$controller_;
  }));
	
	describe('Add Item spec', function(){
		var $scope, controller;
		beforeEach(function(){
			$scope = {};
			controller = $controller('DemoCtrl', {$scope: $scope});
		});

		it('total amount suite', function() {
			$scope.addItem(1,'mango', 3, 250);
			$scope.addItem(2, 'melon', 1, 50)
			expect($scope.totalAmount).toBe(800);
		});

		it('remove from available list suite', function() {
			$scope.availableItemsList = [
			{itemCode:1, itemName:'mango', price:250},
			{itemCode:2, itemName:'strawberry', price:350},
			{itemCode:3, itemName:'watermelon', price:80},
			{itemCode:4, itemName:'melon', price:50},
			{itemCode:5, itemName:'apple', price:150}
		];
			$scope.addItem(1,'mango', 3, 250);
			$scope.addItem(5, 'apple', 1, 150)
			expect($scope.availableItemsList.length).toBe(3);
		});

		it('add into  selected list suite', function() {
			$scope.addItem(1,'mango', 3, 250);
			$scope.addItem(2, 'melon', 1, 50);
			expect($scope.selectedItemsList.length).toBe(2);
		});
	});

	describe('update Item quantity spec', function(){
		var $scope, controller;
		beforeEach(function(){
			$scope = {};
			controller = $controller('DemoCtrl', {$scope: $scope});
		});

		it('update bill amount', function() {
			$scope.addItem(5, 'apple', 1, 150);
			$scope.updateItem(5,3);
			$scope.addItem(1,'mango', 1, 250);
			expect($scope.totalAmount).toBe(700);
		});
	});

	describe('Delete Item from selected list spec', function(){
		var $scope, controller;
		beforeEach(function(){
			$scope = {};
			controller = $controller('DemoCtrl', {$scope: $scope});
		});

		it('amount of deleted item reduce from total', function() {
			$scope.addItem(1,'mango', 3, 250);
			$scope.addItem(4,'melon', 1, 50);
			$scope.addItem(5,'apple', 1, 150);		
			$scope.deleteItem(1);
			expect($scope.totalAmount).toBe(200);
		});

		it('item removed from selected list', function() {
			$scope.availableItemsList = [
			{itemCode:1, itemName:'mango', price:250},
			{itemCode:2, itemName:'strawberry', price:350},
			{itemCode:3, itemName:'watermelon', price:80},
			{itemCode:4, itemName:'melon', price:50},
			{itemCode:5, itemName:'apple', price:150}
		];
			$scope.addItem(1,'mango', 3, 250);
			$scope.addItem(4, 'melon', 1, 50);
			$scope.deleteItem(1);
			expect($scope.selectedItemsList.length).toBe(1);
			expect($scope.availableItemsList.length).toBe(4);
		});
	});

})();
  