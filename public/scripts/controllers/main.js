'use strict';

/**
 * @ngdoc function
 * @name yeomanProjectsApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the yeomanProjectsApp
 */
angular.module('yeomanProjectsApp')
  .controller('MainCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
