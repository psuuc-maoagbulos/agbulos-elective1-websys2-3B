<!-- getrecipes.php -->
<?php
require '../connection.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';

$stmt = "SELECT * FROM recipes";

if ($category) {
    $stmt .= " WHERE category = '$category'";
}

$stmt .= " ORDER BY timeshared DESC";

$container = $conn->query($stmt);

$recipes = [];
while ($row = $container->fetch_assoc()) {
    $recipes[] = [
        'id' => $row['id'],
        'recipe_name' => $row['recipe_name'],
        'category' => $row['category'],
        'username' => $row['username'],
        'image_path' => $row['image_path'],
    ];
}

echo json_encode($recipes);
?>
