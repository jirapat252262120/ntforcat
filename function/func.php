<?php
    //! Database connect
    DEFINE('DB_server', "localhost");
    DEFINE('DB_user', "root");
    DEFINE('DB_password', "");
    DEFINE('DB_name', "nt4cat");
    
    //! Title Web
    DEFINE('Title_web', "เว็บแอปพลิเคชันเพื่อการจัดการลิงค์ของเว็บไซต์ภายในสำนักงานเว็บแอปพลิเคชันเพื่อการจัดการลิงค์ของเว็บไซต์ภายในสำนักงาน");
    
    // !  Object Code

    class func{

            //! เชื่อม Database 
            function __construct(){ 
                $conn = mysqli_connect(DB_server, DB_user, DB_password, DB_name);
                $this->dbcon = $conn;
                mysqli_set_charset($this->dbcon, "utf8");

                if (mysqli_connect_errno()) {
                    echo"เชื่อมต่อ Database ไม่สำเร็จ!";
                }else{
                    // echo"เชื่อมต่อ Database สำเร็จแล้ว";
                }
            }
            
            //TODO: select หมวดหมู่
            function slCategory(){
                $result = mysqli_query($this->dbcon, "SELECT * FROM main_category");
                return $result;
            }

            //TODO: select หมวดหมู่ BY id
            function slCategoryByID($sCBI){
                $result = mysqli_query($this->dbcon, "SELECT * FROM main_category WHERE main_id='$sCBI'");
                return $result;
            }

            //TODO: select Gallery
            function selectPicGallery(){
                $result = mysqli_query($this->dbcon, "SELECT * FROM gallery ORDER BY id DESC");
                return $result;
            }

            //!TODO: select 4 edit link
            function select4EditLink($link_id){
                $re = mysqli_query($this->dbcon, "SELECT * FROM link_category WHERE link_id ='$link_id'");
                return $re;
            }
            //!TODO: select link
            function slLink($idmain){
                $result = mysqli_query($this->dbcon, "SELECT * FROM link_category WHERE main_id ='$idmain' ORDER BY link_id DESC");
                return $result;
            }

            //TODO :  Login_form
            function funcLogin($user, $pass){
                $reS = mysqli_query($this->dbcon, "SELECT * FROM user WHERE username='$user' AND password='$pass' ");
                
                return $reS;
            } 

            //TODO : Insert in to  Gallery
            function addPic($textPic, $newName){
                $re = mysqli_query($this->dbcon, "INSERT INTO 
                gallery(
                    img_name,
                    img_text
                )
                VALUE(
                    '$newName',
                    '$textPic'
                )
                ");
                return $re;
            }
            //TODO : Insert in to  main_category
            function addCategory($selectColor, $nameCategory){
                $re = mysqli_query($this->dbcon, "INSERT INTO 
                main_category(
                    name_category,
                    color_category
                )
                VALUE(
                    '$nameCategory',
                    '$selectColor'
                )
                ");
                return $re;
            }
            //TODO :  del_category
            function delCategory($del_id2){
                $re = mysqli_query($this->dbcon, "DELETE FROM link_category WHERE main_id='$del_id2'");
                $re2 = mysqli_query($this->dbcon, "DELETE FROM main_category WHERE main_id='$del_id2'");
                return $re.$re2;
            }
            //TODO :  del_Link
            function delLink($del_id2){
                $re = mysqli_query($this->dbcon, "DELETE FROM link_category WHERE link_id='$del_id2'");
                return $re;
            }
            //TODO :  edit_category
            function editCategory($nameCategory, $selectColor, $main_id){
                    $re = mysqli_query($this->dbcon, "UPDATE main_category SET name_category='$nameCategory',color_category='$selectColor' WHERE main_id='$main_id'");

                    return $re;
            }
            //TODO :  edit_Link
            function edit4link($link_address, $link_name, $link_id){
                    $re = mysqli_query($this->dbcon, "UPDATE link_category SET link_address='$link_address', link_name='$link_name' WHERE link_id='$link_id'");

                    return $re;
            }
            //TODO: Insert  Link
            function insertLink($link_address, $link_name, $main_id){
                    $re = mysqli_query($this->dbcon, "INSERT INTO 
                    link_category(
                        main_id,
                        link_address,
                        link_name
                    )
                    VALUE(
                        '$main_id',
                        '$link_address',
                        '$link_name'
                    )
                    ");
                    return $re;
            }

    } //ปิด Class







?>