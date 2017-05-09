'use strict'

describe("LeAaApp", function () {
  beforeEach(angular.mock.module("LeAaApp"));

  var httpBackend, vendorOrderList, userData;
  var $controller;

  beforeEach(inject(function (_$httpBackend_) {
    httpBackend = _$httpBackend_;
    vendorOrderList = [{
        vendorName: "shantanu",
        totalOrders: [500, 400, 2000, 4500],
      },
      {
        vendorName: "prashant",
        totalOrders: [3000, 2000, 1000, 100],
      }
    ];
  }));

  beforeEach(inject(function (_$controller_) {
    $controller = _$controller_;
  }));

  beforeEach(function () {
    httpBackend.verifyNoOutstandingExpectation();
    httpBackend.verifyNoOutstandingRequest();
  });

  describe("Controller Test Cases", function () {
    it('should define vendor order list ', function () {
      var ctrl = $controller('LeAaAppCtrl', {
        $scope: {}
      });
      expect(ctrl.vendorOrderList).toBeDefined();
    })

    it('should have return non empty list of vendor and order details', function () {
      httpBackend.whenGET('LeAaApp/vendorOrder').respond(vendorOrderList);
      var ctrl = $controller('LeAaAppCtrl', {
        $scope: {}
      });
      ctrl.getVendorOrderList();
      httpBackend.flush();
      expect(ctrl.vendorOrderList).toEqual(jasmine.any(Array));
      expect(ctrl.vendorOrderList.length).not.toBe(0);
      expect(ctrl.vendorOrderList.length).toEqual(2);
    })

    it('should check payment confirmation', function () {
      httpBackend.whenPOST('LeAaApp/vendorOrder').respond(function (method, url, data) {
        return [201, "Payment Received"];
      });
      var ctrl = $controller('LeAaAppCtrl', {
        $scope: {}
      });
      ctrl.payingAmount = 1000;
      ctrl.paymentMode = 'debitcard';
      ctrl.doPayment();
      httpBackend.flush();
      expect(ctrl.paymentStatus).toEqual("Payment Received");
      expect(ctrl.paymentStatus).not.toEqual("Payment Unsuccessfull");
    })

    it('should check total amount of order to perticular vendor', function () {
      httpBackend.whenGET('LeAaApp/vendorOrder').respond(vendorOrderList);
      var ctrl = $controller('LeAaAppCtrl', {
        $scope: {}
      });
      ctrl.getVendorOrderList();
      httpBackend.flush();
      console.log(ctrl.vendorOrderList[1]);
      ctrl.calculateOrderTotalAmount(ctrl.vendorOrderList[1]);
      expect(ctrl.orderTotalAmount).toEqual(6100);
    })

  });
});