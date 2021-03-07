<?php
        session_start();
        include_once('func.php');
        $chkLogin = new func();
        
        

        if(isset($_POST)){

                        $user = $_POST['chkuser'];
                        $pass = md5($_POST['chkpass']);

                    if(isset($_POST['keyCHK']) == "postOK" ){
                        
                        
                        
                        
                        
                        $sql = $chkLogin->funcLogin($user, $pass);
                        $rows = mysqli_num_rows($sql);
                        if($rows > 0){
                            $fetch = mysqli_fetch_array($sql);
                                    $_SESSION['idS'] = $fetch['user_id'];
                                    $_SESSION['nameS'] = $fetch['name'];
                            
                            echo $rows;
                        }else{
                            echo $rows;
                        }
                        
                        

                    }

            
        }else{
            header("Location : index.php?p=");
        }

?>