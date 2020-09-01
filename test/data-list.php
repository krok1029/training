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

                <?php if (isset($_SESSION['admin'])) : ?>
                    <th scope="col"><i class="fas fa-trash-alt"></i></th>
                    <th scope="col"><i class="fas fa-user-times"></i></th>
                <?php endif; ?>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">address</th>
                <th scope="col">e-mail</th>
                <th scope="col">phone</th>
                <th scope="col">birthday</th>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <th scope="col"><i class="fas fa-edit"></i></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>

                    <?php if (isset($_SESSION['admin'])) : ?>
                        <td>
                            <a href="data-delete.php?id=<?= $r['id'] ?>" onclick="ifDel(event)" data-id="<?= $r['id'] ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:delete_it(<?= $r['id'] ?>)">
                                <i class="fas fa-user-times"></i>
                            </a>
                        </td>
                    <?php endif; ?>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['name'] ?></td>

                    <td><?= strip_tags($r['address']) ?></td>
                    <td><?= htmlentities($r['email']) ?></td>
                    <td><?= $r['phone'] ?></td>
                    <td><?= $r['birthday'] ?></td>

                    <?php if (isset($_SESSION['admin'])) : ?>
                        <td>
                            <a href="data-edit.php?id=<?= $r['id'] ?>"><i class="fas fa-edit"></i>
                            </a>
                        </td>

                    <?php endif; ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/0825-parts/__js.php' ?>
<script>
    function ifDel(event) {
        const a = event.currentTarget;
        const id = a.getAttribute('data-id');
        if (!confirm(`確定要刪除 ${id}?`)) {
            // event.preventDefault();
        }
    }

    function delete_it(sid) {
        if (confirm(`是否要刪除編號為 ${sid} 的資料???`)) {
            location.href = 'data-delete.php?id=' + sid;
        }
    }
</script>
<?php include __DIR__ . '/0825-parts/__html-f.php' ?>