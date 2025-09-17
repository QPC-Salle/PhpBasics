<?php
$uploadSuccess = false;
$fileSize = 0;
$fileUrl = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $targetDir = "img/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = basename($_FILES["file"]["name"]);
    $dateTime = date('Ymd_His');
    $targetFile = $targetDir . $dateTime . "_" . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        $uploadSuccess = true;
        $fileSize = $_FILES["file"]["size"];
        $fileUrl = $targetFile;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>File Upload</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label>Select image to upload:</label>
        <input type="file" name="file" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>

    <?php if ($uploadSuccess): ?>
        <h2>Upload Successful!</h2>
        <p>File size: <?php echo round($fileSize / 1024, 2); ?> KB</p>
        <img src="<?php echo htmlspecialchars($fileUrl); ?>" alt="Uploaded Image" style="max-width:400px;">
    <?php endif; ?>
</body>

</html>