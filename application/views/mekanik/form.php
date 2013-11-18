<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#kode").focus();
	
	$("#kode").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
		CariDataMekanik();
	});
	
	function CariDataMekanik(){
		var kode = $("#kode").val()
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/InfoMekanik",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				$("#nama_mekanik").val(data.nama_mekanik);
				$("#alamat").val(data.alamat);
				$("#hp").val(data.hp);
			}
		});
	}
	
	$("#simpan").click(function(){
		var kode		= $("#kode").val();
		var nama_mekanik	= $("#nama_mekanik").val();
		var alamat		= $("#alamat").val();
		
		var string = $("#form").serialize();
		
		if(kode.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#kode").focus();
			return false();
		}
		if(nama_mekanik.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Mekanik tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#nama_mekanik").focus();
			return false();
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/mekanik/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
				CariSimpanan();
			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});
		return false();		
	});
	
});	
</script>
<form name="form" id="form">
<fieldset class="atas">
<table width="100%">
<tr>    
	<td width="150">Kode</td>
    <td width="5">:</td>
    <td><input type="text" name="kode" id="kode" size="20" maxlength="20" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $kode;?>" /></td>
</tr>
<tr>    
	<td>Nama Mekanik</td>
    <td>:</td>
    <td><input type="text" name="nama_mekanik" id="nama_mekanik"  size="50" maxlength="50" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $nama;?>"/></td>
</tr>
<tr>    
	<td>Hp</td>
    <td>:</td>
    <td><input type="text" name="hp" id="hp"  size="15" maxlength="15" value="<?php echo $hp;?>"/>
    </td>
</tr>
<tr>    
	<td>Alamat</td>
    <td>:</td>
    <td><input type="text" name="alamat" id="alamat"  size="80" maxlength="80" value="<?php echo $alamat;?>"/>
    </td>
</tr>
</table>
</fieldset>
<fieldset class="bawah">
<table width="100%">
<tr>
	<td colspan="3" align="center">
    <button type="button" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/mekanik/tambah">
    <button type="button" name="tambah_data" id="tambah_data" class="easyui-linkbutton" data-options="iconCls:'icon-add'">TAMBAH</button>
    </a>
    <a href="<?php echo base_url();?>index.php/mekanik/">
    <button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>  
</fieldset>   
</form>