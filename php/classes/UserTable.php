<?php

require_once 'User.php';

class UserTable {
    private $link;
    
    public function __construct($connection) {
        $this->link = $connection;
    }

    public function insert($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $sql = "INSERT INTO users(email, password, role,  fname, lname, dob, location, gender) "
             . "VALUES (:email, :password, :role, :firstname, :lastname, :dob, :location, :gender)";

        $params = array(
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole(),
			'fname' => $user->getFirstName(),
            'lname' => $user->getLastName(),
            'dob' => $user->getDOB(),
			'location' => $user->getLocation(),
			'gender' => $user->getGender()
        );
		
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save user: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('users');
        
        return $id;
    }

    public function delete($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();
        if ($id == null) {
            throw new Exception("User id required");
        }
        $sql = "DELETE FROM users WHERE id = :id";
        $params = array('id' => $user->getId());
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete user: " . $errorInfo[2]);
        }
    }

    public function update($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();
        if ($id == null) {
            throw new Exception("User id required");
        }
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $params = array(
            'password' => $user->getPassword(),
            'id' => $user->getId()
        );
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not update user: " . $errorInfo[2]);
        }
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $email = $row['email'];
            $pwd = $row['password'];
            $role = $row['role'];
            $firstn = $row['fname'];
            $lastn = $row['lname'];
			$db = $row['dob'];
            $locat = $row['location'];
            $gender = $row['gender'];
            $user = new User($id, $email, $pwd, $role, $usern, $firstn, $lastn, $db, $locat, $gender);
        }
        return $user;
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = array('email' => $email);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $pwd = $row['password'];
            $role = $row['role'];
            $firstn = $row['fname'];
            $lastn = $row['lname'];
			$db = $row['dob'];
            $locat = $row['location'];
            $gender = $row['gender'];
            $user = new User($id, $email, $pwd, $role, $firstn, $lastn, $db, $locat, $gender);
        }
        return $user;
    }

    public function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve users: " . $errorInfo[2]);
        }

        $users = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $email = $row['email'];
            $pwd = $row['password'];
            $role = $row['role'];
            $firstn = $row['fname'];
            $lastn = $row['lname'];
			$db = $row['dob'];
            $locat = $row['location'];
            $gender = $row['gender'];
            $user = new User($id, $email, $pwd, $role, $firstn, $lastn, $db, $locat, $gender);
            $users[$id] = $user;

            $row = $stmt->fetch();
        }
        return $users;
    }
}
?>
