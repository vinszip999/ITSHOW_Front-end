<?php
 
        session_start();
 
        include('db_conn.php');
 
        //입력 받은 id와 password
        $id=$_POST['id'];
        $pw=$_POST['pw'];
 
        //아이디가 있는지 검사
        $sql = "select * from member where id='$id'";
        $result = mysqli_query($conn, $sql);
 $re = mysqli_fetch_row($result);
 
 
        //아이디가 있다면 비밀번호 검사
        if(mysqli_num_rows($result)==1) {
 
                $row=mysqli_fetch_assoc($result);
 
                //비밀번호가 맞다면 세션 생성
               // if($row['pw']==$pw){
                        $_SESSION['userid']=$id;
                        if(isset($_SESSION['userid'])){
                        ?>      <script>
                                        alert("로그인 되었습니다.");
                                        location.replace("index.php");
                                </script>
<?php
                        }
                        else{
                                echo "session fail";
                        }
               }
 
              
 
                else{
?>              <script>
                        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                       
                </script>
<?php
        }
 
 
?>


