<?php
$title = '資料列表';
$page_name = 'data-list';
require __DIR__ . '/0825-parts/__connectDb.php';

?>

<?php require __DIR__ . '/0825-parts/__html-h.php' ?>
<?php require __DIR__ . '/0825-parts/__nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination {o.active}">
                    <!-- <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>

                    <li class="page-item ">
                        <a class="page-link" href="?page="></a>
                    </li>

                    <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li> -->
                </ul>
            </nav>

        </div>
    </div>


    <table class="table table-striped">
        <!-- `sid`, `name`, `email`, `mobile`, `birthday`, `address`, `created_at` -->
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">電郵</th>
                <th scope="col">手機</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>
<?php include __DIR__ . '/0825-parts/__js.php' ?>
<script>
    const tboday = document.querySelector('tbody');
    let pageData;

    const hashHandler = function(event) {
        let h = parseInt(location.hash.slice(1)) || 1;
        if (h < 1) h = 1;
        console.log(`h: ${h}`);
        getData(h);
    };
    window.addEventListener('hashchange', hashHandler);
    hashHandler(); // 頁面一進來就直接呼叫

    const pageItemTpl = (o) => {

        return `<li class="page-item ${o.active}">
                        <a class="page-link" href="#${o.page}">${o.page}</a>
                </li>`;
    };
    // const pageItemTpl = (o) => {

    //     return `<li class="page-item ${o.active}">
    //             <a class="page-link" href="#">${o.page}</a>
    //     </li>`;
    // };
    const tableRowTpl = (o) => {

        return `
        <tr>
            <td>${o.id}</td>
            <td>${o.name}</td>
            <td>${o.email}</td>
            <td>${o.phone}</td>
            <td>${o.birthday}</td>
            <td>${o.address}</td>
        </tr>
        `;
    };

    // fetch('data-list2-api.php')
    //     .then(r => r.json())
    //     .then(obj => {
    //         console.log(obj);
    //         let str = '';
    //         for (let i of obj.rows) {
    //             str += tableRowTpl(i);
    //         }
    //         tboday.innerHTML = str;
    //     });


    function getData(page = 1) {
        fetch('data-list2-api.php?page=' + page)
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                pageData = obj;
                let str = '';
                for (let i of obj.rows) {
                    str += tableRowTpl(i);
                }
                tboday.innerHTML = str;

                str = '';
                for (let i = obj.page - 3; i <= obj.page + 3; i++) {
                    if (i < 1) continue;
                    if (i > obj.totalPages) continue;
                    const o = {
                        page: i,
                        active: ''
                    }
                    if (obj.page === i) {
                        o.active = 'active';
                    }
                    str += pageItemTpl(o);
                }
                document.querySelector('.pagination').innerHTML = str;
            });
    }
</script>
<?php include __DIR__ . '/0825-parts/__html-f.php' ?>