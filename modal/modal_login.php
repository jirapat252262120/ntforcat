    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel"><b>เข้าสู่ระบบ | Login System </b> <i class="fas fa-user-lock text-success"></i></h4>
            <button id="closeLogin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- code under me-->
            <div class="row mb-3">
                <div class="col">
                    <label class="mb-1" for="username"><b>Username</b> </label>
                    <input class="form-control" type="text" name="username" id="user" placeholder="username" autofocus="">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                <label class="mb-1" for="password"><b>Password</b> </label>
                    <input class="form-control" type="password" name="password" id="pass" placeholder="password" autofocus="">
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <div id="nopass">
                        <span></span>
                    </div>
                
                </div>
            </div>

        </div> <!--ปิด modal-body  -->


        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_log">เข้าสู่ระบบ <i class="fas fa-sign-in-alt"></i></button>
        </div>
        </div>
    </div>
    </div>