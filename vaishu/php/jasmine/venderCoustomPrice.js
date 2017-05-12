'use strict'
var leaaApp = angular.module("LeAaApp", ['restangular']);
leaaApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('/rest');
})

leaaApp.controller("venderCoustomPriceController", function($scope, Restangular) {
  var itemSvc = Restangular.service('admin/items');
  var ctrl = this;
  ctrl.items = null;
  var itemRestObjects = null;
  
  ctrl.getItems = function() {
    itemSvc.getList().then(function(data) {
      itemRestObjects = data;
      ctrl.items = itemRestObjects.plain();
    }, function(error) {
      ctrl.items = [];
    });
  }

  ctrl.name = null;
  ctrl.quantity = null;
  ctrl.price = null;
  
  ctrl.createItem = function() {
    var item = {};
    item.id = ctrl.id;
    item.name = ctrl.name;
    item.quantity = ctrl.quantity;
    item.price = ctrl.price;
    itemSvc.post(item).then(function(data) {
      ctrl.getItems();
      alert("sucessfully created!!!");
    }, function(response) {
      console.log("Error with status code", response.status);
    });
  }

  ctrl.selectedItem = null;
  ctrl.updateItem = function() {
    var item = Restangular.copy(getSelectedRestObject());
    item.name = ctrl.name;
    item.quantity = ctrl.quantity;
    item.price = ctrl.price;
    item.put().then(function(id) {
      ctrl.getItems();
      alert("sucessfully updated!!!");
    }, function(response) {
      console.log("Error with status code", response.status);
    });
  }

  ctrl.deleteItem = function() {
    var item = Restangular.copy(getSelectedRestObject());
    item.remove().then(function(id) {
      ctrl.getItems();
      alert("sucessfully deleted!!!");
    }, function(response) {
      console.log("Error with status code", response.status);
    });
  }
  
  function getSelectedRestObject() {
    for (var i = 0; i < itemRestObjects.length; i++) {
      if (itemRestObjects[i].id == ctrl.selectedItem) {
        return itemRestObjects[i];
      }
    }
  }

  function init() {
    ctrl.getItems();
  }
  init();
});

