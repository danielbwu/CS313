var app = angular.module("StudentEvents", []); 
app.controller("EventCtrl", function($scope, $http, EventService) {
    $scope.init = function () {
        EventService.getEvents()
            .then(function (response) {
                $scope.debug = response.data;
                console.log(response.data);
            });
    };
});
