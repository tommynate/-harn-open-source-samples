<?php
require 'sendMessage.php';

$line_mass = "ข้อความ"; // ข้อความทีต้องการส่ง
file_put_contents('log.txt', $line_mass . PHP_EOL, FILE_APPEND);


///ตัวอย่างส่งข้อความไปกลุ่มไลน์ที่ต้องการ    
$group_id = 'GOUP ID'; //ไอดีของกลุ่มที่ต้องการส่งข้อความไป
$normalMessage = [
    'to' => $group_id, // Group ID ที่ต้องการส่ง
    'messages' => [
        [
            'type' => 'text',  // เปลี่ยนประเภทข้อความเป็น text
            'text' => $line_mass  
        ]
    ]
];


///ตัวอย่างส่งข้อความไปเข้ากลุ่ม line OA เจาะจงส่งผู้ใช้คนเดียว
$userId="USER ID"; //ไอดีของผู้ใช้ที่ต้องการส่งข้อความไป
$data = [
'to' => $userId,
'messages' => [$flexMessage],
];
$encodeJson = json_encode($data);
$results = PushMessage($encodeJson);



$encodeJson = json_encode($normalMessage);
$results = pushMessage($encodeJson);

http_response_code(200);
?>
