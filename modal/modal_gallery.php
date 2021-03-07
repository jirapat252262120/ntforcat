    <!-- Modal -->
    <div class="modal fade" id="gallery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel"><b>เลือกรูปภาพ </b> <i class="far fa-images text-success"></i></h4>
            <button id="closeLogin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <form action="function/addgallery.php" method="POST" enctype="multipart/form-data">
            <!-- code under me-->
            
            <div class="row mb-3">
                    <div class="col">
                        <input id="filePic" class="form-control" type="file" name="pic" required>
                    </div>
            </div>
            <div class="row">
                    <div class="col">
                        <label class="mb-2 fw-bold" for="textPic">คำอธิบายรูป</label>
                        <textarea id="textPic" class="form-control" rows="5" cols="" name="textPic" required></textarea>
                    </div>
            </div>

        </div> <!--ปิด modal-body  -->


        <div class="modal-footer">
            <button type="submit" name="addImage" class="btn btn-primary" id="btn_log" value="add">บันทึกข้อมูล </button>
        </div>
        </form>


        </div>
    </div>
    </div>
