<?php
require_once 'controllers/Controller.php';
require_once 'controllers/ProductController.php';
require_once 'models/Payment.php';
require_once 'models/Order_detail.php';
require_once 'configs/PHPMailer/src/PHPMailer.php';
require_once 'configs/PHPMailer/src/SMTP.php';
require_once 'configs/PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class PaymentController extends Controller{
        public function index(){
            $product_model = new Product();
            $manufacturers = $product_model->getCategories();


            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];
                $method=$_POST['method'];
                if(empty($name)||empty($email)||empty($phone)||empty($address)){
                    $this->error="Điền đầy đủ thông tin";
                }
                if(empty($this->error)){
                    $payment_model=new Payment();
                    $payment_model->fullname=$name;
                    $payment_model->email=$email;
                    $payment_model->phone=$phone;
                    $payment_model->address=$address;
                    $price_total=0;
                    foreach ($_SESSION['card'] as $card){
                        $price=$card['price']*$card['quality'];
                        $price_total+=$price;
                    }
                    $payment_model->total_price=$price_total;
                    $order_id=$payment_model->insert();
                    if($order_id>0){
                        $order_detail_model=new Order_detail();
                        $order_detail_model->id_order=$order_id;
                        foreach ($_SESSION['card'] as $product_id=>$card){
                            $order_detail_model->id_computer=$product_id;
                            $order_detail_model->quality=$card['quality'];
                            $is_insert=$order_detail_model->insert();
                        }
                    }
                    if($method==0){
                        $_SESSION['order']=[
                            'price_total'=>$price_total,
                            'name'=>$name,
                            'email'=>$email,
                            'phone'=>$phone,
                        ];
                        $url=$_SERVER['SCRIPT_NAME']."/thanh-toan-truc-tuyen";
                        header("Location:$url");
                        exit();
                    }else{
                        $this->sendMail($email);
                        unset($_SESSION['card']);
                        $url_redirect=$_SERVER['SCRIPT_NAME']."/cam-on";
                        header("Location:$url_redirect");
                        exit();
                    }
                }
            }

            $this->content=$this->render('views/payments/index.php');
            require_once "views/layouts/product.php";
        }
    public function online(){
        $this->content=$this->render("configs/nganluong/index.php");
        echo $this->content;
    }
    public function sendMail($email)
    {

// Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //thêm dòng sau để hiển thị đc ký tự có dấu
            $mail->CharSet = 'UTF-8';
            //thực tế sử dụng debug_off
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            //sử dụng server gmail để gửi mail
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            //nhập tài khoản gmail cho username
            //tạm thời dùng tài khoản sau để
            // đỡ mất thời gian Xác minh 2 bươc
            $mail->Username = 'duylinh180998@gmail.com';                     // SMTP username
            //password ko phải là pasword gmail, mà gmail có 1 cơ chế
            //tạo password cho các ứng dụng, password này độc lập với
            //password gmail của bạn
            $mail->Password = 'idfbwjmnbzkzniuf';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            //gửi từ ai
            $mail->setFrom('abc@gmail.com', 'Lưu Duy Linh');
            //gửi tới ai
            $mail->addAddress($email);     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

            // Attachments
            //đính kèm file muốn gửi cùng mail
//            $mail->addAttachment('image.jpeg');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Cảm ơn bạn đã đặt hàng';
            $mail->Body = 'Đơn hàng sẽ được vận chuyển trong thời gian sớm nhất';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function thanks(){
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $this->content=$this->render("views/payments/thank.php");
        require_once 'views/layouts/product.php';
    }
}