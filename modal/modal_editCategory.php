
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- sweetalert2 -->
         <script src="sweetalert/sweetalert2.all.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="editCategory"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">แก้ไขหมวดหมู่ <i class="fas fa-edit text-warning"></i></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

                <div class="modal-body">
                        <div class="row">
                            <div class="col"> 
                              <?php
                                    $sCBI = $_GET['editCate_id'];
                                    $sql_selectCate4Edit = $call_class->slCategoryByID($sCBI);
                                    if($sql_selectCate4Edit){
                                          while($row_cate = mysqli_fetch_array($sql_selectCate4Edit)){
                                              
                                          ?>
                                        <label class="fw-bold" for="name_cat">ชื่อหมวดหมู่เดิม</label>
                                        <span id="nopass1"></span>
                                        <input id="name_cat2" class="form-control mt-2 mb-3 border border-3 border-success" type="text" name="name_cat2" value="<?php echo $row_cate['name_category']; ?>">

                                        <label class="fw-bold" for="">เลือกสีพื้นหลังใหม่</label>
                                        <select id="select_color2" class="form-select mt-2 mb-3 border border-3 border-success" aria-label="Default select example">
                                                    <option selected value="bg-primary">---- โปรดเลือกสีพื้นหลัง ----</option>
                                                    <option  value="bg-primary">สีฟ้า</option>
                                                    <option value="bg-secondary">สีเทา</option>
                                                    <option value="bg-success">สีเขียว</option>
                                                    <option value="bg-danger">สีแดง</option>
                                                    <option value="bg-warning">สีเหลือง</option>
                                                    <option value="bg-info">สีฟ้าอ่อน</option>
                                                    <option value="bg-dark">สีดำ</option>
                                        </select>
                                    <?php
                                      }
                                    }else{
                                      echo"Can't SQL";
                                    }
                                   
                                    

                              ?>

                                        <div id="exColor2" class="form-control  text-center fw-bold  w-100 mt-2 mb-3">สีตัวอย่าง</div>
            

                            </div>
                        </div> <!--  ปิด row -->
                </div>

      <div class="modal-footer">
        <button id="btnAddCate2" type="button" class="btn btn-success">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<script>
                $(document).ready(function(){

                    $("#btnAddCate2").click(function(){
                       
                        var nameCategory= $("#name_cat2").val();
                        var selectColor= $("#select_color2").val();
                        var main_id = <?php echo$sCBI; ?>;
                        $.ajax({
                        method:'POST',
                        url:'function/editCategory.php',
                        data:{
                            name_cat:nameCategory,
                            select_color:selectColor,
                            del_id:main_id

                        },
                        success:function(data){
                            if((data) == "succEss"){
                                      Swal.fire({
                                          icon: 'success',
                                          title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
                                          text: 'แก้ไข "หมวดหมู่" เรียบร้อยแล้ว',
                                          showConfirmButton: false,
                                          timer: 1500
                                          }).then(function(){ 
                                              window.location.href='index.php?p=home';
                                      });
                            }else{
                                alert(data);
                            }


                        }

                      });
                      });
                    






                      // TODO : Chang color

                        
                        $("#select_color2").change(function(){
                          var color2 = $("#select_color").val();
                            if($(this).val() == "bg-primary"){
                                $("#exColor2").addClass("bg-primary text-light");
                                
                                $("#exColor2").removeClass("bg-secondary");
                                $("#exColor2").removeClass("bg-success");
                                $("#exColor2").removeClass("bg-danger");
                                $("#exColor2").removeClass("bg-warning");
                                $("#exColor2").removeClass("bg-info");
                                $("#exColor2").removeClass("bg-dark");
                                $("#exColor2").removeClass("text-dark");
                            }
                            if($(this).val() == "bg-secondary"){
                                $("#exColor2").addClass("bg-secondary text-light");

                                $("#exColor2").removeClass("bg-primary");
                                $("#exColor2").removeClass("bg-success");
                                $("#exColor2").removeClass("bg-danger");
                                $("#exColor2").removeClass("bg-warning");
                                $("#exColor2").removeClass("bg-info");
                                $("#exColor2").removeClass("bg-dark");
                                $("#exColor2").removeClass("text-dark");
                            }
                            if($(this).val() == "bg-success"){
                                $("#exColor2").addClass("bg-success text-light");

                                $("#exColor2").removeClass("bg-secondary");
                                $("#exColor2").removeClass("bg-primary");
                                $("#exColor2").removeClass("bg-danger");
                                $("#exColor2").removeClass("bg-warning");
                                $("#exColor2").removeClass("bg-info");
                                $("#exColor2").removeClass("bg-dark");
                                $("#exColor2").removeClass("text-dark");
                            }
                            if($(this).val() == "bg-danger"){
                                $("#exColor2").addClass("bg-danger text-light");

                                $("#exColor2").removeClass("bg-secondary");
                                $("#exColor2").removeClass("bg-success");
                                $("#exColor2").removeClass("bg-primary");
                                $("#exColor2").removeClass("bg-warning");
                                $("#exColor2").removeClass("bg-info");
                                $("#exColor2").removeClass("bg-dark");
                                $("#exColor2").removeClass("text-dark");
                            }
                            if($(this).val() == "bg-warning"){
                                $("#exColor2").addClass("bg-warning text-dark");

                                $("#exColor2").removeClass("bg-secondary");
                                $("#exColor2").removeClass("bg-success");
                                $("#exColor2").removeClass("bg-danger");
                                $("#exColor2").removeClass("bg-primary");
                                $("#exColor2").removeClass("bg-info");
                                $("#exColor2").removeClass("bg-dark");
                                $("#exColor2").removeClass("text-light");
                            }
                            if($(this).val() == "bg-info"){
                                $("#exColor2").addClass("bg-info");

                                $("#exColor2").removeClass("bg-secondary");
                                $("#exColor2").removeClass("bg-success");
                                $("#exColor2").removeClass("bg-danger");
                                $("#exColor2").removeClass("bg-warning");
                                $("#exColor2").removeClass("bg-primary");
                                $("#exColor2").removeClass("bg-dark");
                            }
                            if($(this).val() == "bg-dark"){
                                $("#exColor2").addClass("bg-dark text-light");

                                $("#exColor2").removeClass("bg-secondary");
                                $("#exColor2").removeClass("bg-success");
                                $("#exColor2").removeClass("bg-danger");
                                $("#exColor2").removeClass("bg-warning");
                                $("#exColor2").removeClass("bg-info");
                                $("#exColor2").removeClass("bg-primary");
                                $("#exColor2").removeClass("text-dark");
                                
                            }
                        });
                });


        </script>


