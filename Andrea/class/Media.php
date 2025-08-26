<?php 
    abstract class Media {
        protected string $name;
        protected int $rating;
        protected bool $maddieStatus;
        protected bool $andreaStatus;

        public function __construct(string $name, int $rating, bool $maddieStatus, bool $andreaStatus)
        {
            $this->name = $name;
            $this->rating = $rating;
            $this->maddieStatus = $maddieStatus;
            $this->andreaStatus = $andreaStatus;
        }

        abstract protected function getTypeCell(): string;
        abstract protected function getLengthCell(): string;
        abstract protected function getRatingCell(): string;

        private function getStatus(bool $status): string {
            if ($status) {
                return "Yes";
            }
            return "No";
        }

        private function getMaddieStatus(): string {
            return $this->getStatus($this->maddieStatus);
        }

        private function getAndreaStatus(): string {
            return $this->getStatus($this->andreaStatus);
        }

        public function generateRow(): string {
            return "<tr>
                        <td>$this->name</td>
                        <td>" . $this->getTypeCell() . "</td>
                        <td>" . $this->getLengthCell() . "</td>
                        <td>" . $this->getRatingCell() . "</td>
                        <td>" . $this->getMaddieStatus() . "</td>
                        <td>" . $this->getAndreaStatus() . "</td>
                    </tr>";
        }
    }
?>