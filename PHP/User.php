
<?php

class User{


    public function _constructor(){

    }

    public function register($username, $email, $password_1, $password_2, $errors, $db){

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($username)) { array_push($errors, "Username is a required filed"); }
        if (empty($email)) { array_push($errors, "Email is a required filed"); }
        if (empty($password_1)) { array_push($errors, "Password is a required filed"); }
        if ($password_1 != $password_2) {
            array_push($errors, "Your password you entered don't match");
        }

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
            }
        }

        return $errors;
 
    }

    public function login($username, $password, $db,$errors){

        // check if username field is empty
        if (empty($username)) {
            array_push($errors, "Username is a required failed");
        }
        // check if password field is empty
        if (empty($password)) {
            array_push($errors, "Password is a required failed");
        }

        // check if the array is empty of errors
        if (count($errors) == 0) {
            
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            
            return mysqli_num_rows($results);
        }

        return 0;
        
    }

}


?>