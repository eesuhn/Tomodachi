<?php
    class Habit {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function addHabit($userID, $habitTitle) {
            $sql = "INSERT INTO habit (userID, difficultyID, habitTitle, habitDesc) VALUES (:userID, 1, :habitTitle, '')";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':habitTitle', $habitTitle);

            $stmt->execute();
        }
    }
?>