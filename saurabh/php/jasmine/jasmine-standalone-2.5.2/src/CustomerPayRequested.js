'use strict'
var leAaApp = angular.module("LeAaApp", ['restangular']);
leAaApp.config(function (RestangularProvider) {
  RestangularProvider.setBaseUrl('LeAaApp/');
})

leAaApp.controller("LeAaAppCtrl", function ($scope, Restangular) {
  var userSvc = Restangular.all('vendorOrder');
  var ctrl = this;
  ctrl.users = null;
  ctrl.vendorOrderListDiv = true;
  ctrl.orderDetailsDiv = false;
  ctrl.orderTotalAmount = 0;
  ctrl.orderDate = null;
  ctrl.payingAmount = null;
  ctrl.paymentMode = null;
  ctrl.paymentStatus = null;
  ctrl.vendorOrderList = null;
  var vendorOrderListRestObject = null;

  ctrl.getVendorOrderList = function () {
    userSvc.getList().then(function (data) {
      vendorOrderListRestObject = data;
      ctrl.vendorOrderList = vendorOrderListRestObject.plain();
    }, function (error) {
      ctrl.vendorOrderListRestObj = [];
    });
  }

  ctrl.doPayment = function () {
    var payment = {};
    payment.mode = ctrl.paymentMode;
    payment.amount = ctrl.payingAmount;
    userSvc.post(payment).then(function (data) {
      ctrl.paymentStatus = data;
    }, function (error) {
      ctrl.paymentStatus = "Payment Unsuccessfull";
    });
  }

  ctrl.calculateOrderTotalAmount = function (order) {
    for (var i = 0; i < order.totalOrders.length; i++) {
      ctrl.orderTotalAmount += order.totalOrders[i];
    }
    return ctrl.orderTotalAmount;
  }

  ctrl.showOrderDetails = function (order) {
    if (ctrl.vendorOrderListDiv == true) {
      ctrl.orderDetailsDiv = true;
    } else {
      ctrl.vendorOrderListDiv = true;
    }
  }

});