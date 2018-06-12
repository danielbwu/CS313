var app = angular.module("StudentEvents", []); 
app.controller("EventCtrl", function($scope, $http, EventService) {
    $scope.init = function () {
        EventService.getEvents()
            .then(function (response) {
                $scope.events = response.data;
                console.log(response.data);
            });
    };

    $scope.getPeopleByEvent = function (event_id) {
        console.log(event_id);
        EventService.getParticpants()
            .then(function (response) {
                //return response.data;
                console.log(response.data);
            });
    }
});
