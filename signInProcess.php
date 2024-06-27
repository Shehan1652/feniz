<?php

session_start();
include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

// echo($username);

if (empty($username)) {
    echo ("Please Enter Your Username");
} else if (empty($password)) {
    echo ("Please Enter Your Password");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '". $username. "' LIMIT 1");
     
    $num = $rs->num_rows;
    

    if ($num == 1) {

        $row = $rs->fetch_assoc();
        $hash_password = $row["password"]; // fetch the hashed password from the database


        if (password_verify($password, $hash_password)) {

            $rs1 = Database::search("SELECT * FROM `user` WHERE `username` = '". $username. "' ");

            $d = $rs1->fetch_assoc();
            
            if ($d["status"] == 1) {
                // Active User
                echo ("Success");
    
                $_SESSION["u"] = $d;
    
                if ($rememberme == "true") {
                    // Set Cookie
                    setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                    setcookie("password", $password, time() + (60 * 60 * 24 * 365));
                } else {
                    // Destroy Cookie
                    setcookie("username", "", -1);
                    setcookie("password", "", -1);
                }
            } else {
                // Inactive User
                echo ("Inactive User");
            }

        } else {
            echo ("Invaild Password");
        }



        
    } else {
        echo ("Invalid Username OR Password");
    }
}