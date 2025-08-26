<?php 
    class Movie extends Show {
        protected function getTypeCell(): string {
            return "Movie";
        }

        protected function getLengthCell(): string
        {
            return $this->minutes . " minutes";
        }
    }
?>