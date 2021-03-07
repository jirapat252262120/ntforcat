<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- sweetalert2 -->
    <script src="sweetalert/sweetalert2.all.min.js"></script>

<?php
   include_once('modal/modal_addLink.php');
   include_once('modal/modal_editLink.php');

    $idmain = $_GET['id'];
    $namemain = $_GET['name'];
    

?>
<div class="card min-vh-100">
    <div class="card-header d-flex justify-content-between align-items-center" id="bgsabuytar">
    <!-- หัว -->
        <div><h4 class="my-0 fw-bold d-flex d-inline">ลิงค์ หมวดหมู่ : <p class="my-0 ms-2 text-success"><?php echo " ".$namemain; ?></p></h4></div>
        <?php
                                                                    if(isset($_SESSION['idS'])){
                                                                        ?>
                                                                    <div>
                                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLink">เพิ่มลิงค์ใหม่ <i class="fas fa-plus-square"></i></button>
                                                                    </div>
                                                                    <?php
                                                                    }
                                                                    ?>

    </div>

    <div class="card-body  border border-2">
    <!--body  -->
    <div  id="scroll_table">
    <table class="table table-striped table-hover border border-2 w-100">
            <thead class ="alert alert-primary">
                    <tr>
                            <th>#</th>
                            <th>ชื่อของลิงค์</th>
                            <th class="text-center">Link</th>
                            <?php
                                    if(isset($_SESSION['idS'])){
                                ?>
                                                <th class="text-center">จัดการ</th>
                               
                            <?php
                                }
                                ?>
                    </tr>
            </thead>
            <tbody class="">
                                
                    <?php
                        $sql = $call_class->slLink($idmain);
                        $i = 1;
                            $rows = mysqli_num_rows($sql);
                        if($rows > 0){
                            while($fetch = mysqli_fetch_array($sql)){
                            $id_link = $fetch['link_id'];
                        ?>
                            <tr>
                            <td><p class="my-0"><?php echo$i;?></p></td>
                            <td><p class="my-0"><?php echo$fetch['link_name'];?></p></td>

                            <td>
                            
                            <a class="btn btn-success w-100 col" href="<?php echo$fetch['link_address'];?>" target="_blank">เปิดลิงค์ <i class="fas fa-link"></i></a>
                            
                            </td>
                            <?php
                                    if(isset($_SESSION['idS'])){
                                        $main_id = $_GET['id'];
                                        $main_name = $_GET['name'];
                                ?>
                                                <td class="text-center">
                                                <a id="edit_btn" href="index.php?p=view_link&id=<?php echo $main_id; ?>&name=<?php echo $main_name; ?>&link_id=<?php echo$fetch['link_id'];?>&edit=link" class="btn btn-warning">แก้ไข <i class="far fa-edit"></i></a>

                                                <a id="del_link" href="index.php?p=view_link&id=<?php echo $main_id; ?>&name=<?php echo $main_name; ?>&del_id=<?php echo$fetch['link_id'];?>" class="btn btn-danger">ลบ <i class="fas fa-trash-alt"></i></a>
                                                
                                                
                                                </td>
                               
                            <?php
                                }
                                ?>


                            </tr>
                        <?php
                        $i++;
                            }
                        }else{
                        ?>
                            <tr class="alert alert-danger">
                                    <td colspan="4" class = "text-center">
                                        <h3 class = "p-5 fw-bold" id="textcolor1">ยังไม่มีข้อมูลของลิงค์ <i class="fas fa-link text-danger"></i></h3>
                                    </td>
                        
                            </tr>


                    <?php
                        }
                        ?>
                        
                        
                    
            </tbody>
    </table>
    </div>



    </div>
</div>


<!-- ข้อความแจ้ง การใช้งาน-->
<div class=" mt-3">
 <div class="alert alert-success border-2 border-success" role="alert">
 <h4 class="alert-heading"> <b> แนะนำการใช้งาน!</b></h4>
 <p>การเพิ่มหมวดหมู่ใหม่ จำเป็นต้องมีรหัสผู้ใช้งาน รหัสผู้ใช้งานสามารถ เพิ่ม ลบ และแก้ไขหมวดหมู่ รวมไปถึงลิงค์ของแต่ละหมวดหมู่ได้ กรณีที่ท่านอยากแก้ไขข้อมูลกรุณาติดต่อผู้ที่มีรหัสผู้ใช้งานเพื่อเข้าสู่ระบบ หรือ กรณีที่อยากได้รหัสผู้ใช้งานใหม่ให้ติดต่อทางผู้พัฒนา</p>
 <hr class="border border-1 border-success">
 <p class="mb-0  fs-6"> <b class="text-danger" >* </b> <b>แนะนำเพิ่มเติม : </b> สำหรับการแจ้งปัญหาการใช้งาน หรือ ขอความช่วยเหลือการใช้งาน เพื่อการติดต่อที่รวดเร็ว ควร Add Line บอท ของเว็บแอปพลิเคชันไว้</p>
 </div>
 </div>

<script>
    $(document).ready(function(){
        <?php
            if(isset($_GET['edit'])){
                ?>
                    $("#editLink").modal('show');
            <?php
            }
        ?>

        <?php
        if(isset($_GET['del_id'])){
            ?>
                            Swal.fire({
                                            title: 'ต้องลบลิงค์หรือไม่?',
                                            text: "คุณกำลังลบข้อมูลลิงค์ต้องการลบจริงหรือไม่!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            cancelButtonText: 'ไม่ต้องการ',
                                            confirmButtonText: 'ต้องการลบ!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                   
                                                    window.location.href = 'delete/link.php?del_id=<?php echo$_GET['del_id'];?>&main_id=<?php echo $main_id; ?>&name_main=<?php echo $main_name; ?>';
                                                
                                                }
                                            });

        <?php    
        }
        ?>
        
          <?php 
           
            if(isset($_GET['del_link']) =="success"){
                ?>
                Swal.fire({
                    icon: 'success',
                    title: 'ลบข้อมูลเรียบร้อยแล้ว',
                    text: 'ลบ "ลิงค์" เรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 1500
                    }).then(function(){
                        window.location.href = 'index.php?p=view_link&id=<?php echo $main_id; ?>&name=<?php echo $main_name;?>';
                    });

        <?php
            }
          ?>
            
            
        


    }); //ปิด ready

</script>