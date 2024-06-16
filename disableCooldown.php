<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $indexPath = 'index.html';
    $content = file_get_contents($indexPath);

    // Supprime toutes les occurrences de la ligne de cookie de cooldown
    $pattern = '/document\.cookie = `[a-zA-Z0-9]+=true; max-age=\d+`;\\n/';
    $newContent = preg_replace($pattern, '', $content);

    if ($newContent !== null) {
        file_put_contents($indexPath, $newContent);
        echo 'Cooldown désactivé avec succès';
    } else {
        echo 'Failed to disable the cooldown';
    }
} else {
    echo 'Invalid request method';
}
?>
