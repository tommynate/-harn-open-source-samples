<?php
require 'sendMessage.php'; // ฟังก์ชันส่งข้อความไป LINE
require 'con_mysql.php';    // การเชื่อมต่อฐานข้อมูล MySQL

// อ่านข้อมูลจาก LINE
$inputData = file_get_contents('php://input');
$events = json_decode($inputData, true)['events'] ?? [];

// บันทึก log เพื่อ debug
file_put_contents('log.txt', $inputData . PHP_EOL, FILE_APPEND);

foreach ($events as $event) {
    // ตรวจสอบว่าเป็นข้อความจากผู้ใช้
    if ($event['type'] !== 'message' || $event['source']['type'] !== 'user') continue;

    $userId = $event['source']['userId'];
    $messageText = $event['message']['text'];
    $replyToken = $event['replyToken'];

    // กำหนดข้อความตอบกลับตามข้อความที่ผู้ใช้ส่งมา
    if ($messageText === 'สวัสดี') {
        $replyMessage = "สวัสดีครับ! ยินดีต้อนรับสู่ระบบ LINE Bot";
        $type = 'text';
    } elseif ($messageText === 'ทดสอบ') {
        // ตัวอย่าง Flex Message แบบง่าย
        $replyMessage = [
            'type' => 'flex',
            'altText' => 'ทดสอบ',
            'contents' => [
                'type' => 'bubble',
                'body' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        ['type' => 'text', 'text' => 'ทดสอบ', 'weight' => 'bold', 'align' => 'center']
                    ]
                ]
            ]
        ];
        $type = 'flex';
    } else {
        $replyMessage = "ไม่เข้าใจคำสั่ง: $messageText";
        $type = 'text';
    }

    // เตรียม payload สำหรับส่งกลับ
    if ($type === 'flex') {
        $messages = [
            'replyToken' => $replyToken,
            'messages' => [$replyMessage]
        ];
    } else {
        $messages = [
            'replyToken' => $replyToken,
            'messages' => [[
                'type' => 'text',
                'text' => $replyMessage
            ]]
        ];
    }

    // ส่งข้อความไป LINE
    sentMessage(json_encode($messages));
}

// ตอบกลับ HTTP 200
http_response_code(200);
?>