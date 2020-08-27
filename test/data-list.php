<?php
$title = '資料列表';
$page_name = 'data-list';
require __DIR__ . '/0825-parts/__connectDb.php';
$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$t_sql = "SELECT count(1) FROM addressTable ";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);
// die('');
$rows = [];
if ($totalRows > 0) {
    if ($page < 1) {
        header('Location: data-list.php?page=1');
        exit;
    };
    if ($page > $totalPages) {
        header('Location: data-list.php?page=' . $totalPages);
        exit;
    };;
    $sql = sprintf("SELECT * FROM addressTable order by id desc LIMIT %s ,%s ", ($page - 1) * $perPage, $perPage);

    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}

?>

<?php require __DIR__ . '/0825-parts/__html-h.php' ?>
<?php require __DIR__ . '/0825-parts/__nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 3; $i <= $page + 3; $i++) :
                        if ($i < 1) continue;
                        if ($i > $totalPages) break;
                    ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?>
                            </a>
                        </li>
                    <?php endfor ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $page + 1 ?>"><i class="fas fa-arrow-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
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