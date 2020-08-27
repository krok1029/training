<?php
$title = 'addDaaaata';
$page_name = 'data-insert';
require __DIR__ . '/0825-parts/__connectDb.php';

?>
<?php require __DIR__ . '/0825-parts/__html-h.php' ?>
<?php require __DIR__ . '/0825-parts/__nav.php' ?>
<div class="container">
    <h2>insert</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body">
                <h5 class="card-title">Add Datas</h5>
                <form name="form1" onsubmit="return checkFrom()">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="form-group">
                        <label for="address">Addr</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="e-mail">Email</label>
                        <input type="email" class="form-control" id="e-mail" aria-describedby="emailHelp" name="e-mail">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birth</label>
                        <input type="date" class="form-control" id="birthday" aria-describedby="emailHelp" name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" name="phone">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/0825-parts/__js.php' ?>
<script>
    function checkFrom() {
        const fd = new FormData(document.form1);

        //TODO 檢查資料格式

        fetch('./data-insert-api.php', {
                method: 'POST',
                body: fd

            })
            .then(r => r.text())
            .then(str => console.log(str));
        return false;
    }
</script>
<?php include __DIR__ . '/0825-parts/__html-f.php' ?>