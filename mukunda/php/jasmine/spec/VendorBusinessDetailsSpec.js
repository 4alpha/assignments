'use strict'
  describe("LeAaApp", function() {

    beforeEach(angular.mock.module('LeAaApp'));

    var httpBackend, vendorBusinessDetailsData;
    beforeEach(inject(function(_$httpBackend_) {
      httpBackend = _$httpBackend_;
      vendorBusinessDetailsData = [{
          id: 1,
          businessName: 'Balaji',
          provide: 'Service',
          type: 'Medicine',
          delivery: 'Home',
          weeklyOffDays: 'Mon',
          workingHours: '9 AM - 4 PM',
          paymentType: 'Credit'
      },
      {
          id: 2,
          businessName: 'Ganesh Medical',
          provide: 'Service',
          type: 'Medicine',
          delivery: 'Home',
          weeklyOffDays: 'Mon',
          workingHours: '9 AM - 4 PM',
          paymentType: 'Credit'
      }
      ];
    }));

    var $controller;
    beforeEach(inject(function(_$controller_) {
      $controller = _$controller_;
    }));

    afterEach(function() {
      httpBackend.verifyNoOutstandingExpectation();
      httpBackend.verifyNoOutstandingRequest();
    });

    describe('VendorCtrl', function () {
      it('initially save button is disabled', function () {
        var ctrl = $controller('VendorCtrl', {
          $scope: {}
        });
        expect(ctrl.saveButtonDisabled).toEqual(true);
      })

      it('should add the vendor business details in database and return success message', function () {
        httpBackend.whenGET('/rest/admin/vendor').respond(vendorBusinessDetailsData);
        httpBackend.whenPOST('/rest/admin/vendor').respond(function (method, url, data) {
          var vendorData = JSON.parse(data);
          var vendorId = 3;
          vendorBusinessDetailsData.push({
            id: vendorId,
            businessName: vendorData.businessName,
            provide: vendorData.provide,
            type: vendorData.type,
            delivery: vendorData.delivery,
            weeklyOffDays: vendorData.weeklyOffDays,
            workingHours: vendorData.workingHours,
            paymentType: vendorData.paymentType
          });
          return [200, "Data added successfully"];
        });

        var ctrl = $controller('VendorCtrl', {
          $scope: {}
        });

        ctrl.businessName = 'Vegitables shop';
        ctrl.provide = 'Service';
        ctrl.type = 'Vegitables';
        ctrl.delivery = 'Home';
        ctrl.weeklyOffDays = 'Sat';
        ctrl.workingHours = '10 AM - 6 PM';
        ctrl.paymentType = 'Cash';

        // ctrl.isSaveButtonDisabled();
        // expect(ctrl.saveButtonDisabled).toBe(false);

        ctrl.addVendorDetails();
        httpBackend.flush();
        expect(ctrl.message).toEqual("Data added successfully");
        expect(ctrl.vendorBusinessDetails.length).toBe(3);
      })

      it('should update the business details', function () {
        httpBackend.whenGET('/rest/admin/vendor').respond(vendorBusinessDetailsData);
        httpBackend.whenPUT('/rest/admin/vendor/2').respond(function (method, url, data) {
          var vendorData = JSON.parse(data);
          vendorBusinessDetailsData[1].businessName = vendorData.businessName;
          vendorBusinessDetailsData[1].provide = vendorData.provide;
          vendorBusinessDetailsData[1].type = vendorData.type;
          vendorBusinessDetailsData[1].delivery = vendorData.delivery;
          vendorBusinessDetailsData[1].weeklyOffDays = vendorData.weeklyOffDays;
          vendorBusinessDetailsData[1].workingHours = vendorData.workingHours;
          vendorBusinessDetailsData[1].paymentType = vendorData.paymentType;
          return [200, vendorData];
        });

        var ctrl = $controller('VendorCtrl', {
          $scope: {}
        });

        httpBackend.flush();
        ctrl.selectedVendor = 2;
        ctrl.businessName = 'SHREE';
        ctrl.provide = 'Service';
        ctrl.type = 'Vegitables';
        ctrl.delivery = 'Home';
        ctrl.weeklyOffDays = 'Sun';
        ctrl.workingHours = '10 AM - 6 PM';
        ctrl.paymentType = 'Cash';

        // ctrl.isSaveButtonDisabled();
        // expect(ctrl.saveButtonDisabled).toBe(false);

        ctrl.updateVendorDetails();
        httpBackend.flush();
        expect(ctrl.vendorBusinessDetails.length).toBe(2);
        expect(ctrl.vendorBusinessDetails[1].businessName).toEqual("SHREE");
        expect(ctrl.vendorBusinessDetails[1].weeklyOffDays).toEqual("Sun");
      })
    });
 });