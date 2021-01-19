<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="mb-2 page-title">Data Perangkat Desa</h2>
              <p class="card-text">Berikut ini merupakan nama - nama perangkat desa</p>
              <form  method="post">
              <div class="row clearfix">

                  <div class="col-sm-4">                                   
                      <select id="kode_kec" name="kode_kec" class="form-control">
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
             
                  <div class="col-sm-4">
                      <div class="form-group">                                   
                          <select id="desa_id" name="desa_id" class="form-control">
                              <option>Pilih Desa</option>
                          </select>                                  
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <button type="submit" name="filter" class="btn btn-secondary">Filter</button>
                      <button type="submit" name="reset" class="btn btn-danger">Reset</button>
                      <a href="<?php echo base_url('perangkat/add');?>" class='btn btn-primary'>Tambah Data</a>
                  </div>
               
              </div>
              </form>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                   <?php
                    echo alert()
                ?>
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Jabatan</th>
                            <th>No SK</th>
                            <th>Tgl SK</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no = 1;
                          foreach ($data_perangkat as $data) {
                          ?>
                          <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data['nama_kec'];?></td>
                            <td><?php echo $data['nama_desa'];?></td>
                            <td><?php echo $data['nama_lengkap'];?></td>
                            <td><?php echo $data['tgl_lahir'];?></td>
                            <td><?php echo $data['nama_jabatan'];?></td>
                            <td><?php echo $data['no_sk'];?></td>
                            <td><?php echo $data['tgl_sk'];?></td>
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Aksi</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo base_url('perangkat/edit/'.$data['id_prkt']);?>">Edit</a>
                                <a class="dropdown-item" href="<?php echo base_url('perangkat/delete/'.$data['id_prkt']);?>">Hapus</a>
                              </div>
                            </td>
                          </tr>
                        <?php $no++;}?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
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
       
    $('#kode_kec').change(function () {
        var id = $(this).val();
        // alert(id);
        $.ajax({
            dataType: "json",
            url: '<?php echo base_url("perangkat/get_all_desa_by_kecamatan"); ?>/' + id,
            success: function (data) {
                $("#desa_id").empty(); 
                $("#desa_id").append("<option value=''> --- Select --- </option>");
                $(data).each(function(i) {
                    // alert(url);
                    $("#desa_id").append("<option value=\"" + data[i].kode_desa + "\">" + data[i].name + "</option>");
                });
            }
        });
    });
</script> 
<script type="text/javascript">
  $( document ).ready(function() {
    $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [16, 32, 64, -1],
          [16, 32, 64, "All"]
        ]
      });
 });
</script>
