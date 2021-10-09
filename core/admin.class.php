<?php
    include_once 'db.class.php';
    class Admin extends DB{

        function login($username,$password){
            if (DB::num_row("SELECT id FROM administrator WHERE username = ? AND password = ? ", [$username,$password])) {
                return true;
            }
            else{
                return false;
            }
        }

        function check_username($username){
            if (DB::num_row("SELECT id FROM administrator WHERE username = ? ", [$username])) {
                return true;
            }
            else{
                return false;
            }
        }

        function fetch_admin($username){
            $admin = DB::fetch("SELECT id FROM administrator WHERE username = ? OR id = ? ", [$username,$username]);
            if($admin){
                return $admin;
            }
            else{
                return false;
            }
        }
    }
?>