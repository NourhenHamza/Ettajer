<?php

$files = scandir('database/migrations');
foreach ($files as $file) {
    if (strpos($file, '.php') !== false) {
        $contents = file_get_contents('database/migrations/' . $file);
        if (preg_match('/class\s+(\w+)/', $contents, $matches)) {
            echo "$file: $matches[1]\n";
        }
    }
}
?>
