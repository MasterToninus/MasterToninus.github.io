<?php
// Define the folder containing images
$folder = '../../img'; // Replace 'images' with the relative path to your image folder

/**
 * Function to recursively scan a directory for images.
 *
 * @param string $dir - The directory to scan.
 * @return array - An array of image file paths.
 */
function getImages($dir) {
    $images = [];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Supported image formats

    // Scan the directory for files and subdirectories
    $files = scandir($dir);

    foreach ($files as $file) {
        // Skip the current and parent directory pointers
        if ($file === '.' || $file === '..') {
            continue;
        }

        $filePath = $dir . DIRECTORY_SEPARATOR . $file;

        if (is_dir($filePath)) {
            // Recursively scan subdirectories
            $images = array_merge($images, getImages($filePath));
        } elseif (is_file($filePath)) {
            // Check if the file has an allowed extension
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $allowedExtensions)) {
                $images[] = $filePath;
            }
        }
    }

    return $images;
}

// Get all images from the folder and subfolders
$imageFiles = getImages($folder);

// Check if there are images to display
if (empty($imageFiles)) {
    die('<p>No images found in the specified folder.</p>');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        .gallery-item {
            width: calc(50% - 10px); /* Two columns */
            text-align: center;
        }
        .gallery-item img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <h1>Image Gallery</h1>
    <div class="gallery">
        <?php foreach ($imageFiles as $image): ?>
            <div class="gallery-item">
                <!-- Create a clickable thumbnail linking to the original image -->
                <a href="<?= htmlspecialchars($image) ?>" target="_blank">
                    <img src="<?= htmlspecialchars($image) ?>" alt="Image Thumbnail">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

