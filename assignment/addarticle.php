<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>YD Article</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #adff2f;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    .submit-btn {
      background-color: #d32f2f;
      color: white;
      padding: 12px 20px;
      border: none;
      font-size: 18px;
      cursor: pointer;
      width: 100%;
    }
    .submit-btn:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>

<div class="p-5 md:px-40 bg-blue-400">
  <h4 class="text-4xl font-serif text-center py-5 text-blue-900">Add an Article</h4>

  <!-- Form sends data to viewarticle.php -->
  <form action="viewarticle.php" method="post" enctype="multipart/form-data"
        class="max-w-4xl mx-auto bg-white p-6 rounded shadow mt-6">

    <!-- Article Name -->
    <div class="mb-4">
      <label for="article_name" class="block font-semibold mb-1">Name of the article</label>
      <input type="text" id="article_name" name="article_name" required />
    </div>

    <!-- Article Image -->
    <div class="mb-4">
      <label for="article_image" class="block font-semibold mb-1">Image of the article</label>
      <input type="file" id="article_image" name="article_image" accept="image/*" />
    </div>

    <!-- Author Name -->
    <div class="mb-4">
      <label for="author_name" class="block font-semibold mb-1">Author's name</label>
      <input type="text" id="author_name" name="author_name" required />
    </div>

    <!-- Telephone Number -->
    <div class="mb-4">
      <label for="telephone_number" class="block font-semibold mb-1">Telephone Number</label>
      <input type="tel" id="telephone_number" name="telephone_number" required />
    </div>

    <!-- Home Address -->
    <div class="mb-4">
      <label for="home_address" class="block font-semibold mb-1">Home Address</label>
      <input type="text" id="home_address" name="home_address" required />
    </div>

    <!-- Article Content -->
    <div class="mb-4">
      <label for="article_content" class="block font-semibold mb-1">Article Content</label>
      <textarea id="article_content" name="article_content" rows="8" required></textarea>
    </div>

    <!-- Comment -->
    <div class="mb-4">
      <label for="comment" class="block font-semibold mb-1">Comment (Optional)</label>
      <textarea id="comment" name="comment" rows="4"></textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="submit-btn">Submit Article</button>
  </form>
</div>

</body>
</html>
