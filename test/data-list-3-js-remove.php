<?php
$title = '資料列表';
require __DIR__ . '/0825-parts/__connectDb.php';


$stmt = $pdo->query("SELECT * FROM addressTable LIMIT 5 ");
// $rows = $stmt->fetchAll();
?>

<?php require __DIR__ . '/0825-parts/__html-h.php' ?>
<?php require __DIR__ . '/0825-parts/__nav.php' ?>

<div class="container">
    <table class="table">
        <thead>
            <!-- `id``name``address``e-mail``phone``birthday``createDt` -->
            <tr>
                <th scope="col"><i class="fas fa-trash-alt"></i></th>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">address</th>
                <th scope="col">e-mail</th>
                <th scope="col">phone</th>
                <th scope="col">birthday</th>
                <th scope="col">createDt</th>
            </tr>
        </thead>
        <style>
            .my-trash-i {
                color: #00F;
                cursor: pointer;
            }
        </style>
        <tbody>
            <?php while ($r = $stmt->fetch()) : ?>
                <tr id="tr<?= $r['id'] ?>">
                    <!-- <td><a href="javascript:deleteItems(<?= $r['id'] ?>)"><i class="fas fa-trash-alt"></i></a></td> -->

                    <td><i class="fas fa-trash-alt my-trash-i"></i></td>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['address'] ?></td>
                    <td><?= $r['e-mail'] ?></td>
                    <td><?= $r['phone'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= $r['createDt'] ?></td>

                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

</div>
<!-- <script>
    function deleteItems(id) {
        const item = document.querySelector(`#tr${id}`);
        item.innerHTML = '';
    }
</script> -->
<script>
    const trash = document.querySelectorAll('.my-trash-i');

    const trashHandler = (event) => {
        const t = event.target;
        t.closest('tr').remove();
    };

    trash.forEach(el => {
        el.addEventListener('click', trashHandler);
    });
</script>
<?php include __DIR__ . '/0825-parts/__js.php' ?>
<?php include __DIR__ . '/0825-parts/__html-f.php' ?>