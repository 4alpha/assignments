(function () {
  describe("ChaayWaayApp", function () {
    beforeEach(angular.mock.module('ChaayWaayApp'));
    var $controller;
    beforeEach(angular.mock.inject(function (_$controller_) {
      $controller = _$controller_;
    }));

    describe("Test for vender business details", function () {
      it("Test for save button is disabled", function () {
        var $scope = {};
        var controller = $controller('DemoCtrl', { $scope: $scope });
        $scope.isSaveButtonDisabled();
        expect($scope.saveButtonDisabled).toBe(true);
      });

      it("Test for success message", function () {
        var $scope = {};
        var controller = $controller('DemoCtrl', { $scope: $scope });
        $scope.isSaveButtonDisabled();
        expect($scope.saveButtonDisabled).toBe(false);
        $scope.save();
        expect($scope.message).toEqual("Your data is saved successfully");
      });

      // describe("Test for save button", function () {
      //   it("Test for save button is disabled", function () {
      //     var $scope = {};
      //     var controller = $controller('DemoCtrl', { $scope: $scope });
      //     $scope.isSaveButtonDisabled();
      //     expect($scope.saveButtonDisabled).toBe(true);
      //   });

      //   it("Test for save button is enabled", function () {
      //     var $scope = {};
      //     var controller = $controller('DemoCtrl', { $scope: $scope });
      //     $scope.isSaveButtonDisabled();
      //     expect($scope.saveButtonDisabled).toBe(false);
      //   });
      //});
    });
  });
})();