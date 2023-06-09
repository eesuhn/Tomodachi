<?php
    class Food {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getFoodDetails ($userID) {
            $sql = 
            "SELECT food.foodName, food.foodImg, food_inventory.userID, food_inventory.foodID, food_inventory.foodNum FROM food 
            INNER JOIN food_inventory ON food.foodID = food_inventory.foodID WHERE food_inventory.userID = :userID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);

            $stmt->execute(array(
                    ':userID' => $userID));

            return $stmt;
        }

        public function increaseFood ($foodInID, $foodNum) {
            $sql = "UPDATE food_inventory SET foodNum = foodNum + :value1 WHERE foodInID = :value2";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodNum);
            $stmt->bindParam(':value2', $foodInID);

            $stmt->execute(array(
                    ':value1' => $foodNum,
                    ':value2' => $foodInID));
        }

        // decrease foodNum by 1
        public function decreaseFood_one ($userID, $foodID) {
            $sql = "UPDATE food_inventory SET foodNum = CASE WHEN foodNum > 0 THEN foodNum - 1 ELSE 0 END WHERE userID = :value1 AND foodID = :value2";
        
            $stmt = $this->db->connect()->prepare($sql);
        
            $stmt->bindParam(':value1', $userID);
            $stmt->bindParam(':value2', $foodID);
        
            $stmt->execute(array(
                ':value1' => $userID,
                ':value2' => $foodID));
        }

        public function getShopFoods($userID) {
            // get data on foods sold and quantity owned by users
            $sql = "SELECT food.*, food_inventory.foodNum
                    FROM food
                    LEFT JOIN food_inventory ON food.foodID = food_inventory.foodID AND food_inventory.userID = ?
                    ORDER BY food.foodPrice ASC";

            $stmt = $this->db->connect()->prepare($sql);
            
            $stmt->execute([$userID]);
            $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $foods;
        }

        public function purchaseFood($userID, $foodID) {
            // set the quantity to purchase to 1 by default
            $quantity = 1;
        
            // check if the food exists in the food table
            $sql = "SELECT * FROM food WHERE foodID = ?";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute([$foodID]);
            $food = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // check if the user already has this food in their inventory
            $sql = "SELECT * FROM food_inventory WHERE userID = ? AND foodID = ?";
            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute([$userID, $foodID]);
            $inventory = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($inventory) {
                // user already has this food in their inventory, increase the quantity by 1
                $quantity = $inventory['foodNum'] + 1;
                $sql = "UPDATE food_inventory SET foodNum = ? WHERE userID = ? AND foodID = ?";

                $stmt = $this->db->connect()->prepare($sql);
                $stmt->execute([$quantity, $userID, $foodID]);
                
            } else {
                // user does not have this food in their inventory, insert a new row
                $sql = "INSERT INTO food_inventory (userID, foodID, foodNum) VALUES (?, ?, ?)";

                $stmt = $this->db->connect()->prepare($sql);
                $stmt->execute([$userID, $foodID, $quantity]);
            }
        }
    }
?>