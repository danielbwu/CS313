app.service('EventService', function($http) {
    //Gets all events
    this.getEvents = function () {
        return $http.get("https://ancient-eyrie-30939.herokuapp.com/api/get_events.php");
        //return "Hello World!";
    }
});
