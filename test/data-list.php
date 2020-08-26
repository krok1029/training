<?php
$title = '資料列表';
require __DIR__ . '/0825-parts/__connectDb.php';


$stmt = $pdo->query("SELECT * FROM addressTable LIMIT 5 ");
$rows = $stmt->fetchAll();
?>

<?php require __DIR__ . '/0825-parts/__html-h.php' ?>
<?php require __DIR__ . '/0825-parts/__nav.php' ?>
<div class="container">
    <table class="table">
        <thead>
            <!-- `id``name``address``e-mail``phone``birthday``createDt` -->
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">address</th>
                <th scope="col">e-mail</th>
                <th scope="col">phone</th>
                <th scope="col">birthday</th>
                <th scope="col">createDt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['address'] ?></td>
                    <td><?= $r['e-mail'] ?></td>
                    <td><?= $r['phone'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= $r['createDt'] ?></td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/0825-parts/__js.php' ?>
<?php include __DIR__ . '/0825-parts/__html-f.php' ?>