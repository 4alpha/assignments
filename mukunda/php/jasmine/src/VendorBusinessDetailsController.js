'use strict'
var leaaApp = angular.module("LeAaApp", ['restangular']);
leaaApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('/rest');
})

leaaApp.controller("VendorCtrl", function($scope, Restangular) {
  var userSvc = Restangular.all('admin/vendor');
  var ctrl = this;
  ctrl.vendorBusinessDetails = null;
  var vendorRestObjects = null;
  ctrl.saveButtonDisabled = true;

  ctrl.getVendorDetails = function () {
    userSvc.getList().then(function (data) {
      vendorRestObjects = data;
      ctrl.vendorBusinessDetails = vendorRestObjects.plain();
    }, function(error) {
      ctrl.vendorBusinessDetails = [];
    });
  }

  // ctrl.isSaveButtonDisabled = function () {
  //   if (ctrl.businessName == null || ctrl.provide == null || ctrl.type == null || ctrl.delivery == null || ctrl.weeklyOffDays == null || ctrl.workingHours == null || ctrl.paymentType == null) {
  //     ctrl.saveButtonDisabled = true;
  //   } else {
  //     ctrl.saveButtonDisabled = false;
  //   }
  // }

  ctrl.businessName = null;
  ctrl.provide = null;
  ctrl.type = null;
  ctrl.delivery = null;
  ctrl.weeklyOffDays = null;
  ctrl.workingHours = null;
  ctrl.paymentType = null;

  ctrl.addVendorDetails = function () {
    var vendor = {
      businessName: ctrl.businessName,
      provide: ctrl.provide,
      type: ctrl.type,
      delivery: ctrl.delivery,
      weeklyOffDays: ctrl.weeklyOffDays,
      workingHours: ctrl.workingHours,
      paymentType: ctrl.paymentType
    };

    userSvc.post(vendor).then(function (data) {
      ctrl.getVendorDetails();
      ctrl.message = data;
    }, function(error) {
      alert("Error, data not saved");
    });
  }

  ctrl.selectedVendor = null;
  ctrl.updateVendorDetails = function () {
    var vendor = Restangular.copy(getSelectedRestObject());
    vendor.businessName = ctrl.businessName;
    vendor.provide = ctrl.provide;
    vendor.type = ctrl.type;
    vendor.delivery = ctrl.delivery;
    vendor.weeklyOffDays = ctrl.weeklyOffDays;
    vendor.workingHours = ctrl.workingHours;
    vendor.paymentType = ctrl.paymentType;
    vendor.put().then(function (id) {
      ctrl.getVendorDetails();
    }, function(error) {
      alert("data is not updated");
    });
  }

  function getSelectedRestObject() {
     for (var i = 0; i < vendorRestObjects.length; i++) {
       if (vendorRestObjects[i].id == ctrl.selectedVendor) {
         return vendorRestObjects[i];
      }
    }
  }

  function init() {
    ctrl.getVendorDetails();
  }

  init();
});