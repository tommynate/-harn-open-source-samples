<?php

include_once("sendmail.php");
include_once("phpmailer/class.phpmailer.php");

// ตัวอย่างการใช้งาน send_mail()
// $msg สามารถใส่ HTML ได้ ปรับแต่งตามต้องการ
$msg = "<h2>Hello World</h2>"; // ข้อความที่ต้องการส่งเมล์
$to = "recipient@example.com"; // อีเมล์ผู้รับ
send_mail($to, "เรื่องที่ต้องการส่ง", $msg);

?>
