<?php

    include_once('func.php');
    $call_class2 = new func();
    



    if(isset($_POST['name_cat'])){
        $selectColor = $_POST['select_color'];
        $nameCategory = $_POST['name_cat'];
        $main_id = $_POST['del_id'];
        // echo $nameCategory." ".$selectColor." ".$main_id;
        $sql2 = $call_class2->editCategory($nameCategory, $selectColor, $main_id);
        if($sql2){
            echo"succEss";

        }else{
            echo"Can't SQL";
        }
            
        


        
    }
    if(!isset($_POST['name_cat'])){
                header("Location: ../index.php?p=");
        }



?>