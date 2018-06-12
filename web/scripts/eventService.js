app.service('EventService', function($http) {
    //Gets all events
    this.getEvents = function () {
        return $http.get("../api/get_events.php");
        //return "Hello World!";
    }
});
