<?php
    class Level {
        private $db;
        private $userID;
        private $currency;
        private $pet;

        public function __construct() {
            $this->db = new Database;
            $this->userID = $_SESSION['userID'];
            $this->currency = new Currency;
            $this->pet = new Pet;
        }

        public function habitReward($difficultyID) {
            /*
                get currencyReward, XPReward from difficulty table
            */
            $sql = "SELECT currencyReward, XPReward FROM difficulty WHERE difficultyID = :difficultyID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':difficultyID', $difficultyID);

            $stmt->execute(array(
                ':difficultyID' => $difficultyID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // store currencyReward, XPReward in variables
            $currencyReward = $result['currencyReward'];
            $XPReward = $result['XPReward'];

            // increase currency
            $this->currency->increaseCurrency($this->userID, $currencyReward);

            // get equipped petID
            $petData = $this->pet->getEquippedPet($this->userID);
            $petID = $petData['petID'];

            // increase petXP
            $this->pet->increaseXP($this->userID, $petID, $XPReward);
        }

        public function habitPenalize($difficultyID) {
            /*
                get healthPenalize, currencyPenalize from difficulty table
            */
            $sql = "SELECT healthPenalize, currencyPenalize FROM difficulty WHERE difficultyID = :difficultyID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':difficultyID', $difficultyID);

            $stmt->execute(array(
                ':difficultyID' => $difficultyID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // store healthPenalize, currencyPenalize in variables
            $healthPenalize = $result['healthPenalize'];
            $currencyPenalize = $result['currencyPenalize'];

            // get equipped petID
            $petData = $this->pet->getEquippedPet($this->userID);
            $petID = $petData['petID'];

            // decrease health
            $this->pet->decreaseHealth($this->userID, $petID, $healthPenalize);

            // decrease currency
            $this->currency->decreaseCurrency($this->userID, $currencyPenalize);
        }
    }
?>