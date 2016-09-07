<?php
    class Place
    {
        private $placeName;
        private $placeYear;

        function __construct($placeName, $placeYear)
        {
            $this->placeName = $placeName;
            $this->placeYear = $placeYear;
        }

        function setName($new_name)
        {
            $this->placeName = (string) $new_name;
        }

        function getName()
        {
            return $this->placeName;
        }

        function getYear()
        {
            return $this->placeYear;
        }

        function savePlace()
        {
            array_push($_SESSION['list_of_places'], $this);
        }

        static function getPlaces()
        {
            return $_SESSION['list_of_places'];
        }

        static function deletePlaces()
        {
            $_SESSION['list_of_places'] = array();
        }
    }
?>
