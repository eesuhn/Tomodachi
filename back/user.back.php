<?php
    class User {
        private $userName;
        private $userEmail;
        private $userPwd;

        public function __construct() {
            $this->userName = "";
            $this->userEmail = "";
            $this->userPwd = "";
        }
        
        public function setAccountDetails($userName, $userEmail, $userPwd) {
            $this->userName = $userName;
            $this->userEmail = $userEmail;
            $this->userPwd = $userPwd;
        }

        public function checkEmail() {
            $sql = "SELECT userEmail FROM user WHERE userEmail = :email";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':email', $this->userEmail);

            $stmt->execute(array(
                ':email' => $this->userEmail
            ));

            if ($stmt->rowCount()>0) {
                echo 
                "<script>alert('Email is already in use'); 
                window.location.href='../front/login.front.php';</script>";
            } else {
                $this->registerUser();
            }
        }

        public function registerUser() {
            $sql = "INSERT INTO user (userName, userEmail, userPwd) VALUES (:value1, :value2, :value3)";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $this->userName);
            $stmt->bindParam(':value2', $this->userEmail);
            $stmt->bindParam(':value3', $this->userPwd);

            if ($stmt->execute(
                array(
                    ':value1' => $this->userName,
                    ':value2' => $this->userEmail,
                    ':value3' => $this->userPwd))) {
                        echo 
                        "<script>alert('Account Created'); 
                        window.location.href='../front/login.front.php';</script>";
                } else {
                    $error = $stmt->errorInfo();
                    echo "Error: " . $error[2];
                }
        }
            

        public function loginUser($userEmail, $userPwd) {
            $sql = "SELECT * FROM user WHERE userEmail = :email AND userPwd = :pwd";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':email', $userEmail);
            $stmt->bindParam(':pwd', $userPwd);

            $stmt->execute(array(
                ':email' => $userEmail,
                ':pwd' => $userPwd
            ));

            if ($stmt->rowCount()>0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['userName'] = $row['userName'];
                    $_SESSION['userEmail'] = $row['userEmail'];
                    $_SESSION['userPwd'] = $row['userPwd'];

                    echo 
                    "<script>alert('You are now logged in'); 
                    window.location.href='../front/dashboard.front.php'</script>";
                }
            } else {
                echo 
                "<script>alert('No account has been found'); 
                window.location.href='../front/login.front.php'</script>";
            }
        }
    }
?>