<!-- Main Content -->
<main class="flex-1 p-6">
<div class="mb-4">
    <a href="category" class="bg-fuchsia-500 text-white px-4 py-2 rounded-md hover:bg-fuchsia-600 transition-all">Back</a>
</div>
<form method="POST" class="bg-white p-6 rounded shadow-md max-w-lg">
<?php if (isset($resp['status'])): ?>
            <p class="text-yellow-500 text-center mt-2"><?= $resp['message'] ?></p>
<?php endif; ?>
<div class="mb-4">
<input type="number" name="id" value="<?=$_GET['id']?>" hidden required>
    <label class="block font-medium mb-1">Category Name</label>
    <input type="text" name="name" value="<?=$category['category_name']?>" class="w-full p-2 border rounded" required>
</div>
    <button type="submit" name="submit" class="bg-blue-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Update Category</button>
</form>
</main>