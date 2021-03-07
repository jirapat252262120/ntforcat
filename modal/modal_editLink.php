 <!-- Jquery -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- sweetalert2 -->
    <script src="sweetalert/sweetalert2.all.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="editLink"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">แก้ไขลิงค์ใหม่ <i class="fas fa-plus-square text-success"></i></h4>
        <button id="xEditModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

                <div class="modal-body">
                        <div class="row">
                            <div class="col"> 
                                        <?php
                                                 $call_class3 = new func();
                                                $link_id = $_GET['link_id'];
                                                $sql2 = $call_class3->select4EditLink($link_id);
                                                if($sql2){
                                                   while($fetch2 = mysqli_fetch_array($sql2)){
                                                    // echo"ok come";
                                                   ?>
                                                   
                                               
                                              
                                        <label class="fw-bold" for="name_cat">ที่อยู่ของลิงค์เดิม</label>
                                        <span id="nopass1"></span>
                                        <input id="link_address4" class="form-control mt-2 mb-3 border border-3 border-success" type="text" value="<?php echo $fetch2['link_address']; ?>">

                                        <label class="fw-bold" for="">ชื่อของลิงค์เดิม</label>
                                        <span id="nopass2"></span>
                                        <textarea rows="2" cols="" id="link_name4" class="form-control mt-2 mb-2 border border-3 border-success" type="text" ><?php echo $fetch2['link_name']; ?></textarea>
                                        
                                        <?php       
                                        }
                                      
                                      }else{
                                                echo "Can't connect sql";
                                              }
                                     ?>

                            </div>
                        </div> <!--  ปิด row -->
                </div>

      <div class="modal-footer">
        <button id="btnEditLink" type="button" class="btn btn-success">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        
        $("#btnEditLink").click(function(){
          var addressLink= $("#link_address4").val();
          var nameLink= $("#link_name4").val();
          var link_id = <?php echo $_GET['link_id'];?>;
            // alert("Ok");
            $.ajax({
                method:'POST',
                url:'function/editLink.php',
                data:{
                    link_address:addressLink,
                    link_name:nameLink,
                    linkID:link_id
                },
                success:function(data){
                    if((data) == "Edited"){
                                      Swal.fire({
                                          icon: 'success',
                                          title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
                                          text: 'แก้ไข "ลิงค์" เรียบร้อยแล้ว',
                                          showConfirmButton: false,
                                          timer: 1500
                                          }).then(function(){ 
                                              window.location.href='index.php?p=view_link&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>';
                                      });
                    }else{
                       alert(data);
                    }
                     
                }

            }); //ปิด ajax
        });
    });
    
</script>