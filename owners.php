<!DOCTYPE html>
<head>
<?php include 'db_connection.php'; ?>
<link rel="stylesheet" href="styles.css">
<?php include 'header.php'; ?>
</head>
<body>
<dev id="header"></dev>
<?php
$stmt = $pdo->query("SELECT o.name AS owner_name, o.email, p.address, p.city, p.property_type, p.price
FROM owners o
JOIN properties_owners po ON o.id = po.owner_id
JOIN properties p ON po.property_id = p.id
ORDER BY o.name ASC, p.price DESC;");
$owners = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Property address</th>
            <th>Type</th>
            <th>Property price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($owners as $owner): ?>
        <tr>
            <td><?= $owner['owner_name'] ?></td>
            <td><?= $owner['email'] ?></td>
            <td><?= $owner['address'] ?></td>
            <td><?= $owner['property_type'] ?></td>
            <td><?= $owner['price'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

