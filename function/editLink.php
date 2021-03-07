<?php

    include_once('func.php');
    $call_class2 = new func();
    



    if(isset($_POST['link_address'])){
        $link_address = $_POST['link_address'];
        $link_name = $_POST['link_name'];
        $link_id = $_POST['linkID'];

        // echo $link_address." ".$link_name." ".$link_id;
        $sqledit4link = $call_class2->edit4link($link_address, $link_name, $link_id);
        if($sqledit4link){
            echo"Edited";

        }else{
            echo"Can't SQL";
        }
            
        


        
    }
    if(!isset($_POST['link_address'])){
                header("Location: ../index.php?p=");
        }



?>