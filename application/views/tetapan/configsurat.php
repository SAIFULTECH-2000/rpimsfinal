<script src="<?=base_url('vendor/tinymce/tinymce/')?>tinymce.min.js" referrerpolicy="origin"></script>

<section class="form-section">
  <form method="post" >
<table>
      <div id="back">
    <a href="<?=base_url('tetapan')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
  </div>
  <h2><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;&nbsp;SURAT PERLANTIKAN</h2><hr>
  <tr>
      <td>
          <b>LOGO:</b><br>
          <img src="<?=base_url('assets/img/')?><?=$row['logoheader']?>"  width="250px">
          <div class="mb-3">
          <input class="form-control" type="file" id="formFile" name="logo">
          </div>
    </td>
  </tr>
  <tr>
    <td>
      <b>Tanggungjawab</b><br>
      <textarea id="mytextarea" name="tugas"><?=$row['tugas']?></textarea>
    </td>
  </tr>
  <tr>
    <td>
      <b>Tanggungjawab 2</b><br>
      <textarea id="mytextarea" name="tugas2"><?=$row['tugas2']?></textarea>
    </td>
  </tr>
  <tr>
      <td>
          <b>SIGN:</b><br>
          <img src="<?=base_url('assets/img/')?><?=$row['sign']?>"  width="250px">
          <div class="mb-3">
          <input class="form-control" type="file" name="sign" id="formFile">
          </div>
    </td>
  </tr>
  
  <tr>
    <td>
      <b>signdetails</b><br>
      <textarea id="mytextarea" name="signdetails"><?=$row['signdetails']?></textarea>
    </td>
  </tr>
  <tr>
    <td>  <button type="submit" class="button-ungu button4" name="btn-signup">Kemaskini</button> </td>
  </tr>

</table>
</form>
</section>
<script>
      tinymce.init({
        selector: '#mytextarea'
      });
</script>