<!DOCTYPE html>
<head>
<?php include 'db_connection.php'; ?>
<link rel="stylesheet" href="styles.css">
<?php include 'header.php'; ?>
</head>
<body>
<dev id="header"></dev>
<?php
$stmt = $pdo->query("SELECT c.name AS client_name, c.budget, p.address, p.city, p.price
FROM clients c
JOIN properties p ON p.price <= c.budget
ORDER BY c.name, p.price ASC;");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
        <tr>
            <th><?=__('Name')?></th>
            <th><?=__('Budget')?></th>
            <th><?=__('Address')?></th>
            <th><?=__('City')?></th>
            <th><?=__('Property price')?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $client['client_name'] ?></td>
            <td><?= $client['budget'] ?></td>
            <td><?= $client['address'] ?></td>
            <td><?= $client['city'] ?></td>
            <td><?= $client['price'] ?> $</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

