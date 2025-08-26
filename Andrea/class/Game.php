<?php 
    class Game extends Media {
        private float $hours;   

        public function __construct(string $name, int $rating, bool $maddieStatus, bool $andreaStatus, float $hours)
        {
            parent::__construct($name, $rating, $maddieStatus, $andreaStatus);
            $this->hours = $hours;          // -1 is for infinity in sandbox games, othewise based on HLTB "Main + Sides"
        }

        protected function getLengthCell(): string
        {
            if ($this->hours == -1) {
                return "∞";
            }
            return $this->hours . " hours";
        }

        protected function getTypeCell(): string
        {
            return "Game";
        }

        protected function getRatingCell(): string
        {
            return $this->rating . "% on Metacritic";
        }
    }
?>