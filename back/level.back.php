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

        public function feedReward($foodID) {
            /*
                get foodHealth, foodHapp from food table
            */
            $sql = "SELECT foodHealth, foodHapp FROM food WHERE foodID = :foodID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':foodID', $foodID);

            $stmt->execute(array(
                ':foodID' => $foodID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // store foodHealth, foodHapp in variables
            $foodHealth = $result['foodHealth'];
            $foodHapp = $result['foodHapp'];

            $petData = $this->pet->getEquippedPet($this->userID);
            $petID = $petData['petID'];

            // increase health
            $this->pet->increaseHealth($this->userID, $petID, $foodHealth);

            // increase happiness
            $this->pet->increaseHapp($this->userID, $petID, $foodHapp);
        }

        public function taskReward() {
            $currencyReward = 10;
            $XPReward = 10;

            // get equipped petID
            $petData = $this->pet->getEquippedPet($this->userID);
            $petID = $petData['petID'];

            // increase currency
            $this->currency->increaseCurrency($this->userID, $currencyReward);

            // increase petXP
            $this->pet->increaseXP($this->userID, $petID, $XPReward);
        }

        /* 
            increase petLevel by 1 when petXP >= 100
            decrease petXP by 100
        */
        public function increaseLevel($userID, $petID) {
            $sql = "UPDATE pet_inventory SET petLevel = petLevel + 1, petXP = petXP - 100 WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute(array(
                ':userID' => $userID,
                ':petID' => $petID));
        }

        /*
            call increaseLevel() when petXP >= 100
        */
        public function checkXP($userID, $petID) {
            $sql = "SELECT petXP FROM pet_inventory WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute(array(
                ':userID' => $userID,
                ':petID' => $petID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $petXP = $result['petXP'];

            if ($petXP >= 100) {
                $this->increaseLevel($userID, $petID);
            }
        }

        /*
            call increaseHeath if petHealthCur < petHealthTol
            health remainder from petHealthTol - petHealthCur is not added to petHealthCur
        */
        public function checkHealth($userID, $petID, $foodHealth) {
            $sql = "SELECT petHealthCur, petHealthTol FROM pet_inventory WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute(array(
                ':userID' => $userID,
                ':petID' => $petID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $petHealthCur = $result['petHealthCur'];
            $petHealthTol = $result['petHealthTol'];

            if ($petHealthCur < $petHealthTol) {
                $this->pet->increaseHealth($userID, $petID, $foodHealth);
            }
        }
    }
?>