<?php 
    abstract class Show extends Media{
        protected int $minutes;
        
        public function __construct(string $name, int $rating, bool $maddieStatus, bool $andreaStatus, int $minutes,)
        {
            parent::__construct($name, $rating, $maddieStatus, $andreaStatus);
            $this->minutes = $minutes;      //length in IMDb
        }

        protected function getRatingCell(): string
        {
            return $this->rating . "% on IMDB";
        }
    }
?>