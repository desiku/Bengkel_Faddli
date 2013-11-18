<div id="view">
<div style="float:left; padding-bottom:5px;">
<a href="<?php echo base_url();?>index.php/mekanik/tambah">
<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
</a>
<a href="<?php echo base_url();?>index.php/mekanik">
<button type="button" name="refresh" id="refresh" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
</a>

</div>
<div style="float:right; padding-bottom:5px;">
<form name="form" method="post" action="<?php echo base_url();?>index.php/mekanik">
Cari Kode & Nama Supplier : <input type="text" name="txt_cari" id="txt_cari" size="50" />
<button type="submit" name="cari" id="cari" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
</form>
</div>
<div id="gird" style="float:left; width:100%;">
<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Kode</th>
    <th>Nama Mekanik</th>
    <th>HP</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		?>    
    	<tr>
			<td align="center" width="50"><?php echo $no; ?></td>
            <td align="center" width="200" ><?php echo $db['id_mekanik']; ?></td>
            <td ><?php echo $db['nama_mekanik']; ?></td>
            <td ><?php echo $db['hp']; ?></td>
            <td ><?php echo $db['alamat']; ?></td>
            <td align="center" width="80">
            <a href="<?php echo base_url();?>index.php/mekanik/edit/<?php echo $db['id_mekanik'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
			</a>
            <a href="<?php echo base_url();?>index.php/mekanik/hapus/<?php echo $db['id_mekanik'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
			<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="5" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>
<?php echo "<table align='center'><tr><td>".$paginator."</td></tr></table>"; ?>
</div>
</div>