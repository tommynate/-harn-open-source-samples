# Harn Open Source Samples - Sendmail

ตัวอย่างการส่งอีเมลด้วย **PHP** โดยใช้ [PHPMailer](https://github.com/PHPMailer/PHPMailer)  
โค้ดนี้เหมาะสำหรับผู้ที่ต้องการศึกษาวิธีการส่งอีเมลผ่าน **Gmail SMTP** หรือเซิร์ฟเวอร์ SMTP อื่น ๆ  

---

## โครงสร้างโปรเจกต์

```
sendmail/
├── phpmailer/              # ไลบรารี PHPMailer (LGPL v2.1 License)
│   ├── LICENSE             # License ของ PHPMailer
│   ├── sample-script.php
│   ├── PHPMailerAutoload.php
│   ├── class.smtp.php
│   ├── class.phpmailer.php
│   └── ...
├── sendmail.php            # ฟังก์ชันส่งเมล (ตัวอย่างที่ปรับแต่งเอง)
├── index.php               # ตัวอย่างการใช้งาน
├── LICENSE                 # License ของโค้ดที่ผู้พัฒนา (MIT License)
└── .gitattributes
```
---

## วิธีการใช้งาน

1. ดาวน์โหลดโปรเจกต์นี้
2. ตั้งค่าอีเมลและรหัสผ่านของ Gmail (หรือ SMTP อื่น ๆ) ในไฟล์ `sendmail.php`
3. เรียกใช้งานได้จาก `index.php`
4. `$msg` สามารถใส่ข้อความแบบ **HTML** ได้ เช่น `<h2>Hello World</h2>`

**ตัวอย่างการใช้งาน**
```php
$msg = "<h2>Hello World</h2>";
$to  = "someone@example.com";
send_mail($to, "หัวข้ออีเมล", $msg);
```

---

## Requirements

- PHP 5.2.6 ขึ้นไป (ตัวอย่างนี้ทดสอบกับ PHP 5.2.6)
- เปิดการอนุญาต SMTP ใน Gmail (ถ้าใช้ Gmail SMTP)

---

## License

โค้ดนี้ประกอบด้วย License สองส่วน:

- **MIT License** – สำหรับโค้ดที่ผู้พัฒนา (Harnsuek Nateudom) เขียนขึ้นเอง เช่น `sendmail.php`, `index.php`  
  อ่านรายละเอียด MIT License ในไฟล์ `LICENSE`

- **LGPL v2.1 License** – สำหรับโค้ดในโฟลเดอร์ `phpmailer/` ซึ่งเป็นผลงานของทีมพัฒนา PHPMailer  
  อ่านรายละเอียด LGPL v2.1 ในไฟล์ `phpmailer/LICENSE`

---

## Credits

- **PHPMailer Project** – Marcus Bointon, Jim Jagielski, Andy Prevost, Brent R. Matzelle  
- ตัวอย่างการใช้งาน และการรวมเข้ากับระบบ PHP โดย Harnsuek Nateudom

