<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cooldown = intval($_POST['cooldown']);
    if ($cooldown > 0) {
        $indexPath = 'index.html';
        $content = file_get_contents($indexPath);

        // Remplace l'ancienne valeur de max-age par la nouvelle
        $pattern = '/document\.cookie = `([a-zA-Z0-9]+)=true; max-age=\d+`;/';
        $replacement = "document.cookie = `$1=true; max-age=$cooldown`;";
        $newContent = preg_replace($pattern, $replacement, $content);

        if ($newContent !== null) {
            file_put_contents($indexPath, $newContent);
            echo 'Cooldown updated successfully';
        } else {
            echo 'Failed to update the cooldown';
        }
    } else {
        echo 'Invalid cooldown value';
    }
} else {
    echo 'Invalid request method';
}
?>
