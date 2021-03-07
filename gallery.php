<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<?php
    include_once('modal/modal_gallery.php');
    include_once('function/func.php');
    $call_class = new func();

?>

<div class="card min-vh-100">
    <div class="card-header d-flex d-inline justify-content-between" id="bgsabuytar">
    <!-- หัว -->
        <h4 class="my-0 fw-bold d-flex align-items-center"><i class="far fa-images text-success me-2"></i>Gallery Images | เด็กฝึกงาน ปี 2564 </h4>


        <?php
        if(isset($_SESSION['idS'])){
            ?>
            <a href="#" class="btn btn-success fw-bold" id="modal-pic" data-bs-toggle="modal" data-bs-target="#gallery">เพิ่มรูปภาพ <i class="fas fa-plus-circle"></i></a>
    <?php
        }
        if(!isset($_SESSION['idS'])){
            ?>
            <div></div>
    <?php
        }
        ?>


        
    </div>

    <div class="card-body  border border-2"> 
    <!--body  -->
        <?php
        $selectPic = $call_class->selectPicGallery();
        $i = 1 ;
        while($fetch = mysqli_fetch_array($selectPic)){
        ?>
        <div class="w-100 d-flex justify-content-center">
                <div class="w-50">
                        <img class="w-100 border border-5 border-secondary mb-2" src="img/gallery/<?php echo $fetch['img_name'];?>" alt="">
                        <div class="w-100 d-flex justify-content-end text-muted"><?php echo $fetch['date_time']; ?></div>
                </div>
        </div>

        
        <p><?php echo $i."."." ".$fetch['img_text']?></p>
        <hr>

        <?php
        $i++;
        }
        
        ?>
        


    

    </div>
</div>



<script>
    $(document).ready(function(){
        $("#filePic").on('blur', function(){
            if($(this).val() == ""){
                
            }else{
                $(this).addClass("border border-3 border-success");
            }
        });

        $("#textPic").click(function(){

                $(this).removeClass("border border-3 border-success");
                

                $(this).addClass("border border-3 border-success");
            });
    });
</script>

