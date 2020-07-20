<?php  
use App\Model\DBConnect;
 try  {  
     $db = new DBConnect();
     $conn = $db->connect();
     if(isset($_POST["login"])) {  
          if(empty($_POST["username"]) || empty($_POST["password"])) {  
               $message = '<label>All fields are required</label>';  
          }   else  {  
               $sql = "SELECT * FROM users WHERE username = :username AND password = :password";  
               $stmt = $conn->prepare($sql);  

               $stmt->execute(
                    [
                         'username' => $_POST["username"],  
                         'password' => $_POST["password"]  
                    ]  
               );  

               $result = $stmt->fetch();
                
               if($result) {  
                    $_SESSION["username"] = $result; 
                     
                    header("location:index.php");  
               }  else  {  
                    $message = '<label>Wrong Data</label>';  
               }  
           }  
     }  
 }  
 catch(PDOException $error)  
 {  
     $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
          <title>Document</title>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      </head>  
      <body>  
   
           <div class="container" >  
                <?php  
                if(isset($message)) {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3>Login</h3><br />  
                <form method="post">  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control"  />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control"  />  
                     <br />  
                     <button type="submit" name="login" class="btn btn-info">Login</button>  
                     
                </form>  
           </div>  
         
      </body>  
 </html>  