<?php
$title = 'addDaaaata';
$page_name = 'data-insert';
require __DIR__ . '/0825-parts/__connectDb.php';
require __DIR__ . '/0825-parts/__admin_required.php';

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
    <h2>insert</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-success" role="alert" id="infobar" style="display: none;">
                A simple success alert—check it out!
            </div>
            <div class="card-body">
                <h5 class="card-title">Add Datas</h5>
                <form name="form1" onsubmit="return checkFrom()" novalidate>
                    <div class="form-group">
                        <label for="name"><span class="red-star">**</span>Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required>
                        <small id="" class="form-text error-msg"></small>

                    </div>
                    <div class="form-group">
                        <label for="address">Addr</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="email"><span class="red-star">**</span>Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        <small id="" class="form-text  error-msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birth</label>
                        <input type="date" class="form-control" id="birthday" aria-describedby="emailHelp" name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="phone"><span class="red-star">**</span>phone</label>
                        <input type="tel" class="form-control" id="phone" aria-describedby="emailHelp" name="phone" pattern="09\d{2}-?\d{3}-?\d{3}-?">
                        <small id="" class="form-text error-msg"></small>
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

    function checkFrom() {
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
            fetch('./data-insert-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => {

                    // console.log(r);
                    return r.json();
                })
                .then(obj => {
                    console.log(obj);
                    // console.log(obj.success);
                    if (obj.success) {
                        infobar.innerHTML = 'Add success!';
                        infobar.className = "alert alert-success";
                        setTimeout(() => {
                            location.href = './data-list.php';
                        }, 3000);
                        // if (infobar.classList.contains('alert-danger')) {
                        //     infobar.classList.replace('alert-danger', 'alert-success');
                        // }
                    } else {
                        infobar.innerHTML = obj.error || 'fail';
                        infobar.className = "alert alert-danger";
                        submitBtn.style.display = "block";
                        // if (infobar.classList.contains('alert-success')) {
                        //     infobar.classList.replace('alert-success', 'alert-danger');
                        // }
                    }
                    infobar.style.display = "block";
                });
        } else {

            submitBtn.style.display = "block";
        }
        return false;
    }
</script>
<?php include __DIR__ . '/0825-parts/__html-f.php' ?>