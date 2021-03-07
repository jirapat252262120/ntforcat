        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- sweetalert2 -->
    <script src="sweetalert/sweetalert2.all.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="addCategory"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">เพิ่มหมวดหมู่ใหม่ <i class="fas fa-folder-plus text-warning"></i></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

                <div class="modal-body">
                        <div class="row">
                            <div class="col"> 
                                        <label class="fw-bold" for="name_cat">ชื่อหมวดหมู่</label>
                                        <span id="nopass1"></span>
                                        <input id="name_cat" class="form-control mt-2 mb-3" type="text" name="name_cat">

                                        <label class="fw-bold" for="">เลือกสีพื้นหลัง</label>
                                        <select id="select_color" class="form-select mt-2 mb-3" aria-label="Default select example">
                                                    <option selected value="bg-primary">---- โปรดเลือกสีพื้นหลัง ----</option>
                                                    <option  value="bg-primary">สีฟ้า</option>
                                                    <option value="bg-secondary">สีเทา</option>
                                                    <option value="bg-success">สีเขียว</option>
                                                    <option value="bg-danger">สีแดง</option>
                                                    <option value="bg-warning">สีเหลือง</option>
                                                    <option value="bg-info">สีฟ้าอ่อน</option>
                                                    <option value="bg-dark">สีดำ</option>
                                        </select>

                                        <div id="exColor" class="form-control  text-center fw-bold  w-100 mt-2 mb-3">สีตัวอย่าง</div>
            

                            </div>
                        </div> <!--  ปิด row -->
                </div>

      <div class="modal-footer">
        <button id="btnAddCate" type="button" class="btn btn-success">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){

        $("#btnAddCate").click(function(){
          var nameCategory= $("#name_cat").val();
          var selectColor= $("#select_color").val();

            $.ajax({
                method:'POST',
                url:'function/addCategory.php',
                data:{
                    name_cat:nameCategory,
                    select_color:selectColor

                },
                success:function(data){
                    if((data) == "empty"){
                      // alert(data);
                      $("#name_cat").addClass("border border-3 border-danger");
                      $("#nopass1").text(": * กรุณากรอกข้อมูล!");
                      $("#nopass1").addClass("fw-bold text-danger");
                    }else{
                      Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                            text: 'บันทึก "หมวดหมู่ใหม่" เรียบร้อยแล้ว',
                            showConfirmButton: false,
                            timer: 1500
                            }).then(function(){ 
                                window.location.href='index.php?p=home';
                            });
                      

                    }
                    

                                
                }

            }); //ปิด ajax
        });
    });
    
</script>

