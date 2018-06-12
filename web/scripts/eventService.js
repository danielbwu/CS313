app.service('EventService', function($http) {
    //Gets all events
    this.getEvents = function () {

        return $http.get("https://ancient-eyrie-30939.herokuapp.com/api/events.php");
    }

    //Gets all participants
    this.getParticipants = function () {
        
        return $http.get("https://ancient-eyrie-30939.herokuapp.com/api/participants.php");
    }

    //Get participants for a specific event
    this.getParticipantsByEvent = function (event_id) {

        return $http.get("https://ancient-eyrie-30939.herokuapp.com/api/participants.php?event_id=" + event_id);
    }


});
