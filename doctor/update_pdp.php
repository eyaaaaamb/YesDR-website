<?php
session_start();
include "../cnx.php";

if ( isset($_POST['id']) && isset($_FILES['newPdp'])) {
    $id = $_POST['id'];
    $file = $_FILES['newPdp'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../img/'; // Dossier de destination des images
        $fileName = basename($file['name']); // Garde le nom original du fichier
        $destPath = $uploadDir . $fileName; // Chemin complet de destination

        // Déplace le fichier depuis le dossier temporaire vers le dossier de destination
        if (move_uploaded_file($file['tmp_name'], $destPath)) {
          
            $stmt = $cnx->prepare("UPDATE medecins SET img = ? WHERE idM = ?");
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
