
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

$cities_query = $pdo->query("SELECT COUNT(DISTINCT city) AS city_count FROM properties WHERE status='available'");
$cities_count = $cities_query->fetch(PDO::FETCH_ASSOC)['city_count'];

$properties_query = $pdo->query("SELECT COUNT(*) AS properties_count FROM properties");
$properties_count = $properties_query->fetch(PDO::FETCH_ASSOC)['properties_count'];

$clients_query = $pdo->query("SELECT COUNT(*) AS clients_count FROM clients");
$clients_count = $clients_query->fetch(PDO::FETCH_ASSOC)['clients_count'];
?>
<h2><?=__('We are hosting')?> <?=$clients_count?> <?=__('customers')?> </h2>
<h2><?=__('We offer')?> <?=$properties_count?><?=__('houses in')?>  <?=$cities_count?> <?=__('cities')?></h2>
<h2><?=__('Here are a few of them:')?> </h2>

<table>
    <thead>
            <th><?=__('Address')?></th>
            <th><?=__('Type')?></th>
            <th><?=__('Price')?></th>
            <th><?=__('City')?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($properties as $property): ?>
        <tr>
            <td><?= $property['city'] ?></td>
            <td><?= $property['address'] ?></td>
            <td><?= $property['property_type'] ?></td>
            <td><?= $property['price'] ?> $</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

