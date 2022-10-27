<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],

    'concerts' => ['ConcertController', 'index',],
    'concerts/edit' => ['ConcertController', 'edit', ['id']],
    'concerts/show' => ['ConcertController', 'show', ['id']],
    'concerts/add' => ['ConcertController', 'add',],
    'concerts/delete' => ['ConcertController', 'delete',],
    'concerts/wow' => ['ConcertController', 'wow', ['id']],

    'artists' => ['ArtistController', 'index',],
    'artists/edit' => ['ArtistController', 'edit', ['id']],
    'artists/show' => ['ArtistController', 'show', ['id']],
    'artists/add' => ['ArtistController', 'add',],
    'artists/delete' => ['ArtistController', 'delete',],
];
