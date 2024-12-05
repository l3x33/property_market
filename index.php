<!DOCTYPE html>
<head>
<?php include 'db_connection.php'; ?>
<link rel="stylesheet" href="styles.css">
<?php include 'header.php'; ?>
</head>
<body>
<dev id="header"></dev>
<?php
$stmt = $pdo->query("SELECT * FROM properties WHERE status='available' ORDER BY city desc");
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $cities_query = $pdo->query("SELECT COUNT(DISTINCT city) AS city_count FROM properties WHERE status='available'");
// $cities_count = $cities_query->fetch(PDO::FETCH_ASSOC)['city_count'];
?>
<!-- <h2>We are hosting x customers<h2>
<h2>We offer x homes in cities_count cities</h2>
<h2>Here are a few of them:</h2> -->
<?php
$stmt = $pdo->query("SELECT * FROM properties WHERE status='available' ORDER BY city desc");
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
        <tr>
            <th>City</th>
            <th>Adress</th>
            <th>Type</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($properties as $property): ?>
        <tr>
            <td><?= $property['city'] ?></td>
            <td><?= $property['address'] ?></td>
            <td><?= $property['property_type'] ?></td>
            <td><?= $property['price'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

