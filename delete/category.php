<?php
    include_once('../function/func.php');
    $call_class2 = new func();


    if(isset($_GET['del_id'])){
        // code under me
        
        $del_id2 = $_GET['del_id'];
        echo$del_id2;
        $sql2 = $call_class2->delCategory($del_id2);
        if($sql2){
            ?>
            <script>
                window.location.href = '../index.php?p=home&del=success';
            </script>
    <?php
        }else{
            echo"no sql";
        }
        
    }else{
        ?>
        <script>
            window.location.href = '../index.php?p=';
        </script>
<?php
    }

?>