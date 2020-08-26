<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= WEB_ROOT ?>/bootstrap/js/bootstrap.js"></script>
<script>
    function deleteItem(id) {

        const item = document.getElementById(id);
        item.innerHTML = '';
    }
</script>