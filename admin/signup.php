<?php 
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php'; 
    require '../PHPMailer/src/PHPMailer.php'; 
    require '../PHPMailer/src/SMTP.php';

    include("../config/constants.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Quản lý Danh Bạ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <section class="vh-100">
        <div class="w-50 py-5 h-100 m-auto">
            <div class="row d-flex align-items-center justify-content-center h-100 border rounded border-5 flex-column">
                <span class="col-md-7 col-lg-5 col-xl-5 m-3 text-center fs-2 text fw-bold">ĐĂNG KÝ</span>
                <?php
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <div class="col-md-7 col-lg-5 col-xl-5">
                    <form action="" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form1Example13" class="form-control form-control-lg" name="name" />
                        <label class="form-label" for="form1Example13">Họ và tên</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="email" id="form1Example14" class="form-control form-control-lg" name="email" />
                        <label class="form-label" for="form1Example14">Email</label>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form1Example23" class="form-control form-control-lg" name="password1" />
                        <label class="form-label" for="form1Example23">Mật khẩu</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="password" id="form1Example24" class="form-control form-control-lg" name="password2" />
                        <label class="form-label" for="form1Example24">Nhập lại mật khẩu</label>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $password = password_hash($password1, PASSWORD_DEFAULT);

        $sql = "select * from db_nguoidung where email = '$email'";
        $res = mysqli_query($conn, $sql) or die ("Error in query: $sql. ".mysql_error());

        if(mysqli_num_rows($res) > 0)
        {
            $_SESSION['login'] = "<div class='text-danger mb-2 text-center'>Email đã được sử dụng.</div>";
            header('location:'.SITEURL.'admin/signup.php');
        }
        else
        {
            $sql1 = "insert into db_nguoidung set
                    name = '$name',
                    email = '$email',
                    password = '$password' ";
            
            $res1 = mysqli_query($conn, $sql1);

            if($res1 > 0)
            {
                $_SESSION['login'] = "<div class='text-success'>Đăng ký thành công.</div>";
                $_SESSION['ussẻ'] = $email;
                header('location:'.SITEURL.'admin/');
            }
            else
            {
                $_SESSION['login'] = "<div class='text-danger mb-2 text-center'>Đăng ký thất bại.</div>";
                header('location:'.SITEURL.'admin/signup.php');
            }
        }
    }
?>

<?php
    
    if(isset($_POST['submit']))
    {
        
        $mail = new PHPMailer; 
 
        $mail->isSMTP();                      // Set mailer to use SMTP 
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
        $mail->SMTPAuth = true;               // Enable SMTP authentication 
        $mail->Username = 'vinhveoveo21@gmail.com';   // SMTP username 
        $mail->Password = 'vinhvinhveo123';   // SMTP password 
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 587;                    // TCP port to connect to 
        $mail->CharSet = 'UTF-8';
        
        // Sender info 
        $mail->setFrom('vinhveoveo21@gmail.com', 'local'); 
        $mail->addReplyTo('vinhveoveo21@gmail.com', 'local'); 
        
        // Add a recipient 
        $mail->addAddress($email); 
        
        //$mail->addCC('cc@example.com'); 
        //$mail->addBCC('bcc@example.com'); 
        
        // Set email format to HTML 
        $mail->isHTML(true); 
        
        // Mail subject 
        $mail->Subject = 'Email from Localhost'; 
        
        // Mail body content 
        $bodyContent = '<h1>How to Send Email from Localhost using PHP by CodexWorld</h1>'; 
        $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>'; 
        $mail->Body    = $bodyContent; 
        
        // Send email 
        if(!$mail->send()) { 
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        } else { 
            echo 'Message has been sent.'; 
        }  
    }
?>