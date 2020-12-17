<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="<?php echo base_url('assets/materialize/css/materialize.css'); ?>">
    <script src="<?php echo base_url('assets/materialize/js/materialize.min.js');?>"></script>
</head>
<body>
    <p><?php echo $title; ?></p>
    <h4><?php echo $heading; ?></h4>
    
    <?php 
        echo anchor('login/logout', 'Logout', ['class' => 'btn waves-effect waves-light']);
        echo '<br>';
        echo '<br>';

        echo form_open('berita/tambah_data', '');
        echo form_input(array('placeholder' => 'Nama Barang', 'name' => 'Barang'));
        echo form_input(array('placeholder' => 'Harga', 'name' => 'Harga'));
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
        echo '<br>';
        echo '<br>';

        echo form_submit(array('value' => 'Submit', 'class' => 'btn waves-effect waves-light'));
        echo form_close();

        echo '<br>';
        echo '<br>';
    ?>

    <?php echo anchor('berita/tambahKategori', 'Tambah Kategori', ['class' => 'btn waves-effect waves-light']); ?>

    <h3><?php echo $message; ?></h3>

    <?php
        $template = array('table_open' => '<table border="1">');
        $this->table->set_template($template);
        $this->table->set_heading('Id', 'Nama Barang', 'Harga', 'Kategori', 'Aksi'); 
        
        foreach($konten as $row){
            $this->table->add_row(
                $row->id_barang,
                $row->barang,
                $row->harga_barang,
                $row->kategori,
                // '<a href="/Berita/berita_">Hapus</a> <a href="#">Ubah</a>',
                anchor('berita/hapus_berita?id='.$row->id_barang, 'Hapus').' | '.anchor('berita/edit_berita?id='.$row->id_barang, 'Edit')
            );
        }

        echo $this->table->generate();
    ?>


</body>
</html>