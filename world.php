<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = '';
if (isset($_GET['country'])){
  $country = trim($_GET['country']);
}

$lookup = '';
if (isset($_GET['lookup'])){
  $lookup = trim($_GET['lookup']);
}


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if ($lookup == 'cities'){
  $stmt = $conn->query("SELECT c.name AS city_name, c.district, c.population FROM cities c JOIN countries ct ON c.country_code = ct.code WHERE ct.name LIKE '%$country%' ");
}else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if ($lookup == 'cities'): ?>
  <table>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
</tr>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['city_name']; ?></td>
    <td><?= $row['district']; ?></td>
    <td><?= $row['population']; ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php else: ?>
<table>
  <tr>
    <th>Country Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
</tr>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['name']; ?> </td>
    <td><?= $row['continent']; ?></td>
    <td><?= $row['independence_year']; ?></td>
    <td><?= $row['head_of_state']; ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
