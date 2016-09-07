<?php
    class Place
    {
        private $placeName;

        function __construct($placeName)
        {
            $this->placeName = $placeName;
        }

        function setName($new_name)
        {
            $this->placeName = (string) $new_name;
        }

        function getName()
        {
            return $this->placeName;
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
