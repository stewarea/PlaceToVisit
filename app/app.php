<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/place.php";

    session_start();

    if (empty($_SESSION['list_of_places'])) {
        $_SESSION['list_of_places'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('places.html.twig', array('places' => Place::getPlaces()));
    });

    $app->post("/places", function() use ($app) {
        $place = new Place($_POST['placeName'],$_POST['placeYear']);
        $place->savePlace();
        return $app['twig']->render('new_place.html.twig', array('newplace' => $place));
    });

    $app->post("/clear_places", function() use ($app) {
            Place::deletePlaces();
            return $app['twig']->render('places.html.twig');
    });


    return $app;
?>
