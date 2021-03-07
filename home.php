<?php
                include_once('modal/modal_addCategory.php');
                include_once('modal/modal_editCategory.php');

                if(isset($del)){
                    echo $del;
                }

?>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide mb-3" data-bs-ride="carousel">
                                    
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="img/header_index/img1.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="img/header_index/img2.png" class="d-block w-100" alt="...">
                                        </div>
                                        
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    </div>

                                    <!-- หมวดหมู่  -->
                                    <div class="card min-vh-100">
                                            <div class="card-header d-flex d-inline justify-content-between" id="bgsabuytar">
                                                <h4 class="d-flex mb-0 align-self-center" id="textcolor"><b>เลือกหมวดหมู่เพื่อดูลิงค์ <i class="fas fa-paperclip text-success"></i></b></h4>
                                                <?php
                                                    if(!isset($_SESSION['idS'])){
                                                    ?>
                                                        <div></div>
                                                <?php
                                                    }
                                                    if(isset($_SESSION['idS'])){
                                                ?>
                                                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategory">เพิ่มหมวดหมู่ใหม่ <i class="fas fa-plus-square ms-1"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="card-body border border-2">
                                                

                                                <div class="row">
                                                    <?php

                                                        $qry = $call_class->slCategory();
                                                        while($row=mysqli_fetch_array($qry))
                                                        {
                                                        ?>
                                                            
                                                        
                                                    
                                                        <div class="col-xl-4 ">
                                                            <!-- Card หมวดหมู่ -->
                                                            <div class="card mb-3">
                                                            <div class="card-body rounded-3 <?php echo $row['color_category'];?>">

                                                                <h5 class="card-title text-light"><?php echo $row['name_category'];?></h5>

                                                                <a href="index.php?p=view_link&id=<?php echo $row['main_id'];?>&name=<?php echo  $row['name_category']; ?>" class="btn btn-light w-100 my-2 " id="linkCaterogy"> ดูลิงค์ภายในหมวดหมู่ <i class="fas fa-angle-double-right"></i></a>

                                                                <!-- ลบ / แก้ไข -->
                                                                <?php
                                                                    if(isset($_SESSION['idS'])){
                                                                        ?>
                                                                                <div class="d-flex justify-content-end">
                                                                                    <a href="index.php?p=home&editCate_id=<?php echo $row['main_id']; ?>" class="btn btn-warning border border-2 border-dark"> แก้ไข <i class="fas fa-edit"></i></a>

                                                                                    <a href="index.php?p=home&wait_del=<?php echo $row['main_id']; ?>" id="del_id" class="btn btn-danger border border-2 border-dark ms-1"> ลบ <i class="fas fa-trash-alt"></i></a>

                                                                                </div>

                                                                <?php
                                                                    }

                                                                ?>


                                                            </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
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


        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

         <!-- sweetalert2 -->
        <script src="sweetalert/sweetalert2.all.min.js"></script>

        <script>
                $(document).ready(function(){
                    <?php
                            if(isset($_GET['editCate_id'])){
                                    ?>
                                    $("#editCategory").modal('show');    

                        <?php
                            }
                            if(isset($_GET['wait_del'])){
                                $del_id = $_GET['wait_del'];
                                    ?>
                                            Swal.fire({
                                            title: 'ต้องลบหมวดหมู่หรือไม่?',
                                            text: "คุณกำลังลบหมวดหมู่ การลบหมวดหมู่หลัก จะทำการลบ Link ทั้งหมดในหมวดหมู่นี้ด้วย!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            cancelButtonText: 'ไม่ต้องการ',
                                            confirmButtonText: 'ต้องการลบ!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = 'delete/category.php?del_id=<?php echo$del_id;?>';
                                                    
                                                
                                                }
                                            });

                         <?php          
                            }
                        ?>
                

                        var color = $("#select_color").val();
                        $("#select_color").change(function(){
                            if($(this).val() == "bg-primary"){
                                $("#exColor").addClass("bg-primary text-light");
                                
                                $("#exColor").removeClass("bg-secondary");
                                $("#exColor").removeClass("bg-success");
                                $("#exColor").removeClass("bg-danger");
                                $("#exColor").removeClass("bg-warning");
                                $("#exColor").removeClass("bg-info");
                                $("#exColor").removeClass("bg-dark");
                                $("#exColor").removeClass("text-dark");
                            }
                            if($(this).val() == "bg-secondary"){
                                $("#exColor").addClass("bg-secondary text-light");

                                $("#exColor").removeClass("bg-primary");
                                $("#exColor").removeClass("bg-success");
                                $("#exColor").removeClass("bg-danger");
                                $("#exColor").removeClass("bg-warning");
                                $("#exColor").removeClass("bg-info");
                                $("#exColor").removeClass("bg-dark");
                                $("#exColor").removeClass("text-dark");
                            }
                            if($(this).val() == "bg-success"){
                                $("#exColor").addClass("bg-success text-light");

                                $("#exColor").removeClass("bg-secondary");
                                $("#exColor").removeClass("bg-primary");
                                $("#exColor").removeClass("bg-danger");
                                $("#exColor").removeClass("bg-warning");
                                $("#exColor").removeClass("bg-info");
                                $("#exColor").removeClass("bg-dark");
                                $("#exColor").removeClass("text-dark");
                            }
                            if($(this).val() == "bg-danger"){
                                $("#exColor").addClass("bg-danger text-light");

                                $("#exColor").removeClass("bg-secondary");
                                $("#exColor").removeClass("bg-success");
                                $("#exColor").removeClass("bg-primary");
                                $("#exColor").removeClass("bg-warning");
                                $("#exColor").removeClass("bg-info");
                                $("#exColor").removeClass("bg-dark");
                                $("#exColor").removeClass("text-dark");
                            }
                            if($(this).val() == "bg-warning"){
                                $("#exColor").addClass("bg-warning text-dark");

                                $("#exColor").removeClass("bg-secondary");
                                $("#exColor").removeClass("bg-success");
                                $("#exColor").removeClass("bg-danger");
                                $("#exColor").removeClass("bg-primary");
                                $("#exColor").removeClass("bg-info");
                                $("#exColor").removeClass("bg-dark");
                                $("#exColor").removeClass("text-light");
                            }
                            if($(this).val() == "bg-info"){
                                $("#exColor").addClass("bg-info");

                                $("#exColor").removeClass("bg-secondary");
                                $("#exColor").removeClass("bg-success");
                                $("#exColor").removeClass("bg-danger");
                                $("#exColor").removeClass("bg-warning");
                                $("#exColor").removeClass("bg-primary");
                                $("#exColor").removeClass("bg-dark");
                            }
                            if($(this).val() == "bg-dark"){
                                $("#exColor").addClass("bg-dark text-light");

                                $("#exColor").removeClass("bg-secondary");
                                $("#exColor").removeClass("bg-success");
                                $("#exColor").removeClass("bg-danger");
                                $("#exColor").removeClass("bg-warning");
                                $("#exColor").removeClass("bg-info");
                                $("#exColor").removeClass("bg-primary");
                                $("#exColor").removeClass("text-dark");
                                
                            }
                        });

            


                }); // ปิด ready


        </script>
        