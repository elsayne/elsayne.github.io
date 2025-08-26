<?php 
    class TvShow extends Show {
        private int $numOfEpisodes;

        public function __construct(string $name, int $rating, bool $maddieStatus, bool $andreaStatus, int $minutes, int $numOfEpisodes)
        {
            parent::__construct($name, $rating, $maddieStatus, $andreaStatus, $minutes);
            $this->numOfEpisodes = $numOfEpisodes;
        }

        protected function getTypeCell(): string {
            return "Tv Show";
        }

        protected function getLengthCell(): string
        {
            return $this->minutes . " minutes x " . $this->numOfEpisodes . " episodes";
        }
    }
?>