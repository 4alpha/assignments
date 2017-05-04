'use strict'
var leaaApp = angular.module("LeAaApp", ['restangular']);
leaaApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('/rest');
})

leaaApp.controller("UserCtrl", function($scope, Restangular) {
  var ctrl = this;
  ctrl.users = null;

  ctrl.getUsers = function() {
    var userSvc = Restangular.all('admin/users');
    userSvc.getList().then(function(data) {
      ctrl.users = data;
    }, function(error) {
      ctrl.users = [];
    });
  }

  function init() {
    ctrl.getUsers();
  }
  init();
});