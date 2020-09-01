<?php
require __DIR__ . '/0825-parts/__connectDb.php';

if (!empty($_FILES) && !empty($_FILES['myfile']['name'])) {
    // header('Content-Type: text/plain');
    echo '<pre>';
    var_dump($_FILES);
    echo '</pre>';
    move_uploaded_file(
        $_FILES['myfile']['tmp_name'],
        __DIR__ . '/../upload/' . $_FILES['myfile']['name']
    );

    echo "<img src='../upload/{$_FILES['myfile']['name']}'>";
    exit;
}

?>

<?php require __DIR__ . '/0825-parts/__html-h.php'; ?>
<?php include __DIR__ . '/0825-parts/__nav.php'; ?>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="myfile" name="myfile" accept="image/*">
        </div>
        <input class="btn btn-primary" type="submit" value="上傳">
    </form>

</div>
<?php include __DIR__ . '/0825-parts/__js.php'; ?>
<?php include __DIR__ . '/0825-parts/__html-f.php'; ?>