<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Form Edit Perangkat Desa</h2>
              <p class="text-muted">Perbaharui data aparatur pemerintah desa </p>
              <?php foreach ($data_perangkat as $val) {
                  # code...
              }?>
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                        <form id="form_validation" role="form" autocomplete="off"  method="POST">                        
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label>Kecamatan</label>                                   
                                <select id="kode_kec" name="kode_kec" class="form-control" required="">
                                <option value=""> --- Pilih --- </option>
                                <?php
                                    foreach ($list_kecamatan as $data) {
                                        if ($kode_kec == $data['kode_kec']) {
                                            $selected1 = "selected";
                                        } else {
                                            $selected1 = "";
                                        }
                                ?>
                                    <option value="<?php echo $data['kode_kec']; ?>" <?php echo $selected1; ?>>
                                        <?php echo $data['name']; ?>
                                    </option>
                                <?php
                                    }
                                ?>
                            </select>                                  
                            
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Desa</label>                                   
                                    <select id="desa_id" name="desa_id" class=" form-control" required="">
                                    </select>                                  
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group"> 
                                    <label>Nama Lengkap</label>                                  
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Masukan nama lengkap" required="" value="<?php echo $val['nama_lengkap'];?>" />                                    
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <label>Tanggal Lahir</label>
                                <div class="input-group">
                                    <?php 
                                        $tgl = $val["tgl_lahir"];
                                        $tgl_sk = $val['tgl_sk'];
                                        $tanggal = date('d-m-Y',strtotime($tgl));
                                        $tanggal_sk = date('d-m-Y',strtotime($tgl_sk));
                                    ?>
                                  <input type="text" class="form-control drgpicker" id="date-input1" value="<?php echo $tanggal;?>" aria-describedby="button-addon2" name="tgl_lahir">
                                  <div class="input-group-append">
                                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">                       
                                    <label>Jenjang</label>            
                                    <select required="" name="pendidikan_id" class="form-control">
                                        <?php
                                            foreach ($list_pendidikan as $data) {
                                                if ($val['pendidikan_id'] == $data['id_pendidikan']) {
                                                    $selected1 = "selected";
                                                } else {
                                                    $selected1 = "";
                                                }
                                        ?>
                                            <option value="<?php echo $data['id_pendidikan']; ?>" <?php echo $selected1; ?>>
                                                <?php echo $data['nama']; ?> - (<?php echo $data['kode']; ?>)
                                            </option>
                                        <?php
                                            }
                                        ?>
                                    </select>                                   
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <?php if ($val['jenis_kelamin'] == 1) {
                                    $laki = "checked";
                                    $cewek = "";
                                }else{
                                   $laki = "";
                                    $cewek = "checked"; 
                                }
                                ?>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>                                   
                                    <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="jenis_kelamin" id="L" class="with-gap" value="1"<?php echo $laki;?>>
                                    <label for="L">Laki Laki</label>
                                </div>                                
                                <div class="radio inlineblock">
                                    <input type="radio" name="jenis_kelamin" id="P" class="with-gap" value="2" <?php echo $cewek;?>>
                                    <label for="P">Perempuan</label>
                                </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">   
                                <label>No. SK</label>                                
                                    <input required="" type="text" name="no_sk" class="form-control" value="<?php echo $val['no_sk'];?>" placeholder="Nomor SK" />                                   
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group"> 
                                <label>Tanggal SK</label>                                  
                                   <div class="input-group">
                                  <input type="text" class="form-control drgpicker" id="date-input1" value="<?php echo $tanggal_sk;?>" aria-describedby="button-addon2" name="tgl_sk">
                                  <div class="input-group-append">
                                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                                  </div>
                                </div>                                  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">       
                                    <label>Jabatan</label>                            
                                    <select required="" name="jabatan_id" class="form-control">
                                       <?php
                                            foreach ($list_jabatan as $data) {
                                                if ($val['jabatan_id'] == $data['id_jabatan']) {
                                                    $selected1 = "selected";
                                                } else {
                                                    $selected1 = "";
                                                }
                                        ?>
                                            <option value="<?php echo $data['id_jabatan']; ?>" <?php echo $selected1; ?>>
                                                <?php echo $data['nama_jabatan']; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                    </select>                                 
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">                          
                                    <label>Status PNS</label>         
                                    <select required="" name="pns" class="form-control">
                                        <?php if ($val['pns'] == 0) {?>
                                            <option value="0" selected="">Tidak</option>
                                            <option value="1">Ya</option>
                                        <?php }else{?>
                                            <option value="0">Tidak</option>
                                            <option value="1" selected="">Ya</option>
                                        <?php }?>
                                    </select>                                  
                                </div>
                            </div>
                        </div>                        
                       
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">      
                                    <label>NIK</label>                             
                                    <input type="text" name="nik" value="<?php echo $val['nik'];?>" class="form-control" placeholder="No. NIK" />                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"> 
                                <label>No. Kepala Keluarga</label>                                   
                                    <input type="text" name="no_kk" class="form-control" value="<?php echo $val['no_kk'];?>" placeholder="No. KK" />                                   
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-raised btn-primary waves-effect" name="update" type="submit">Perbaharui Data</button>
                        <button class="btn btn-raised btn-danger waves-effect" type="reset">Reset</button>
                    </form>
                    </div>
                </div>
                </div>
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->

<script>
    <?php
        
    ?>
        var kec_id     = '<?php echo $kode_kec; ?>';
        var desa_id    = '<?php echo $kode_desa; ?>';
        var temp1 = "";
        $.ajax({
            dataType: "json",
            url: '<?php echo base_url("perangkat/get_all_desa_by_kecamatan"); ?>/' + kec_id,
            success: function (data) {
              $("#desa_id").empty(); 
              $("#desa_id").append("<option value=''> --- <?php echo $this->lang->line('label_select'); ?> --- </option>");
              $(data).each(function(i) {
                if ( desa_id == data[i].kode_desa ) {
                  temp1 = "selected";
                } else {
                  temp1 = "";
                }

                $("#desa_id").append("<option " + temp1 + " value=\"" + data[i].kode_desa + "\">" + data[i].name + "</option>");
              });
            }
        });

    $('#kode_kec').change(function () {
        var id = $(this).val();
        // alert(id);
        $.ajax({
            dataType: "json",
            url: '<?php echo base_url("perangkat/get_all_desa_by_kecamatan"); ?>/' + id,
            success: function (data) {
                $("#desa_id").empty(); 
                $("#desa_id").append("<option value=''> --- Pilih Desa --- </option>");
                $(data).each(function(i) {
                    // alert(url);
                    $("#desa_id").append("<option value=\"" + data[i].kode_desa + "\">" + data[i].name + "</option>");
                });
            }
        });
    });
</script> 