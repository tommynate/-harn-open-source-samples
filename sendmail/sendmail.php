<?php
function send_mail($to, $subj, $mesg){
    // เปลี่ยนค่าเหล่านี้เป็นของผู้ใช้เอง
    $fm = 'your-email@gmail.com';     // อีเมล์ผู้ส่ง
    $cc = 'cc-email@example.com';     // อีเมล์ CC
    $bcc = 'bcc-email@example.com';   // อีเมล์ BCC

    $mail = new PHPMailer();
    $mail->CharSet = "utf-8"; 
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPAuth = true;

    // ตั้งค่า SMTP ของ Gmail
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;  
    $mail->Username = 'your-email@gmail.com';      // ให้ผู้ใช้ใส่เอง
    $mail->Password = 'your-app-password';         // ให้ผู้ใช้ใส่เอง (App Password)

    $mail->From = $fm;
    $mail->AddAddress($to);
    $mail->AddReplyTo($fm);
    $mail->AddCC($cc);
    $mail->AddBCC($bcc);
    $mail->Subject = $subj;
    $mail->isHTML(true);   
    $mail->Body     = $mesg;
    $mail->WordWrap = 50;

    // ส่งเมล์
    $mail->Send();
}
?>