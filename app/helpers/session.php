<?php
session_start();

function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    } else {
        return false;
    }
}

// Simple page redirect
function redirect($location){
    header('location: ' . URLROOT . '/' . $location);
}
