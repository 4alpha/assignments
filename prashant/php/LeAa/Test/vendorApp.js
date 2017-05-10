'use strict'
var leaaApp = angular.module("LeAaApp", ['restangular']);
leaaApp.config(function (RestangularProvider) {
  RestangularProvider.setBaseUrl('/leaa');
})

leaaApp.controller("VendorCtrl", function ($scope, Restangular) {
  var undeliveredOrdersSvc = Restangular.all('/vendor/undeliveredOrders');
  var ctrl = this;
  ctrl.undeliveredOrders = null;
  var undeliveredOrdersRestObjects = null;
  var orderRestObjects = null;
  ctrl.orderData = null;
  ctrl.dispatchButton = false;
  ctrl.showOrdersForm = false;

  ctrl.getUndeliveredOrders = function () {
    undeliveredOrdersSvc.getList().then(function (data) {
      undeliveredOrdersRestObjects = data;
      ctrl.undeliveredOrders = undeliveredOrdersRestObjects.plain();
      calculateGrandTotal(ctrl.undeliveredOrders);
    }, function (error) {
      ctrl.undeliveredOrders = [];
    });
  }

  ctrl.getOrderData = function (orderId) {
    ctrl.showOrdersForm = true;
    Restangular.one('/vendor/undeliveredOrders', orderId).get().then(function (data) {
      orderRestObjects = data;
      ctrl.orderData = orderRestObjects.plain();
    })
  }

  ctrl.packedItems = [];
  ctrl.packItem = function (itemId) {
    ctrl.dispatchButton = true;
    ctrl.orderData.forEach(function (element, index) {
      if (element.itemId == itemId) {
        ctrl.packedItems.push(element);
      }
    });
    getPackedItemsTotal();
  }

  ctrl.dispatchOrder = function () {
    var deliveredOrdersSvc = Restangular.all('/vendor/deliveredOrders');
    deliveredOrdersSvc.post(ctrl.packedItems).then(function (data) {
      ctrl.getUndeliveredOrders();
    })
  }

  function getPackedItemsTotal() {
    ctrl.packedItemsTotal = 0;
    ctrl.packedItems.forEach(function (element) {
      ctrl.packedItemsTotal += element.total;
    })
  }

  ctrl.grandTotal = 0;

  function calculateGrandTotal(undeliveredOrders) {
    undeliveredOrders.forEach(function (element, index) {
      ctrl.grandTotal += element.total;
    })
  }

  function init() {
    ctrl.getUndeliveredOrders();
  }
  init();
});