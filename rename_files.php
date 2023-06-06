<?php

function renameFiles($directory, $prefix) {
    $files = scandir($directory);  // Get list of files in the directory
    $count = 1;
    
    foreach ($files as $filename) {
        if ($filename !== "." && $filename !== "..") {
            $fileExt = pathinfo($filename, PATHINFO_EXTENSION);  // Extract file extension
            $newFilename = $prefix . $count . '.' . $fileExt;
            $oldPath = $directory . '/' . $filename;
            $newPath = $directory . '/' . $newFilename;
            rename($oldPath, $newPath);
            echo "Renamed $filename to $newFilename\n";
            $count++;
        }
    }
}

// Check if the required command-line arguments are provided
if (count($argv) !== 3) {
    echo "Usage: php rename_files.php <directory> <prefix>\n";
    exit(1);
}

// Get the directory path and prefix from the command-line arguments
$directory = $argv[1];
$prefix = $argv[2];

// Call the function to rename the files
renameFiles($directory, $prefix);
