<?php
    if(isset($_POST['logout']) == "ok"){
        session_start();
        session_destroy();

        echo"pass";

    }else{
        echo"fail";
    }




?>