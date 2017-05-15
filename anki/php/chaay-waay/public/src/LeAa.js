var chaaywaay = angular.module('ChaayWaayApp', [])
  chaaywaay.controller('providerRegistration', function ($scope) {
    $scope.vendorRegisterTable = [
      // {vendorID:'1', name:'Ankita', phone:'8989898981', location:'A-1/10 Fatimanagar Pune'}
    ];

    $scope.onRegisterDetails = function (phone, location) {
      for (var i = 0; i < $scope.vendorRegisterTable.length; i++) {
        if ($scope.vendorRegisterTable[i].phone == phone && $scope.vendorRegisterTable[i].location == location) {
          throw new Error("Phone number and location is already exist");
        } else {
          var vendorID = idgenerate();
          alert(vendorID);
          vendorID += 1;
          list = {};
          list.vendorID = vendorID;
          list.name = $scope.name;
          list.phone = $scope.phone;
          list.location = $scope.location;
          server.save(list, function success(data) {
            $scope.getList();
          }, function failure() {
            $scope.getError();
          })
        }
      }
    }
    function idgenerate() {
      var last_element = $scope.vendorRegisterTable[$scope.vendorRegisterTable.length];
      // var json_str = JSON.stringify(last_element);
      // createCookie('vendorRecordCookie', json_str);
      var vendorID = last_element.slice(0, 1);
      return vendorID;
    }
  })

  chaaywaay.controller('customerRegistration', function ($scope) {
    $scope.customerRegisterTable = [];

    $scope.onRegisterDetailsCustomer = function (phone) {
      for (var i = 0; i < $scope.customerRegisterTable.length; i++) {
        if ($scope.customerRegisterTable[i].phone == phone) {
          throw new Error("Phone number is already exist");
        } else {
          var customerID = Customeridgenerate();
          customerID += 1;
          list = {};
          list.customerID = customerID;
          list.name = $scope.name;
          list.phone = $scope.phone;
          list.address = $scope.address;
          server.save(list, function success(data) {
            $scope.getList();
          }, function failure() {
            $scope.getError();
          })
        }
      }
    }
    function Customeridgenerate() {
      var last_element = $scope.customerRegisterTable[$scope.customerRegisterTable.length - 1];
      // var json_str = JSON.stringify(last_element);
      // createCookie('vendorRecordCookie', json_str);
      var customerID = last_element.slice(0, 1);
      return customerID;
    }
  })

  chhaywaay.controller('customerViewContoller', function ($scope) {
    $scope.unPaidOrderList = [
      { id: '1', orderdate: "2017-09-09", balance:'300' },
      { id: '2', orderdate: "2017-09-09", balance:'200' },
    ];
    $scope.total = 0;
    $scope.onRequestPay = function () {
      if ($scope.unPaidOrderList == null) {
        throw new Error("List can not be null");
      } else {
        for (var i = 0; i < $scope.unPaidOrderList.length; i++) {
          $scope.total = $scope.total + $scope.unPaidOrderList[i].balance;
          server.save($scope.total, function success(data) {
            alert("send Notification to customer");
          }, function failure() {
            $scope.getError();
          })
        }
      }
    }
  })

  .config(function ($mdThemingProvider) {
  // Configure a dark theme with primary foreground yellow
  $mdThemingProvider.theme('default')
    .primaryPalette('yellow')
    .dark();
  });


