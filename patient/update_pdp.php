<?php
session_start();
include "../cnx.php";

if (isset($_POST['id']) && isset($_FILES['newPdp'])) {
    $id = $_POST['id'];
    $file = $_FILES['newPdp'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../img/';
        $fileName = basename($file['name']);
        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $destPath)) {
            $stmt = $cnx->prepare("UPDATE patients SET img = ? WHERE idP = ?");
            $stmt->execute([$fileName, $id]);
            $_SESSION['msg'] = "Profile picture updated!";
            header("Location: profile.php");
            exit();
        } else {
            $_SESSION['error'] = "Upload failed.";
        }
    } else {
        $_SESSION['error'] = "Upload error.";
    }

    header("Location: profile.php");
    exit();
}
?>

