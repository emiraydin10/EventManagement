<?php
// Hataları göster
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Yanıtın JSON olduğunu belirt
header('Content-Type: application/json');

// Yalnızca POST kabul edilir
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "POST değil."]);
    exit;
}

// Dosya kontrolü
if (!isset($_FILES["profileImage"]) || $_FILES["profileImage"]["error"] !== UPLOAD_ERR_OK) {
    echo json_encode(["status" => "error", "message" => "Dosya yok veya yüklenemedi."]);
    exit;
}

// Yükleme klasörü
$uploadDir = __DIR__ . "/uploads/images/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Dosya adı
$filename = uniqid() . '_' . basename($_FILES["profileImage"]["name"]);
$targetFile = $uploadDir . $filename;

// Yükleme işlemi
if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
    echo json_encode([
        "status" => "success",
        "imageUrl" => "/backend/uploads/images/" . $filename
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "move_uploaded_file başarısız."]);
}
?>
