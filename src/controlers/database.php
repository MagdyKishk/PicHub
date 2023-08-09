<?php 

class db_manager {

    public function create_new_user($f_name, $l_name, $_email, $password) {
        // Assuming you have established a database connection
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "magdy.kishk";
        $db_name = "pichub";
        $db_port = 3306;

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sanitize and escape input data to prevent SQL injection
        $f_name = $conn->real_escape_string($f_name);
        $l_name = $conn->real_escape_string($l_name);
        $_email = $conn->real_escape_string(strtolower($_email));
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert data into users table
        $sql = "INSERT INTO users (f_name, l_name, email, pass_word) VALUES ('$f_name', '$l_name', '$_email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: /account");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    public function get_user_by_email_and_password($_email, $password) {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "magdy.kishk";
        $db_name = "pichub";
        $db_port = 3306;

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $_email = $conn->real_escape_string(strtolower($_email));

        // SQL query to retrieve user data by email
        $sql = "SELECT * FROM users WHERE email = '$_email'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['pass_word'])) {
                return $user;
            }
        } else {
            $conn->close();
            return null;
        }
    }
    public function refresh_user_data() {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "magdy.kishk";
        $db_name = "pichub";
        $db_port = 3306;

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        @session_start();
        $id = $_SESSION["user_data"]["user_id"];

        // SQL query to retrieve user data by email
        $sql = "SELECT * FROM users WHERE user_id = '$id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $conn->close();
            $user_data = $result->fetch_assoc();

            $profile_pic_state = $user_data["profile_pic"]? true: false;
            $user_data["profile_pic"] = $user_data["profile_pic"]? $user_data["profile_pic"] : '.\src\media\profile\profile_pic\default_profile_pic.jpg';
            $profile_banner_state = $user_data["profile_banner"]? true: false;
            $user_data["profile_banner"] = $user_data["profile_banner"]? $user_data["profile_banner"] : '.\src\media\profile\profile_banner\default_banner_pic.jpg';

            $_SESSION["user_data"] = array_replace($_SESSION["user_data"],
                                      [
                                      "username"             => ($user_data["f_name"] . " " . $user_data["l_name"]),
                                      "profile_pic"          => $user_data["profile_pic"],
                                      "profile_pic_state"    => $profile_pic_state,
                                      "profile_banner_state" => $profile_banner_state,
                                      "profile_banner"       => $user_data["profile_banner"],
                                      "description"          => $user_data["description"],
                                      "facebook"             => $user_data["facebook"],
                                      "instagram"            => $user_data["instagram"],
                                      "twitter"              => $user_data["twitter"],
                                      "email"                => $user_data["email"]]);
        } else {
            $conn->close();
            return null;
        }
    }
}