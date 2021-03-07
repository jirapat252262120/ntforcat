        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- sweetalert2 -->
    <script src="sweetalert/sweetalert2.all.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="addLink"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">เพิ่มลิงค์ใหม่ <i class="fas fa-plus-square text-success"></i></h4>
        <button id="xModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

                <div class="modal-body">
                        <div class="row">
                            <div class="col"> 
                                        <label class="fw-bold" for="name_cat">ที่อยู่ของลิงค์</label>
                                        <span id="nopass1"></span>
                                        <input id="link_address" class="form-control mt-2 mb-3" type="text" name="link_address">

                                        <label class="fw-bold" for="">ชื่อของลิงค์</label>
                                        <span id="nopass2"></span>
                                        <textarea rows="2" cols="" id="link_name" class="form-control mt-2 mb-2" type="text" name="link_name"></textarea>
            

                            </div>
                        </div> <!--  ปิด row -->
                </div>

      <div class="modal-footer">
        <button id="btnAddLink" type="button" class="btn btn-success">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $("#xModal").click(function(){
            $("#link_address").removeClass("border border-3 border-danger");
            $("#nopass1").text("");
            $("#nopass1").removeClass("fw-bold text-danger");

            $("#link_name").removeClass("border border-3 border-danger");
            $("#nopass2").text("");
            $("#nopass2").removeClass("fw-bold text-danger");
        });

        $("#btnAddLink").click(function(){
          var addressLink= $("#link_address").val();
          var nameLink= $("#link_name").val();
          var main_id = <?php echo $_GET['id'];?>;
            // alert("Ok");
            $.ajax({
                method:'POST',
                url:'function/addLink.php',
                data:{
                    link_address:addressLink,
                    link_name:nameLink,
                    mainID:main_id
                },
                success:function(data){
                    if((data) == "empty"){
                    // alert(main_id);
                        if($("#link_address").val() == ""){
                                $("#link_address").addClass("border border-3 border-danger");
                                $("#nopass1").text(": * กรุณากรอกข้อมูล!");
                                $("#nopass1").addClass("fw-bold text-danger");
                                $("#link_address").attr('style', 'transition: 0.1s;');
                                
                        }else{
                                $("#link_address").removeClass("border border-3 border-danger");
                                $("#nopass1").text("");
                                $("#nopass1").removeClass("fw-bold text-danger");
                                $("#link_address").attr('style', 'transition: 0.1s;');
                        }
                        if($("#link_name").val() == ""){
                                $("#link_name").addClass("border border-3 border-danger");
                                $("#nopass2").text(": * กรุณากรอกข้อมูล!");
                                $("#nopass2").addClass("fw-bold text-danger");
                                $("#nopass2").attr('style', 'transition: 0.2s;');
                                
                        }else{
                                $("#link_name").removeClass("border border-3 border-danger");
                                $("#nopass2").text("");
                                $("#nopass2").removeClass("fw-bold text-danger");
                                $("#link_name").attr('style', 'transition: 0.1s;');
                        }
                      
                    }
                    if((data) == "insertOK"){
                        // alert(data);
                      Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                            text: 'บันทึก "ลิงค์ใหม่" เรียบร้อยแล้ว',
                            showConfirmButton: false,
                            timer: 1500
                            }).then(function(){ 
                                location.reload();
                            });
                      

                    }
                    

                                
                }

            }); //ปิด ajax
        });
    });
    
</script>

