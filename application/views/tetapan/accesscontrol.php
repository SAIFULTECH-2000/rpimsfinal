<section>


<table>
      <div id="back">
    <a href="<?=base_url('tetapan')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
  </div>
  <h2><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;&nbsp;ACCESS CONTROL</h2><hr>
  </table>
  <table border="1">
  <tr >
    <td style="padding:10px">Access</td>
    <?php 
    
    $result = $this->db->query("SELECT * FROM roles ")->result_array(); 
    foreach ($result as $role):
    ?>
    <td style="padding:10px"><?=$role['title']?></td>
    <?php endforeach;?>
  </tr>
  <tr>
    <td>FUNGSI UTAMA</td>
    <td><i class="	fa fa-check"></i></td>
    <td><i class="	fa fa-check"></i></td>
    <td></td>
    <td><i class="	fa fa-check"></i></td>
  </tr>
  <tr>
    <td>PENCARIAN</td>
    <td><i class="	fa fa-check"></i></td>
    <td><i class="	fa fa-check"></i></td>
    <td></td>
    <td><i class="	fa fa-check"></i></td>
  </tr>
  <tr>
    <td>URUS MAKLUMAT</td>
    <td><i class="	fa fa-check"></i></td>
    <td><i class="	fa fa-check"></i></td>
    <td></i></td>
    <td><i class="	fa fa-check"></i></td>
  </tr>
  <tr>
    <td>LAPORAN</td>
    <td><i class="	fa fa-check"></i></td>
    <td><i class="	fa fa-check"></i></td>
    <td></td>
    <td><i class="	fa fa-check"></i></td>
  </tr>
  <tr>
    <td>NOTIFIKASI</td>
    <td><i class="	fa fa-check"></i></td>
    <td><i class="	fa fa-check"></i></td>
    <td></td>
    <td><i class="	fa fa-check"></i></td>
  </tr>
  <tr>
    <td>USER PROFILE</td>
    <td><i class="	fa fa-check"></i></td>
    <td><i class="	fa fa-check"></i></td>
    <td><i class="	fa fa-check"></i></td>
    <td></td>
  </tr>
  </table>
 
</section>