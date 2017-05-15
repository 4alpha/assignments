  var ChaayWaayApp = angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages']);
  ChaayWaayApp.controller('customerViewContoller', function($scope,  $mdSidenav) {
    $scope.maxlength = 10;
    $scope.minlength = 2;
    $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };

    $scope.unpaidOrders = [
      { name: '1.', date: '2017-09-09', balance: '5000/-' },
      { name: '2.', date: '2017-09-09', balance: '2000/-' },
      { name: '3.', date: '2017-09-09', balance: '20000/-' },
      { name: '4.', date: '2017-09-09', balance: '20000/-' },
      { name: '5.', date: '2017-09-09', balance: '20000/-' },
      { name: '6.', date: '2017-09-09', balance: '20000/-' },
      { name: '7.', date: '2017-09-09', balance: '20000/-' },
      { name: '8.', date: '2017-09-09', balance: '20000/-' },
      { name: '9.', date: '2017-09-09', balance: '20000/-' }
    ];

    $scope.paidOrders = [
      { name: '1.', orderdate: '2017-09-09', paiddate: '2017-09-09', paidamount: "1000/-"},
      { name: '2.', orderdate: '2017-09-09', paiddate: '2017-09-09', paidamount: "1000/-"},
      { name: '3.', orderdate: '2017-09-09', paiddate: '2017-09-09', paidamount: "1000/-"},
      { name: '4.', orderdate: '2017-09-09', paiddate: '2017-09-09', paidamount: "1000/-"},
      { name: '5.', orderdate: '2017-09-09', paiddate: '2017-09-09', paidamount: "1000/-"},
      { name: '6.', orderdate: '2017-09-09', paiddate: '2017-09-09', paidamount: "1000/-"},
      { name: '7.', orderdate: '2017-09-09', paiddate: '2017-09-09', paidamount: "1000/-"},
      { name: '8.', orderdate: '2017-09-09', paiddate: '2017-09-09', paidamount: "1000/-"}
    ];

    $scope.validateForm = function() {
      if ($scope.customerView.$valid) {
        $scope.myForm.$setSubmitted();
        alert('Request Paid');
      } else {
        alert('Please enter all fields..');
      }
    };
    this.items = [];
      for (var i = 0; i < 1000; i++) {
        var j = {};
        j.key = i;
        j.squared = i*i;
        this.items.push(j);
      }
  })

  ChaayWaayApp.controller('providerRegistration', function ($scope, $mdSidenav) {

    $scope.openLeftMenu = function () {
      $mdSidenav('left').toggle();
    }
  })

  ChaayWaayApp.controller('customerRegistration', function ($scope, $mdSidenav) {

    $scope.openLeftMenu = function () {
      $mdSidenav('left').toggle();
    }
  })

  .config(function($mdThemingProvider) {
    // Configure a dark theme with primary foreground yellow
    $mdThemingProvider.theme('default')
      .primaryPalette('yellow')
      .dark();
    });


