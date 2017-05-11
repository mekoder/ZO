<?php
session_start();
$sid= $_SESSION['sid'];

//include 'error.php';
include 'conn.php';

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
                  // NAME //                   
                                            $name = $_GET['name'];
                                            if($name =="ďĎčČċù÷ö"){

                                              $usr_nmebox = $_GET['obj'];
                                              $usr_nmebox2 = $_GET['obj2'];

                                        if($usr_nmebox == ''){
                                          echo "<img src='images/redtick.png'/><span style='margin-left:7px;color:#ff4141;'>Both first and last name must be filled out.</span>";
                                        }
                                        else {

                                    $sql = "SELECT * from musicfreaks_users where username = '$sid'";
                                    $result = mysqli_query($conn, $sql);  
                                    if(mysqli_num_rows($result) > 0)   
                                      {  
                                         while($row = mysqli_fetch_array($result))  
                                          {     
                                           $fname=$row['fname'];
                                           $lname=$row['lname'];
                                         }
                                      } 

                                      if ($fname == $usr_nmebox && $lname == $usr_nmebox2)
                                               { 
                                        echo "<img src='images/redtick.png'/><span style='margin-left:7px;color:#ff4141;'>No need to edit.</span>";
                                       } else {
                                                                                              
                                              $usr_nmebox = ucfirst (test_input($usr_nmebox));
                                              $usr_nmebox2 = ucfirst (test_input($usr_nmebox2));
                                        
                                               if($usr_nmebox !== "" && $usr_nmebox2 !=="" )
                                               {
                                                 if (!preg_match("/^[a-zA-Z]*$/", $usr_nmebox))
                                                      {
                                                echo "<img src='images/redtick.png'/><span style='margin-left:7px;color:#ff4141;'>A name can't be in numbers and other characters.</span>";
                                                              } else  {
                                                        if (!preg_match("/^[a-zA-Z]*$/", $usr_nmebox2))
                                                        {
                                         echo "<img src='images/redtick.png'/><span style='margin-left:7px;color:#ff4141;'>A name can't be in numbers and other characters.</span>";
                                                                }else {   
                                          mysqli_query($link,"UPDATE musicfreaks_users SET fname ='$usr_nmebox' WHERE username='$sid'");
                                          mysqli_query($link,"UPDATE musicfreaks_users SET lname ='$usr_nmebox2' WHERE username='$sid'");
                                          $space1 = " ";
           mysqli_query($link,"UPDATE musicfreaks_users SET fullname ='$usr_nmebox$space1$usr_nmebox2' WHERE username='$sid'");
                                          echo "<img src='images/bluetick.png'/><span style='margin-left:7px;color:#3b88c3;'>Your name has been successfully updated.</span>";
                                                        }
                                                          } 
                                                          } else
                                     echo "<img src='images/redtick.png'/><span style='margin-left:7px;color:#ff4141;'>Both first and last name must be filled out.</span>";

                                         } 
                                     }
                                   }


                        // PASSWORD   //
                                     function test_input2($data) {
                                           $data = stripslashes($data);
                                           $data = htmlspecialchars($data);
                                           return $data;
                                        }
                                                $pass = $_GET['pass'];
                                            if($pass =="ďĎčČċù÷ö΅΄˝ΙΪΫ")
                                            {
                                              $pass1 = test_input2($_GET['obj3']);
                                              $pass2 = test_input2($_GET['obj4']);
                                              $pass3 = test_input2($_GET['obj5']);

                                              if($pass1 !=="" && $pass2 !=="" && $pass3 !== ""){
                                                    $sel=mysqli_query($link,"SELECT pass from musicfreaks_users where username='$sid'");
                                                    $arr=mysqli_fetch_array($sel);
                                                    $pass1=md5( md5($pass1));
                                                    if($pass1==$arr['pass'])
                                                     {
                                                      $passcount = strlen($pass2);
                                                      if ($passcount < 5)
                                                      {
                                                      echo "<img src='images/redtick.png'/><span style='margin-left:7px; color:#ff4141;'>Enter password atleast 5 characters long.</span>";
                                                      }else
                                                      {
                                                        if($pass2 == $pass3)
                                                        {
                                                          $pass2 = md5( md5($pass2));
                                                          mysqli_query($link,"UPDATE musicfreaks_users SET pass ='$pass2' WHERE username='$sid'");
                                                               echo "<img src='images/bluetick.png'/> <span style='color:#3b88c3;'>Your password has been successfully updated.</span>";
                                                        }else  {
                                                          echo "<img src='images/redtick.png'/><span style='margin-left:7px;color:#ff4141;'>Passwords that you entered don't match.</span>";
                                                        }
                                                      }
                                                     }else {
                                                      echo "<img src='images/redtick.png'/><span style='margin-left:7px; color:#ff4141;'>Your current password is incorrect.</span>";
                                                     }
                                                    
                                                    } else {
                                                  echo "<img src='images/redtick.png'/><span style='margin-left:7px; color:#ff4141;'>Password fields must be filled out.</span>";
                                                }
                                              }

$conn->close();                          
?>
