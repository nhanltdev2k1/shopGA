<?php

if (isset($_POST['luu'])) {

	include_once('database.php');

	$hoten = $_POST['txt_hoten'];

	$diachi = $_POST['txt_diachi'];

	$dt = $_POST['txt_dt'];

	$email = $_POST['txt_email'];

	$diemden = $_POST['txt_diemden'];

	$fax = $_POST['txt_fax'];

	$tieude = $_POST['txt_tieude'];

	$noidung = $_POST['txt_nd'];



	$email_lh = 'Hoangvudiemphuc@gmail.com';



	// Prepare the HTML content with inline CSS

	$tinnhan = "

    <html>

    <body style='font-family: Arial, sans-serif;'>

        <div style='width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;'>

            <div style='background-color: #4CAF50; padding: 10px 0; color: white; text-align: center; border-radius: 10px 10px 0 0;'>

                <h2>Thông tin người dùng</h2>

            </div>

            <div style='padding: 20px;'>

                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Họ và tên:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_hoten']}</span></div>

                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Email:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_email']}</span></div>

                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Số điện thoại:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_dt']}</span></div>

                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Địa chỉ:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_diachi']}</span></div>

                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Nội dung:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_nd']}</span></div>

            </div>

        </div>

    </body>

    </html>";



	$to = 'nhanlt.dev.it@gmail.com';

	$subject = $hoten;



	// Email headers

	$headers = "MIME-Version: 1.0" . "\r\n";

	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: ' . $email . "\r\n";



	// Send email using PHP's mail function

	mail($to, $subject, $tinnhan, $headers);



	// Using PHPMailer for sending email with more options

	require("class.phpmailer.php");

	$mailer = new PHPMailer();

	$mailer->IsSMTP();

	$mailer->CharSet = "utf-8";



	$mailer->SMTPAuth = true;

	$mailer->SMTPSecure = "ssl";

	$mailer->Host = "smtp.gmail.com";

	$mailer->Port = 465;



	$mailer->Username = "kythuatatv@gmail.com";

	$mailer->Password = "jyfd qyoc ggsv egid";

	$mailer->AddAddress('nhanlt.dev.it@gmail.com', 'Recipient Name');



	$mailer->FromName = $hoten;

	$mailer->From = $email;

	$mailer->Subject = "$hoten - Đăng Ký Thông Tin Dịch Vụ WorldDecorANL";

	$mailer->IsHTML(true);



	$mailer->Body = $tinnhan;



	if (!$mailer->Send()) {

		echo "Không gửi được ";

		echo "Lỗi: " . $mailer->ErrorInfo;

		echo "<script>window.location='?thamso=index.php'</script>";

	} else {

		echo '<script>

            alert("Cảm ơn đã liên hệ với chúng tôi!");

            </script>';

	}



	$ketnoi_maychu = ketnoi_MC();

	chon_CSDL($ketnoi_maychu);

	$truyvan = "INSERT INTO lienhe(hoten,diemden,diachi,dt,email,fax,tieude,noidung) VALUES ('$hoten','$diemden','$diachi','$dt','$email','$fax','$tieude','$noidung')";

	$kequa_truyvan = truyvan($truyvan, $ketnoi_maychu);

	if ($kequa_truyvan)

		thanhcong($hoten, $diemden, $diachi, $dt, $email, $fax, $tieude, $noidung);

	else

		loi($hoten);

	mysqli_close($ketnoi_maychu);

}



function thanhcong($hoten, $diemden, $diachi, $dt, $email, $fax, $tieude, $noidung)

{

	// Success handling code

}



function loi($hoten)

{

	$ketnoi_maychu = ketnoi_MC();

	chon_CSDL($ketnoi_maychu);

	$truyvan = "SELECT * FROM lienhe WHERE hoten='$hoten'";

	$kequa_truyvan = truyvan($truyvan, $ketnoi_maychu);

	$somautin = @mysqli_num_rows($kequa_truyvan);

	if ($somautin > 0)

		echo "<font color='red'>Lưu Không Thành Công. Vì tên khách hàng $hoten đã tồn tại.Hãy nhập mới";

	else

		echo "<font color='red'>Lưu Không Thành Công. Nhập tên khách hàng $hoten sai.Hãy nhập lại";

}

?>

<p class="title-normal">Để lại bình luận của bạn</p>

<form id="tt_mh" name="tt_mh" method="post" action=" #" onsubmit="return checkInput();">

	<div class="row">

		<div class="col-md-6">

			<div class="form-group">

				<label>Họ Và Tên</label>

				<input class="form-control form-control-name" type="text" name="txt_hoten" id="txt_hoten" required="" placeholder="Nhập Họ Và Tên..." type="text" required>

			</div>

		</div>

		<div class="col-md-6">

			<div class="form-group">

				<label>Email</label>

				<input class="form-control form-control-email" type="text" name="txt_email" id="txt_email" required="" placeholder="Nhập Email..." type="email" required>

			</div>

		</div>

		<div class="col-md-6">

			<div class="form-group">

				<label>Số Điện Thoại</label>

				<input class="form-control form-control-phone" type="text" name="txt_dt" id="txt_dt" required="" placeholder="Nhập Số Điện Thoại..." required>

			</div>

		</div>

		<div class="col-md-6">

			<div class="form-group">

				<label>Địa Chỉ</label>

				<input class="form-control form-control-subject" type="text" name="txt_diachi" id="txt_diachi" required="" placeholder="Nhập Địa Chỉ..." required>

			</div>

		</div>

	</div>

	<div class="form-group">

		<label>Nội Dung</label>

		<textarea class="form-control form-control-message" name="txt_nd" id="txt_nd" required="required" placeholder="Nhập Nội Dung..." rows="10" required></textarea>

	</div>

	<div class="form-group">

		<button name="luu" type="submit" id="luu" class="btn btn-primary solid blank" type="submit">Gửi Ngay</button>

	</div>

</form>