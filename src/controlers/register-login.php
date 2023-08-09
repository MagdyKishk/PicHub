<?php

if (isset($_POST["submit-register"])) 
{

    if (isset($_POST["f_name"]) && isset($_POST["l_name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        require_once __DIR__ . '/database.php';

        $db = new db_manager;
        $db->create_new_user($_POST["f_name"],
                             $_POST["l_name"],
                             $_POST["email"],
                             $_POST["password"]);
        }
    } else if (isset($_POST["submit-login"])) {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
        require_once __DIR__ . '/database.php';

        $db = new db_manager;
        
        $user_data = $db->get_user_by_email_and_password($_POST["email"], $_POST["password"]);
        
        if ($user_data != NULL) {
            @session_start();

            $profile_pic_state = $user_data["profile_pic"]? true: false;
            $user_data["profile_pic"] = $user_data["profile_pic"]? $user_data["profile_pic"] : '.\src\media\profile\profile_pic\default_profile_pic.jpg';
            $profile_banner_state = $user_data["profile_banner"]? true: false;
            $user_data["profile_banner"] = $user_data["profile_banner"]? $user_data["profile_banner"] : '.\src\media\profile\profile_banner\default_banner_pic.jpg';

            $_SESSION["user_data"] = ["logedin"              => true,
                                      "user_id"              => $user_data["user_id"],
                                      "username"             => ($user_data["f_name"] . " " . $user_data["l_name"]),
                                      "profile_pic"          => $user_data["profile_pic"],
                                      "profile_pic_state"    => $profile_pic_state,
                                      "profile_banner_state" => $profile_banner_state,
                                      "profile_banner"       => $user_data["profile_banner"],
                                      "description"          => $user_data["description"],
                                      "facebook"             => $user_data["facebook"],
                                      "instagram"            => $user_data["instagram"],
                                      "twitter"              => $user_data["twitter"],
                                      "email"                => $user_data["email"]];
            header("location: /user");
            exit;
        }
    }
}