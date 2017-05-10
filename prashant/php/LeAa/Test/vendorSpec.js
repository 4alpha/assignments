'use strict'
describe("LeAaApp", function () {

  beforeEach(angular.mock.module('LeAaApp'));

  var httpBackend, undeliveredOrdersData, orderData, order1, order2, order3;
  beforeEach(inject(function (_$httpBackend_) {
    httpBackend = _$httpBackend_;
    undeliveredOrdersData = [{
        id: 1,
        customerName: 'Aslam',
        date: '2017-1-14',
        total: 500
      },
      {
        id: 2,
        customerName: 'Shantanu',
        date: '2017-1-14',
        total: 800
      },
      {
        id: 3,
        customerName: 'Nilesh',
        date: '2017-1-14',
        total: 500
      }
    ];
    order1 = [{
        itemId: 221,
        itemName: 'tomato',
        quantity: '4',
        total: 200
      },
      {
        itemId: 211,
        itemName: 'potato',
        quantity: '5',
        total: 300
      }
    ];
    order2 = [{
        itemId: 121,
        itemName: 'mellon',
        quantity: '4',
        total: 500
      },
      {
        itemId: 11,
        itemName: 'mango',
        quantity: '5',
        total: 300
      }
    ];
    order3 = [{
        itemId: 321,
        itemName: 'paneer',
        quantity: '4',
        total: 400
      },
      {
        itemId: 311,
        itemName: 'kaju',
        quantity: '5',
        total: 100
      }
    ];

    orderData = [order1, order2, order3];
  }));
  var $controller;
  beforeEach(inject(function (_$controller_) {
    $controller = _$controller_;
  }));

  afterEach(function () {
    httpBackend.verifyNoOutstandingExpectation();
    httpBackend.verifyNoOutstandingRequest();
  });

  describe('VendorCtrl', function () {
    it('should define undeliveredOrders collection', function () {
      var ctrl = $controller('VendorCtrl', {
        $scope: {}
      });
      expect(ctrl.undeliveredOrders).toBeDefined();
    })

    it('should have return list of undelivered orders and calculate grand total on initialization', function () {
      httpBackend.whenGET('/leaa/vendor/undeliveredOrders').respond(undeliveredOrdersData);
      var ctrl = $controller('VendorCtrl', {
        $scope: {}
      });
      httpBackend.flush();
      expect(ctrl.undeliveredOrders).toEqual(jasmine.any(Array));
      expect(ctrl.undeliveredOrders.length).toEqual(3);
      expect(ctrl.grandTotal).toEqual(1800);
    })

    it('When vendor pack an item, then selected item count shoud be increase.', function () {
      httpBackend.whenGET('/leaa/vendor/undeliveredOrders/2').respond(orderData[1]);
      httpBackend.whenGET('/leaa/vendor/undeliveredOrders').respond(undeliveredOrdersData);
      var selectedOrder = 2;
      var ctrl = $controller('VendorCtrl', {
        $scope: {}
      });
      expect(ctrl.showOrderForm).toBeFalsy();
      ctrl.getOrderData(selectedOrder);
      httpBackend.flush();
      expect(ctrl.showOrdersForm).toBeTruthy();
      expect(ctrl.dispatchButton).toBeFalsy();
      ctrl.packItem(121);
      ctrl.packItem(11);
      expect(ctrl.dispatchButton).toBeTruthy();
      expect(ctrl.orderData).toBeDefined();
      expect(ctrl.packedItems).toBeDefined();
      expect(ctrl.packedItems.length).toEqual(2);
      expect(ctrl.packedItemsTotal).toBe(800);
    })

    it('Should remove order from undeliverd order when deliver order', function () {
      httpBackend.whenGET('/leaa/vendor/undeliveredOrders').respond(undeliveredOrdersData);
      httpBackend.whenGET('/leaa/vendor/undeliveredOrders/2').respond(orderData[1]);
      httpBackend.whenPOST('/leaa/vendor/deliveredOrders').respond(function (method, url, data) {
        ctrl.undeliveredOrders.forEach(function (element, index) {
          if (element.id == selectedOrder) {
            var ob = undeliveredOrdersData.splice(index, 1);
            ctrl.undeliveredOrders = undeliveredOrdersData;
          }
        })
        return [201, data];
      });
      var ctrl = $controller('VendorCtrl', {
        $scope: {}
      });
      var selectedOrder = 2;
      ctrl.getOrderData(selectedOrder);
      httpBackend.flush();
      ctrl.packItem(121);
      ctrl.packItem(11);
      ctrl.dispatchOrder();
      httpBackend.flush();
      expect(ctrl.undeliveredOrders.length).toBe(2);

    })
  })
});