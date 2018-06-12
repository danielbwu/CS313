var app = angular.module("StudentEvents", []); 
app.controller("EventCtrl", function($scope, $http, EventService) {
    $scope.events = [];
    $scope.people = [];
    $scope.tags = [];
    $scope.reg_event_id = "";
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

    $scope.setRegId = function (id) {
        $scope.reg_event_id = id;
    }

    $scope.validate = function () {
        let valid = ($scope.reg_event_id != 0) && ($scope.reg_name != "") && ($scope.reg_inumber.length == 9);
        console.log("Valid form: " + valid.toString());
        return valid;
    }

    $scope.clearReg = function () {
        $scope.reg_event_id = "";
        $scope.reg_name = "";
        $scope.reg_inumber = "";
        $scope.reg_notes = "";
    }

    $scope.registerPerson = function () {

        if ($scope.validate()) {
            let event_id = $scope.reg_event_id;
            let participant_name = $scope.reg_name;
            let participant_inumber = $scope.reg_inumber;
            let notes = $scope.reg_notes;

            $http.post("https://ancient-eyrie-30939.herokuapp.com/api/register_person.php", event_id, participant_name, participant_inumber, notes)
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {

                });
        }

    }
});
