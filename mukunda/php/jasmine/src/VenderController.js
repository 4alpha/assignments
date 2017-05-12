(function () {
  angular.module('ChaayWaayApp', [])
    .controller('DemoCtrl', function ($scope) {
      $scope.venderDetails = [];
      $scope.save = function () {
        venderData = {};
        venderData.businessName = $scope.businessName;
        venderData.provide = $scope.provide;
        venderData.type = $scope.type;
        venderData.delivery = $scope.delivery;
        venderData.weeklyOffDays = $scope.weeklyOffDays;
        venderData.workingHours = $scope.workingHours;
        venderData.paymentType = $scope.paymentType;
        $scope.venderDetails.push(venderData);
        $scope.message = "Your data is saved successfully";
      }

      $scope.isSaveButtonDisabled = function () {
        if($scope.businessName == null ||  $scope.provide == null ||  $scope.type == null ||  $scope.delivery == null ||  $scope.weeklyOffDays == null ||  $scope.workingHours == null ||  $scope.paymentType == null) {
          $scope.saveButtonDisabled = true;
        } else {
          $scope.saveButtonDisabled = false;
        }
      }

      // $scope.clearAll();
      // $scope.save = function () {
      //   if($scope.businessName == null || $scope.provide == null || $scope.type == null || $scope.delivery == null || $scope.weeklyOffDays == null || $scope.workingHours == null || $scope.paymentType == null) {
      //     $scope.message = "Error ,Your data is not saved";
      //   } else {
      //     venderData = {};
      //     venderData.businessName = $scope.businessName;
      //     venderData.provide = $scope.provide;
      //     venderData.type = $scope.type;
      //     venderData.delivery = $scope.delivery;
      //     venderData.weeklyOffDays = $scope.weeklyOffDays;
      //     venderData.workingHours = $scope.workingHours;
      //     venderData.paymentType = $scope.paymentType;

      //     $http({
      //       method: 'GET',s
      //       url: "src/venderBusinessDetails.php",
      //       data: venderData
      //     }).success(function (data) {
      //       //alert(data);
      //       $scope.message = "Your data is saved successfully";
      //     }).error(function (data) {
      //       //alert(data);
      //       $scope.message = "Error ,Your data is not saved";
      //     });
      //   }
      // }

      // $scope.clearAll = function () {
      //   $scope.businessName = "";
      //   $scope.provide = "";
      //   $scope.type = "";
      //   $scope.delivery = "";
      //   $scope.weeklyOffDays = "";
      //   $scope.workingHours = "";
      //   $scope.paymentType = "";
      // }
    });
})();