<?php
    include_once('../function/func.php');
    $call_class = new func();
    



    if(isset($_POST['name_cat'])){
        $selectColor = $_POST['select_color'];
        $nameCategory = $_POST['name_cat'];

        if($nameCategory == ""){
            echo"empty";
        }else{
            $sql = $call_class->addCategory($selectColor, $nameCategory);
                if($sql){
                    echo"success  ".$selectColor;
                }else{
                    echo"Can't SQL";
                }
            
        }


        
    }
    if(!isset($_POST['name_cat'])){
                header("Location: ../index.php?p=");
        }


?>