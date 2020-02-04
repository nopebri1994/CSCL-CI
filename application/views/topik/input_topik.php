<?php
	echo form_open("topik/topik/input_data");
	echo date('Y/m/d');
?>

<table>
	<tr>
		<td>judul_topik</td><td><input type="text" name="judul"></td>
	</tr>
	<tr>
		<td>Isi</td><td><textarea name="isi"></textarea></td>
	</tr>
		<tr>
		<td rowspan='2'>Tujuan Topik</td><td>
											<select name="kelas">
												<option value="">Pilih Kelas</option>
												<option value="1">Kelas 1</option>
											</select>						
												</td>
	</tr>
	<tr>
										<td>
											<select name="kelompok">
												<option value="">Pilih Kelompok</option>
												<option value="1">kelompok 1</option>
											</select>						
												</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Tambahkan Data"></td>
	</tr>

</table>
<?php
	echo form_close();
?>