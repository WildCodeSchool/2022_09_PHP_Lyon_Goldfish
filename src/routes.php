<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],

    'login' => ['UserController', 'login',],
    'logout' => ['UserController', 'logout',],
    'register' => ['UserController', 'register',],

    'concerts' => ['ConcertController', 'index',],
    'concerts/edit' => ['ConcertController', 'edit', ['id']],
    'concerts/show' => ['ConcertController', 'show', ['id']],
    'concerts/add' => ['ConcertController', 'add',],
    'concerts/delete' => ['ConcertController', 'delete',],

    'artists' => ['ArtistController', 'index',],
    'artists/edit' => ['ArtistController', 'edit', ['id']],
    'artists/show' => ['ArtistController', 'show', ['id']],
    'artists/add' => ['ArtistController', 'add',],
    'artists/delete' => ['ArtistController', 'delete',],
    'artists/search' => ['ArtistController', 'search',],
    'artists/favorite' => ['ArtistController', 'favorite',],

    'venues' => ['VenueController', 'index',],
    'venues/edit' => ['VenueController', 'edit', ['id']],
    'venues/show' => ['VenueController', 'show', ['id']],
    'venues/add' => ['VenueController', 'add',],
    'venues/delete' => ['VenueController', 'delete',],

];
