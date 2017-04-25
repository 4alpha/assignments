describe('Orders spec', function() {
  var $controller;
	beforeEach(angular.mock.module('ChaayWaayApp'));
	
  
	beforeEach(inject(function(_$controller_) {
    $controller = _$controller_;
  }));

describe('update item test', function(){
	var $scope, controller;
	beforeEach(function(){
		$scope = {};
		controller = $controller('DemoCtrl', {$scope: $scope});
	});

  it('update item quantity', function() {
		openLeftMenu();
		expect($scope.itemId).toBe(102);
    expect($scope.quantity).toBe(3);
  });
});
});
  
// 	describe('PasswordController', function() {
//   beforeEach(module('app'));

//   var $controller;

//   beforeEach(inject(function(_$controller_){
//     // The injector unwraps the underscores (_) from around the parameter names when matching
//     $controller = _$controller_;
//   }));

//   describe('$scope.grade', function() {
//     var $scope, controller;

//     beforeEach(function() {
//       $scope = {};
//       controller = $controller('PasswordController', { $scope: $scope });
//     });

//     it('sets the strength to "strong" if the password length is >8 chars', function() {
//       $scope.password = 'longerthaneightchars';
//       $scope.grade();
//       expect($scope.strength).toEqual('strong');
//     });

//     it('sets the strength to "weak" if the password length <3 chars', function() {
//       $scope.password = 'a';
//       $scope.grade();
//       expect($scope.strength).toEqual('weak');
//     });
//   });
// });

