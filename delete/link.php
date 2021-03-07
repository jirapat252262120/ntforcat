<?php
    include_once('../function/func.php');
    $call_class2 = new func();

    $main_id = $_GET['main_id'];
    $main_name = $_GET['name_main'];

    if(isset($_GET['del_id'])){
        // code under me
        
        $del_id2 = $_GET['del_id'];

        //echo$del_id2;
        $sql2 = $call_class2->delLink($del_id2);
        if($sql2){
            ?>
            <script>
                window.location.href = '../index.php?p=view_link&id=<?php echo $main_id;?>&name=<?php echo $main_name;?>&del_link=success';
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