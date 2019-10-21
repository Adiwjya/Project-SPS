<script type="text/javascript">
    
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        table = $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>barang/ajax_list"
        });
    });
    
    function reload(){
        table.ajax.reload(null,false); //reload datatable ajax
    }
    
    function add(){
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Barang'); // Set Title to Bootstrap modal title
    }
    
    function save(){
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        
        if(save_method === 'add') {
            url = "<?php echo base_url(); ?>barang/ajax_add";
        } else {
            url = "<?php echo base_url(); ?>barang/ajax_edit";
        }
        
        // ajax adding data to database
        var file_data = $('#img').prop('files')[0];
        var id = $('#id').val();
        var nama = $('#nama').val();
        var stok = $('#stok').val();
        var harga = $('#harga').val();
        var deskripsi = $('#deskripsi').val();

        // ajax adding data to database
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('id', id);
        form_data.append('nama', nama);
        form_data.append('stok', stok);
        form_data.append('harga', harga);
        form_data.append('deskripsi', deskripsi);

        $.ajax({
            url: url,
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function (response) {
                alert(response.status);
                reload();

                $('[name="id"]').val("");
                $('[name="nama"]').val("");
                $('[name="stok"]').val("");
                $('[name="harga"]').val("");
                $('[name="deskripsi"]').val("");
                $('[name="img"]').val("");

                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            },error: function (response) {
                alert(response.status);
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }
    
    function hapus(id, nama){
        if(confirm("Apakah anda yakin menghapus barang " + nama + " ?")){
            // ajax delete data to database
            $.ajax({
                url : "<?php echo base_url(); ?>barang/hapus/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data){
                    alert(data.status);
                    reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert('Error hapus data');
                }
            });
        }
    }
    
    function ganti(id){
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Ganti Barang'); // Set title to Bootstrap modal title
        
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url(); ?>Barang/ganti/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data2){
                $('[name="id"]').val(data2.idbarang);
                $('[name="nama"]').val(data2.nama);
                $('[name="stok"]').val(data2.stok);
                $('[name="harga"]').val(data2.harga);
                $('[name="deskripsi"]').val(data2.deskripsi);
                $('[name="img"]').val(data2.gambar);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data');
            }
        });
    }
    
</script>

<div class="content">
    <div class="header">
        <h1 class="page-title">Maintenance Data Barang</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Data Barang</li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <button class="btn btn-success" onclick="add();"><i class="glyphicon glyphicon-plus"></i> Barang</button>
                <button class="btn btn-default" onclick="reload();"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading no-collapse">Data Barang</div>
                    <table id="example" class="table table-bordered table-striped" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        
        
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Barang</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="text" hidden value="" id="id" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Barang</label>
                            <div class="col-md-9">
                                <input id="nama" name="nama" class="form-control" type="text" placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Stok</label>
                            <div class="col-md-9">
                                <input id="stok" name="stok" class="form-control" type="text" placeholder="Stok"  onkeypress="return hanyaAngka(event,false);">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input id="harga" name="harga" class="form-control" type="text" placeholder="Harga" onkeypress="return hanyaAngka(event,false);">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Deskripsi</label>
                            <div class="col-md-9">
                                <input id="deskripsi" name="deskripsi" class="form-control" type="text" placeholder="Deskripsi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gambar</label>
                            <div class="col-md-9">
                                <input id="img" name="img" type="file">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save();" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>