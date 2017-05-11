
var routerApp = angular.module('routerApp', ['ui.router']);

routerApp.config(function($stateProvider, $urlRouterProvider, $locationProvider) {
	
    //$urlRouterProvider.otherwise('/home');
    
    $stateProvider
        
        // HOME
        .state('home', {
            url: '/home',
            templateUrl: 'home-content.php'
        })
        
        // ARTISTS
        .state('artists', {
            url: '/artists',
            templateUrl: 'artists-content.php'
        })
        
        // BROWSE
        .state('browse', {
            url: '/browse',
            templateUrl: 'browse-content.php'
        })
        
        // DISCOVER
        .state('discover', {
            url: '/discover',
			templateUrl: 'discover-content.php'
            
        })
		
		// MY PROFILE
        .state('myprofile', {
            url: '/myprofile',
			templateUrl: 'myprofile-content.php'
            
        })
		// MY PROFILE NESTED
        .state('myprofile.playlists', {
            url: '/playlists',
			templateUrl: 'mpplist.php'
            
        })
		
		// STATION
		.state('station', {
            url: '/station',
			templateUrl: 'station-content.php'
            
        });
		
		
        $locationProvider.html5Mode(true);
});
	
	
	
	
	