var app = angular.module('app', ['ngMaterial'])
  .config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
  });