<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Buku</h2>
    <?php 
        echo anchor('login/logout', 'Logout');
        echo '<br>';
        echo '<br>';

        echo form_open('berita/edit_berita_proses', '');
        echo form_input(array('name' => 'id', 'readonly'=>'true', 'value'=>$id));
        echo form_input(array('placeholder' => 'Barang', 'name' => 'barang'));
        echo form_input(array('placeholder' => 'Harga', 'name' => 'harga'));
        ?>
            <select name="Kategori" id="Kategori">
                <?php
                    foreach($kategori as $row){
                        ?>
                            <option value="<?php echo $row->id_kategori ?>"><?php echo $row->kategori ?></option>
                        <?php
                    }
                ?>
            </select>
        <?php
        echo form_submit(array('value' => 'Submit'));
        echo form_close();
    ?>

</body>
</html>