<?php
         include_once('func.php');
         $call_class = new func();

    if(isset($_POST['link_address'])){
        // echo"test";
        if($_POST['link_address'] == "" or $_POST['link_name'] == ""){
            echo "empty";
        }else{
            // echo"test";
            // echo $link_address." ".$link_address." ".$main_id;
            $link_address  = $_POST['link_address'];
            $link_name  = $_POST['link_name'];
            $main_id  = $_POST['mainID'];
            
            $sql = $call_class->insertLink($link_address, $link_name, $main_id);
            if($sql){
                    echo"insertOK";
            }else{
                    echo"Can't sql";
            }
            
            
        }


    }


    if(!isset($_POST['link_address'])){
                header("Location: ../index.php?p=");
        }



?>