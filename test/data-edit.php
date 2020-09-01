<?php
$page_title = '編輯資料';
$page_name = 'data-edit';
require __DIR__ . '/0825-parts/__connectDb.php';
require __DIR__ . '/0825-parts/__admin_required.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (empty($id)) {
    echo '123';

    header('Location: data-list.php');
    exit;
}

$sql = " SELECT * FROM addressTable WHERE id=$id";
$row = $pdo->query($sql)->fetch();
if (empty($row)) {
    echo '456';

    header('Location: data-list.php');
    exit;
}

?>
<?php require __DIR__ . '/0825-parts/__html-h.php' ?>
<style>
    .red-star {
        color: red;
    }

    small.error-msg {
        color: red;
    }
</style>

<?php require __DIR__ . '/0825-parts/__nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-success" role="alert" id="infobar" style="display: none;">
                A simple success alert—check it out!
            </div>
            <div class="card-body">
                <h5 class="card-title">編輯資料</h5>

                <form name="form1" onsubmit="checkForm(); return false ;" novalidate>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="form-group">
                        <label for="name"><span class="red-stars">**</span> name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="<?= htmlentities($row['name']) ?>">
                        <small class="form-text error-msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="email"><span class="red-stars">**</span> email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlentities($row['email']) ?>">
                        <small class="form-text error-msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="phone"><span class="red-stars">**</span> phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlentities($row['phone']) ?>" pattern="09\d{2}-?\d{3}-?\d{3}">
                        <small class="form-text error-msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="birthday">birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="<?= htmlentities($row['birthday']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="3"><?= htmlentities($row['address']) ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/0825-parts/__js.php' ?>
<script>
    const email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $name = document.querySelector('#name');
    const $email = document.querySelector('#email');
    const $mobile = document.querySelector('#phone');
    const r_fields = [$name, $email, $mobile];
    const infobar = document.querySelector('#infobar');
    const submitBtn = document.querySelector('button[type=submit]');

    function checkForm() {
        let isPass = true;

        r_fields.forEach(el => {
            el.style.borderColor = '#CCCCCC';
            el.nextElementSibling.innerHTML = '';
        });
        submitBtn.style.display = 'none';
        // TODO: 檢查資料格式
        if ($name.value.length < 2) {
            isPass = false;
            $name.style.borderColor = 'red';
            $name.nextElementSibling.innerHTML = '請填寫正確的姓名';
        }
        if (!email_pattern.test($email.value)) {
            isPass = false;
            $email.style.borderColor = 'red';
            $email.nextElementSibling.innerHTML = '請填寫正確的信箱';
        }
        if (!mobile_pattern.test($mobile.value)) {
            isPass = false;
            $mobile.style.borderColor = 'red';
            $mobile.nextElementSibling.innerHTML = '請填寫正確的號碼';
        }
        if (isPass) {
            const fd = new FormData(document.form1);
            fetch('data-edit-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        infobar.innerHTML = '修改成功';
                        infobar.className = "alert alert-success";
                        console.log('qwe==' + '<?= $_SERVER['HTTP_REFERER'] ?? "data-list.php" ?>');

                        setTimeout(() => {
                            location.href = '<?= $_SERVER['HTTP_REFERER'] ?? "data-list.php" ?>';
                        }, 3000)

                    } else {
                        infobar.innerHTML = obj.error || '資料沒有修改';
                        infobar.className = "alert alert-danger";
                        submitBtn.style.display = 'block';
                    }
                    infobar.style.display = 'block';
                });
        } else {

            submitBtn.style.display = "block";
        }
    }
</script>
<?php include __DIR__ . '/0825-parts/__html-f.php' ?>