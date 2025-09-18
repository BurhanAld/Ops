<?php
// تحديد نوع المحتوى
header('Content-Type: application/json');

// الحصول على طريقة الطلب
$method = $_SERVER['REQUEST_METHOD'];

// هنا يمكنك التحقق من مسار الطلب أو البيانات المرسلة
// مثال: استجابة مختلفة بناءً على الطلب أو المعطيات

switch ($method) {
    case 'GET':
        // استجابة لطلب GET
        $response = [
            "message" => "مرحبًا بك من API باستخدام PHP",
            "method" => "GET",
            "data" => null
        ];
        break;
    case 'POST':
        // استلام بيانات من POST
        $input = json_decode(file_get_contents('php://input'), true);
        $response = [
            "message" => "تم استلام بيانات POST",
            "method" => "POST",
            "data" => $input
        ];
        break;
    case 'PUT':
        // استلام بيانات من PUT (مشابهة لـ POST)
        $input = json_decode(file_get_contents('php://input'), true);
        $response = [
            "message" => "تم استلام بيانات PUT",
            "method" => "PUT",
            "data" => $input
        ];
        break;
    case 'DELETE':
        // رد لطلب DELETE
        $response = [
            "message" => "تم استلام طلب DELETE",
            "method" => "DELETE"
        ];
        break;
    default:
        $response = [
            "message" => "طريقة غير مدعومة",
            "method" => $method
        ];
        break;
}

// طباعة الرد بصيغة JSON
echo json_encode($response);
?>