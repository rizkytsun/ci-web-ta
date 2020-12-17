<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        echo form_open('berita/tambahKategoriProses', '');
        echo form_input(array('placeholder' => 'Nama Kategori', 'name' => 'Kategori'));
        echo form_submit(array('value' => 'Submit'));
        echo form_close();

    ?>
</body>
</html>