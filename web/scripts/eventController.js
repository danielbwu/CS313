var app = angular.module("StudentEvents", []); 
app.controller("EventCtrl", function($scope, $http, EventService) {
    $scope.events = [];
    $scope.people = [];
    $scope.tags = [];
    $scope.init = function () {
        EventService.getEvents()
            .then(function (response) {
                $scope.events = response.data;
                console.log(response.data);
            })
            .catch(function (error) {
                console.error("Error retrieving events");
            });
    };

    $scope.getPeopleByEvent = function (event_id) {
        $http.get("https://ancient-eyrie-30939.herokuapp.com/api/participants.php?event_id=" + event_id)
            .then(function (response) {
                console.log(response.data);
                $scope.people[event_id] = response.data;
            })
            .catch(function (error) {
                console.error("Error retrieving participants");
            });
    }

    $scope.getTags = function (event_id) {
        $http.get("https://ancient-eyrie-30939.herokuapp.com/api/tags.php?event_id=" + event_id)
            .then(function (response) {
                console.log(response.data);
                $scope.tags[event_id] = response.data;
            })
            .catch(function (error) {
                console.error("Error retrieving tags");
            });
    }
});
