var app = angular.module("StudentEvents", []); 
app.controller("EventCtrl", function($scope, $http, EventService) {
    $scope.events = [];
    $scope.people = [];
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
        //console.log(event_id);
        // EventService.getParticpants()
        //     .then(function (response) {
        //         //return response.data;
        //         console.log(response.data);
        //     });
        $http.get("https://ancient-eyrie-30939.herokuapp.com/api/get_participants.php?event_id=" + event_id)
            .then(function (response) {
                console.log(response.data);
                $scope.people[event_id] = response.data;
            })
            .catch(function (error) {
                console.error("Error retrieving participants");
            });
    }
});
