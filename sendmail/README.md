# LINE Bot PHP Samples

ตัวอย่างโปรเจกต์ **LINE Messaging API Bot** เขียนด้วย PHP สำหรับส่งข้อความและ Flex Message ผ่าน LINE Official Account (OA)

---

## โครงสร้างไฟล์

```
harn-open-source-samples/
├── webhook_line_bot/
│   ├── sendMessage.php        # ฟังก์ชันส่งข้อความ (Reply / Push)
│   ├── pushMasssage.php       # ตัวอย่างส่งข้อความแบบ Push
│   └── webhook_line_bot.php   # ตัวอย่าง Webhook สำหรับรับข้อความจากผู้ใช้

```

---

## ข้อมูลเกี่ยวกับไฟล์

### 1. `sendMessage.php`

* มีฟังก์ชันหลัก 2 ฟังก์ชัน:

  * `sentMessage($encodeJson)` : ใช้ส่งข้อความตอบกลับ (Reply) จาก Webhook
  * `PushMessage($encodeJson)` : ใช้ส่งข้อความแบบ Push ไปยังผู้ใช้หรือกลุ่ม
* ใช้ `cURL` ในการเรียก LINE Messaging API
* บันทึก log ข้อความและ error ลงไฟล์ `log.txt`
* ต้องแทนที่ `TOKEN CODE ตรงนี้` ด้วย **Channel Access Token** ของ LINE OA ของคุณ

---

### 2. `webhook_line_bot.php`

* ใช้รับข้อความจากผู้ใช้ผ่าน LINE Webhook
* ตัวอย่างโค้ด:

  * ถ้าผู้ใช้พิมพ์ `สวัสดี` → ตอบข้อความต้อนรับ
  * ถ้าผู้ใช้พิมพ์ `ทดสอบ` → ส่ง Flex Message ตัวอย่าง
  * ข้อความอื่น → แจ้งไม่เข้าใจคำสั่ง
* ใช้ฟังก์ชัน `sentMessage()` ใน `sendMessage.php` เพื่อส่งข้อความตอบกลับ
* บันทึก log ข้อความที่รับเข้ามา

---

### 3. `PushMessage.php`

* ใช้ส่งข้อความ Push ไปยังผู้ใช้หรือกลุ่ม LINE
* ตัวอย่าง:

  * ส่งข้อความ text ไปยัง **Group ID**
  * ส่ง Flex Message ไปยัง **User ID**
* ใช้ฟังก์ชัน `PushMessage()` จาก `sendMessage.php`
* บันทึก log ข้อความลง `log.txt`

---

## วิธีใช้งาน

1. **ตั้งค่า Token**

   * แก้ไขไฟล์ `sendMessage.php`

   ```php
   $datas['token'] = "ใส่ Channel Access Token ของคุณที่นี่";
   ```

2. **ตั้งค่า Webhook**

   * ตั้งค่า Webhook URL ของ LINE OA ไปที่ `webhook_line_bot/webhook_line_bot.php`

3. **ส่งข้อความ Push**

   * ใช้ `PushMessage.php` โดยแก้ไข

   ```php
   $group_id = 'GROUP ID';
   $userId = 'USER ID';
   $line_mass = 'ข้อความที่ต้องการส่ง';
   ```

4. **ทดสอบ Bot**

   * ส่งข้อความ "สวัสดี" หรือ "ทดสอบ" จาก LINE OA
   * ตรวจสอบ `log.txt` สำหรับการ Debug

**หมายเหตุ**

* ตัวอย่างนี้ใช้ PHP cURL และรองรับการส่งข้อความแบบ Text และ Flex
* ปิดการตรวจสอบ SSL certificate ใน cURL (`CURLOPT_SSL_VERIFYPEER => false`) สำหรับทดสอบ
* ใช้กับ PHP เวอร์ชัน 5.x ขึ้นไป

---

## License

โปรเจกต์นี้เป็นตัวอย่าง Open Source สามารถนำไปปรับใช้ได้ตามต้องการ
