var app = angular.module("StudentEvents", []); 
app.controller("EventCtrl", function($scope, $http, EventService) {
    $scope.init = function () {
        $scope.debug = EventService.getEvents();
    };
});
