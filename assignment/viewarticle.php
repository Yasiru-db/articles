<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Submitted Article Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-500 p-4">

  <!-- Header Section -->
  <header class="bg-gray-800 text-white py-4">
    <div class="flex justify-center">
      <img src="images/articale.jpg" alt="Article Banner" class="h-24 rounded">
    </div>
  </header>

  <!-- Navigation -->
  <div class="container bg-[#d62939] px-5 py-3 font-serif flex justify-between">
    <a href="addarticle.php" class="text-2xl text-white">YD Article</a>
    <a href="index.php" class="bg-black hover:bg-white hover:text-black py-1 px-3 text-white rounded">Back</a>
  </div> 

  <!-- Content -->
  <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow mt-6">
    <h2 class="text-xl font-bold mb-4">Submitted Details:</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $article_name = htmlspecialchars(trim($_POST['article_name'] ?? 'Not provided'));
        $author = htmlspecialchars(trim($_POST['author_name'] ?? 'Not provided'));
        $content = htmlspecialchars(trim($_POST['article_content'] ?? 'Not provided'));
        $telephone_number = htmlspecialchars(trim($_POST['telephone_number'] ?? 'Not provided'));
        $home_address = htmlspecialchars(trim($_POST['home_address'] ?? 'Not provided'));
        $comment = htmlspecialchars(trim($_POST['comment'] ?? 'Not provided'));
        
        // Validate content length
        if (strlen($content) < 400) {
            echo "<p class='text-red-600 font-bold'>Content must be at least 400 characters.</p>";
        } else {
            echo "<p class='mb-2'><strong>Article Name:</strong> $article_name</p>";
            echo "<p class='mb-2'><strong>Author:</strong> $author</p>";
            echo "<p class='mb-2'><strong>Content:</strong></p>";
            echo "<div class='border p-2 mb-4 max-h-64 overflow-y-auto bg-gray-50 whitespace-pre-line'>" . nl2br($content) . "</div>";
            echo "<p class='mb-2'><strong>Telephone Number:</strong> $telephone_number</p>";
            echo "<p class='mb-2'><strong>Home Address:</strong> $home_address</p>";
            echo "<p class='mb-2'><strong>Comment:</strong> $comment</p>";

            // Handle image upload
            if (isset($_FILES['article_image']) && $_FILES['article_image']['error'] === UPLOAD_ERR_OK) {
                $upload_dir = 'uploads/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                $img_name = basename($_FILES['article_image']['name']);
                $img_tmp = $_FILES['article_image']['tmp_name'];
                $destination = $upload_dir . $img_name;

                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                $file_type = mime_content_type($img_tmp);

                if (in_array($file_type, $allowed_types)) {
                    if (move_uploaded_file($img_tmp, $destination)) {
                        echo "<div class='mt-4'>";
                        echo "<strong>Uploaded Image:</strong><br/>";
                        echo "<img src='$destination' alt='Article Image' class='max-w-xs mt-2 rounded shadow' />";
                        echo "</div>";
                    } else {
                        echo "<p class='text-red-500'>Image upload failed.</p>";
                    }
                } else {
                    echo "<p class='text-red-500'>Invalid image type. Please upload JPG, PNG, or GIF only.</p>";
                }
            } else {
                echo "<p class='text-gray-600 italic'>No image uploaded.</p>";
            }
        }
    } else {
        echo "<p class='text-red-500'>No data received.</p>";
    }
    ?>

    <div class="mt-6 text-center">
      <a href="addarticle.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Another Article</a>
    </div>
  </div>

  <!-- Footer -->
  <?php $owner = "Yasiru Dewmina"; ?>
  <footer class="container bg-black text-white p-4 mt-10 border-4 border-double border-red-500 text-center">
    <p>All rights reserved.</p>
    <p><?php echo "A Product of $owner"; ?></p>
  </footer>

</body>
</html>
