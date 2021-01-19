<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Form Perangkat Desa</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Perangkat Desa</a></li>
                        <li class="breadcrumb-item active">Form Perangkat Desa</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Tambah</strong> Perangkat Desa</h2>
                            
                        </div>
                        <div class="card">
                        <div class="body">
                            <form id="form_validation" method="POST">
                            <h2 class="card-inside-title">Lengkapi Data Perangkat Desa</h2>
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">                                   
                                    <select id="kode_kec" name="kode_kec" class="form-control" <?php echo @$post['kode_kec_disabled']; ?>>
                                    <option value=""> --- Pilih --- </option>
                                    <?php
                                        foreach ($list_kecamatan as $data) {
                                            if ($post['kode_kec'] == $data['kode_kec']) {
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
                                         <select id="desa_id" name="desa_id" class="form-control" <?php echo @$post['desa_id_disabled']; ?>>
                                </select>                                  
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">                                   
                                        <input type="text" class="form-control" placeholder="nama Lengkap" />                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">                                   
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control datetimepicker" placeholder="Tanggal Lahir">
                                        </div>                                   
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">                                   
                                        <select name="pendidikan" class="form-control">
                                            <option>Pendidikan</option>
                                        </select>                                   
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">                                   
                                        <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="gender" id="L" class="with-gap" value="option1">
                                        <label for="L">Laki Laki</label>
                                    </div>                                
                                    <div class="radio inlineblock">
                                        <input type="radio" name="gender" id="P" class="with-gap" value="option2" checked="">
                                        <label for="P">Perempuan</label>
                                    </div>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">                                   
                                        <input type="text" class="form-control" placeholder="Nomor SK" />                                   
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">                                   
                                        <input type="text" class="form-control" placeholder="Tanggal SK" />                                   
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">                                   
                                        <select name="jabatan" class="form-control">
                                            <option>Jabatan</option>
                                        </select>                                 
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <div class="form-group">                                   
                                        <select name="pendidikan" class="form-control">
                                            <option>Status PNS</option>
                                        </select>                                  
                                    </div>
                                </div>
                            </div>                        
                            <h2 class="card-inside-title">Input Status</h2>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">                                   
                                        <input type="text" class="form-control" value="Focused" placeholder="Statu Focused" />                                    
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                    
                                        <input type="text" class="form-control" placeholder="Disabled" disabled />                                   
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-raised btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    <?php
        if ( @$post['kode_kec'] != "" && @$post['desa_id'] != "") {
    ?>
        var kode_kec     = '<?php echo $post['kode_kec']; ?>';
        var desa_id    = '<?php echo $post['desa_id']; ?>';
        var temp1 = "";
        $.ajax({
            dataType: "json",
            url: '<?php echo base_url("perangkat/get_all_desa_by_kecamatan"); ?>/' + kode_kec,
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
    <?php
        } elseif ( @$post['kode_kec'] != "" && @$post['desa_id'] == "") {
    ?>
        var id = '<?php echo $post['kode_kec']; ?>';
        alert(id);
        $.ajax({
            dataType: "json",
            url: '<?php echo base_url("perangkat/get_all_desa_by_kecamatan"); ?>/' + id,
            success: function (data) {
                $("#desa_id").empty(); 
                $("#desa_id").append("<option value=''> --- <?php echo $this->lang->line('label_select'); ?> --- </option>");
                $(data).each(function(i) {
                    $("#desa_id").append("<option value=\"" + data[i].kode_desa + "\">" + data[i].name + "</option>");
                });
            }
        });
    <?php
        }
    ?>
    
    $('#kode_kec').change(function () {
        var id = $(this).val();
        $.ajax({
            dataType: "json",
            url: '<?php echo base_url("perangkat/get_all_desa_by_kecamatan"); ?>/' + id,
            success: function (data) {
                $("#desa_id").empty(); 
                $("#desa_id").append("<option value=''> --- Select --- </option>");
                $(data).each(function(i) {
                    $("#desa_id").append("<option value=\"" + data[i].kode_desa + "\">" + data[i].name + "</option>");
                });
            }
        });
    });
</script> 