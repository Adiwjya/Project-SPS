<script type="text/javascript">
    
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        table = $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>testimoni/ajax_list"
        });
    });
    
    function reload(){
        table.ajax.reload(null,false); //reload datatable ajax
    }
    
    function add(){
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Gambar'); // Set Title to Bootstrap modal title
    }
    
    function save(){
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        
        if(save_method === 'add') {
            url = "<?php echo base_url(); ?>testimoni/ajax_add";
        } else {
            url = "<?php echo base_url(); ?>testimoni/ajax_edit";
        }
        
        // ajax adding data to database
        var file_data = $('#img').prop('files')[0];
        var id = $('#id').val();
        var nama = $('#nama').val();
        var komentar = $('#komentar').val();

        // ajax adding data to database
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('id', id);
        form_data.append('nama', nama);
        form_data.append('komentar', komentar);

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
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            },error: function (response) {
                alert(response.status);
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }
    
    function hapus(id){
        if(confirm("Apakah anda yakin menghapus gambar ini ?")){
            // ajax delete data to database
            $.ajax({
                url : "<?php echo base_url(); ?>testimoni/hapus/" + id,
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
        $('.modal-title').text('Ganti Gambar'); // Set title to Bootstrap modal title
        
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url(); ?>testimoni/ganti/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data2){
                $('[name="id"]').val(data2.id);
                $('[name="nama"]').val(data2.nama);
                $('[name="komentar"]').val(data2.komentar);
                $('[name="img"]').val(data2.img);
                        
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data');
            }
        });
    }
    
</script>

<div class="content">
    <div class="header">
        <h1 class="page-title">Maintenance Testimoni</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Testimoni</li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <button class="btn btn-success" onclick="add();"><i class="glyphicon glyphicon-plus"></i> Komentar</button>
                <button class="btn btn-default" onclick="reload();"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading no-collapse">Slider</div>
                    <table id="example" class="table table-bordered table-striped" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Foto</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Foto</th>
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
                <h3 class="modal-title">Form Testimoni</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                <input type="text" hidden value="" id="id" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input id="nama" name="nama" class="form-control" type="text" placeholder="Nama User">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Komentar</label>
                            <div class="col-md-9">
                                <textarea name="komentar" id="komentar" class="form-control" cols="30" rows="5" placeholder="Komentar"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Foto</label>
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