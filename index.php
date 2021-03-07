<?php
    session_start();
    include_once('function/func.php');
    include_once('modal/modal_login.php');
    $call_class = new func();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon/icon.png" type="image/x-icon">

    <!-- CSS Myself -->
    <link rel="stylesheet" href="css/myself.css">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <title><?php echo Title_web;?></title>
</head>
<body style="font-family: 'Sarabun', sans-serif;" class="m-0 p-0" id="bg_web">

    <!-- header -->
    <section class="vw-min-100 bg-primary">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-6 d-flex align-items-center"  id="logo"> 
                <!-- LOGO -->
                    
                    <h2 class="me-2 text-warning"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logo คลิกเพื่อกลับหน้าแรก"> <b>NT</b></h2> <p class="align-self-end text-light border-bottom border-3 border-warning text-break" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logo คลิกเพื่อกลับหน้าแรก">เว็บแอปพลิเคชันเพื่อการจัดการลิงค์ของเว็บไซต์ภายในสำนักงาน</p>
                    
                </div>

                <!-- Login -->
                <div class="col-xl-4 text-end pt-2 pb-2 d-flex d-inline justify-content-end">
                    <?php
                        if(isset($_SESSION['idS'])){
                            ?>
                            <p class="d-flex align-self-center my-0 fw-bold text-light me-2">สวัสดี คุณ : <?php echo $_SESSION['nameS'];?></p>
                            <a href="#" class="btn btn-danger border-2 border-light fw-bold" id="logout_butt">Logout <i class="fas fa-door-open"></i></a>
                        <?php
                        }
                        if(!isset($_SESSION['idS'])){
                        ?>
                             <a href="#" class="btn btn-outline-light border-2" id="login_butt" data-bs-toggle="modal" data-bs-target="#staticBackdrop">เข้าสู่ระบบ <i class="fas fa-sign-in-alt"></i></a>
                    <?php
                        }
                    ?>
                   

                </div>
            </div>
        </div>
    </section>

    <!-- content -->
    <section class="mt-3 mb-3"  id="bg_web">
        <div class="container">

            <div class="row">

                    <div class="col-xl-2 mb-3">
                                    <div class="list-group border border-3 border-primary">

                                    <h4 class="list-group-item list-group-item-action active my-0 text-center">เมนู</h4>

                                    <a href="index.php?p" class="list-group-item list-group-item-action" id="link_hover"><i class="fas fa-home text-primary"></i> หน้าแรก</a>
                                    <a href="index.php?p=gallery" class="list-group-item list-group-item-action" id="link_hover"><i class="far fa-images text-success"></i> แกลเลอรี</a>
                                    <a href="index.php?p=contact" class="list-group-item list-group-item-action" id="link_hover"><i class="fas fa-id-card-alt text-danger"></i> ติดต่อเรา</a>
    
                                    </div>
                    </div>

                    <div class="col-xl-10">  <!-- Content ขวามือ -->

                                    <?php
                                                    switch ($_GET['p']) {
                                                        case "home":
                                                            include_once('home.php');
                                                            break;

                                                        case "contact":
                                                            include_once('contact.php');
                                                            break;
                                                        
                                                        case "view_link":
                                                            include_once('linkview.php');
                                                            break;

                                                        case "gallery":
                                                            include_once('gallery.php');
                                                            break;
                                                        
                                                        default:
                                                            include_once('home.php');
                                                            break;
                                                    }
                                        
                                    ?>
                                    
                    </div>   <!-- ปิด col-10 -->
            </div><!-- ปิด row -->


        </div> <!-- ปิด Container -->
        

        

    </section>

    <!-- Footer -->
    <footer class="mb-0 mt-2  bg-primary text-center">
                <p class="text-light mb-0 p-3"><b><i class="far fa-copyright"></i> 2021 </b><br>
                <b class="text-warning">POWER BY :</b>  นักศึกษาฝึกงาน มหาวิทยาลัยราชภัฏนครสวรรค์ ปี 2564 <br>
                <a href="index.php?p=contact" class="badge bg-success text-decoration-none mt-1">ติดต่อเรา</a>
                </p>
    </footer>

   
     <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- sweetalert2 -->
    <script src="sweetalert/sweetalert2.all.min.js"></script>



    <!-- Code Jquery -->
    <script>
        $(document).ready(function(){

            // TODO: Tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
             return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            

            // todo: Logo
            $("#logo").click(function(){
                window.location.href = 'index.php?p';
            });
            $("#logo").mouseenter(function(){
                $(this).css("cursor", "pointer");
            });
            // todo ------------------
            
            var user  = $("#user").val();
            var pass  = $("#pass").val();
            
            $("#user").on('blur', function(){
                
                if($(this).val() == "" ){
                    $(this).addClass("border-2 border-warning");
                    $(this).removeClass("border-2 border-danger");
                    $("#nopass").removeClass();
                    $("#nopass").html("");
                    $("#nopass").addClass("alert alert-warning border-2 border-warning text-center fw-bold");
                    $("#nopass").html("<i class='fas fa-exclamation-triangle'></i> กรุณากรอกข้อมูล!");
                }else{
                    $(this).removeClass("border-2 border-warning");
                    $(this).removeClass("border-2 border-danger");
                    $("#nopass").removeClass();
                    $("#nopass").html("");
                }
            });
            $("#pass").on('blur', function(){
                
                if($(this).val() == "" ){
                    $(this).addClass("border-2 border-warning");
                    $(this).removeClass("border-2 border-danger");
                    $("#nopass").removeClass();
                    $("#nopass").html("");
                    $("#nopass").addClass("alert alert-warning border-2 border-warning text-center fw-bold");
                    $("#nopass").html("<i class='fas fa-exclamation-triangle'></i> กรุณากรอกข้อมูล!");
                }else{
                    $(this).removeClass("border-2 border-warning");
                    $(this).removeClass("border-2 border-danger");
                    $("#nopass").removeClass();
                    $("#nopass").html("");
                }
            });

            $("#closeLogin").click(function(){
                $("#nopass").removeClass();
                $("#nopass").html("");
                $("#user").removeClass("border-2 border-danger");
                $("#pass").removeClass("border-2 border-danger");
                $("#user").removeClass("border-2 border-warning");
                $("#pass").removeClass("border-2 border-warning");

            });


            
            // TODO : Ajax Login
            $("#btn_log").click(function(){
                var user  = $("#user").val();
                var pass  = $("#pass").val();
                $.ajax({
                    method :'post',
                    url : 'function/chk_login.php',
                    data : {
                        keyCHK:"postOK",
                        chkuser:user,
                        chkpass:pass
                    },
                    success:function(data){
                        // code under me
                        // alert(data);
                        if(data > 0){
                            Swal.fire({
                            icon: 'success',
                            title: 'เข้าสู่ระบบสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                            }).then(function(){ 
                                location.reload();
                            });
                                                
                        }else{
                                $("#nopass").addClass("alert alert-danger border-2 border-danger text-center fw-bold");
                                $("#nopass").html("<i class='far fa-times-circle'></i> ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง โปรดลองใหม่อีกครั้ง!");
                                $("#user").addClass("border-2 border-danger");
                                $("#pass").addClass("border-2 border-danger");
                        }
                       
                    }
                });
            });



            // todo: Logout
            $("#logout_butt").click(function(){
                Swal.fire({
                title: 'ต้องการออกจาก ระบบ หรือไม่?',
                text: "คุณต้องการออกจาก ระบบ!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ไม่ต้องการ',
                confirmButtonText: 'ต้องการออกจาก ระบบ!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                    $.ajax({
                        method : 'post',
                        url: 'function/logout.php',
                        data:{
                            logout: "ok"
                        },
                        success:function(data){
                            if(data = "pass"){

                                window.location.href = 'index.php?p';
                                // alert(data);
                            }
                        }
                        });
                    }
                });

                
            });


            //todo: get  del_category
            <?php
            if(isset($_GET['del']) == "success"){
                ?>
                
                Swal.fire({
                            icon: 'success',
                            title: 'ลบหมวดหมู่เรียบร้อยแล้ว',
                            showConfirmButton: false,
                            timer: 1500
                            }).then(function(){ 
                                window.location.href = 'index.php?p=';
                            });
                    


            <?php
                }

            ?>


            
        }); //ปิด ประกาศ Ready 
    </script>

</body>
</html>