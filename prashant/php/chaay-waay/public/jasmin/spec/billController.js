var app = angular.module('ChaayWaayApp', []);

  app.controller('DemoCtrl', function($scope) {
		$scope.totalAmount = 0;
		$scope.selectedItemsList = [];
		$scope.availableItemsList = [
			{itemCode:1, itemName:'mango', quantity: 1,price:250},
			{itemCode:2, itemName:'strawberry',quantity: 1, price:350},
			{itemCode:3, itemName:'watermelon', quantity: 1, price:80},
			{itemCode:4, itemName:'melon', quantity: 1, price:50},
			{itemCode:5, itemName:'apple', quantity: 1, price:150}
		];

		$scope.addItem = function(itemCode, itemName, quantity, price) {	
			itemObject = {itemCode: itemCode, itemName: itemName, quantity: quantity, price: price};
			$scope.selectedItemsList.push(itemObject);
			for(var i = $scope.availableItemsList.length - 1; i >= 0; i--){
				if($scope.availableItemsList[i].itemCode == itemCode) {
					$scope.availableItemsList.splice(i, 1);
				}
			}			
			calculateBill(quantity * price);
		};

		$scope.updateItem = function(itemCode, quantity) {
			for(var i = $scope.selectedItemsList.length - 1; i >= 0; i--){
				if($scope.selectedItemsList[i].itemCode == itemCode) {
					$scope.totalAmount = $scope.totalAmount - ($scope.selectedItemsList[i].quantity * $scope.selectedItemsList[i].price);
					$scope.selectedItemsList[i].quantity = quantity;
					calculateBill( $scope.selectedItemsList[i].price * quantity);
				}
			}	
		};
		
		$scope.deleteItem = function(itemCode) {
			var removedItem;
			for(var i = $scope.selectedItemsList.length - 1; i >= 0; i--){
				if($scope.selectedItemsList[i].itemCode == itemCode){
					$scope.totalAmount = $scope.totalAmount - ($scope.selectedItemsList[i].price * $scope.selectedItemsList[i].quantity);
					removedItem = $scope.selectedItemsList.splice(i, 1);
					$scope.availableItemsList.push(removedItem);
			}
			}
		};

		calculateBill = function (itemAmount) {
			$scope.totalAmount += itemAmount;
	};
	});