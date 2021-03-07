   
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- sweetalert2 -->
    <script src="../sweetalert/sweetalert2.all.min.js"></script>


<?php
    include_once('../function/func.php');
    $call_class = new func();


    if(isset($_POST) && $_POST['addImage'] == "add"){
        $textPic = $_POST['textPic'];
        
        $path = "../img/gallery/"; //โฟลเดอร์
        $temp = explode(".", $_FILES['pic']['name']); //แยกชื่อนามสกุลเป็น array
        $randomName = rand(1, 100000); //ซุ่มเลข
        $newName = round(microtime(true)).$randomName.".".$temp[1]; //ผสมชื่อใหม่กับนามสกุล
        $move_finish = move_uploaded_file($_FILES['pic']['tmp_name'], $path.$newName);

            if($move_finish){
                $insertPic = $call_class->addPic($textPic, $newName);
                if($insertPic){
                    ?>
                    <script>
                        $(document).ready(function(){
                            Swal.fire({
                            icon: 'success',
                            title: 'เพิ่มรูปภาพใหม่เรียบร้อยแล้ว',
                            showConfirmButton: false,
                            timer: 1500
                            }).then(function(){ 
                                window.location.href= '../index.php?p=gallery';
                            });
                        });
                            
                    </script>
                <?php
                }else{
                    echo"Can't Insert Picture in to Data base !";
                }

            }else{
                echo"Can't move file in to folder";
            }


    }else{

        header("Location: index.php?p=home");
    }



?>