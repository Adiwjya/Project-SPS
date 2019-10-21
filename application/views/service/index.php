<script type="text/javascript">
    
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        table = $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>services/ajax_list"
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
            url = "<?php echo base_url(); ?>services/ajax_add";
        } else {
            url = "<?php echo base_url(); ?>services/ajax_edit";
        }
        
        // ajax adding data to database
        var id = $('#id').val();
        var item_tittle = $('#item_tittle').val();
        var item_subtittle = $('#item_subtittle').val();

        // ajax adding data to database
        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('item_tittle', item_tittle);
        form_data.append('item_subtittle', item_subtittle);

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

                $('[name="item_tittle"]').val("");
                $('[name="item_subtittle"]').val("");

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
        if(confirm("Apakah anda yakin menghapus barang ?")){
            // ajax delete data to database
            $.ajax({
                url : "<?php echo base_url(); ?>services/hapus/" + id,
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
        $('.modal-title').text('Ganti Content'); // Set title to Bootstrap modal title
        
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url(); ?>services/ganti/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data2){
                $('[name="id"]').val(data2.id);
                $('[name="item_tittle"]').val(data2.item_tittle);
                $('[name="item_subtittle"]').val(data2.item_subtittle);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data');
            }
        });
    }

    function ganti2(){
        $('#btnUpdate').text('Saving...'); //change button text
        $('#btnUpdate').attr('disabled',true); //set button disable 
        
        var url = "<?php echo base_url(); ?>services/ajax_edit2/";
        
        // ajax adding data to database
        var tittle = $('#tittle').val();
        var subtittle = $('#subtittle').val();

        // ajax adding data to database
        var form_data = new FormData();
        form_data.append('tittle', tittle);
        form_data.append('subtittle', subtittle);

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
                $('#btnUpdate').text('Simpan'); //change button text
                $('#btnUpdate').attr('disabled',false); //set button enable 

            },error: function (response) {
                alert(response.status);
                $('#btnUpdate').text('Simpan'); //change button text
                $('#btnUpdate').attr('disabled',false); //set button enable 
            }
        });
    }
    
</script>

<div class="content">
    <div class="header">
        <h1 class="page-title">Maintenance Service</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Data Service</li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-sm-12 col-md-12">
            <h3 class="page-title">Service Subtittle</h3>
            <hr>
                <form id="form2">
                <div class="form-group">
                    <input type="text" id="tittle" name="tittle" hidden value="<?php echo $tittle; ?>">
                    <textarea name="subtittle" id="subtittle" class="form-control" style="height: 100px; width: 100%;"><?php echo $subtittle; ?></textarea>
                    <br><button type="button" id="btnUpdate" name="btnUpdate" onclick="ganti2();" class="btn btn-success">Simpan</button>
                </div>
                </form><br>
            </div>
            <div class="col-sm-12 col-md-12">
            <h3 class="page-title">Service Content</h3>
            <hr>
                <button class="btn btn-success" onclick="add();"><i class="glyphicon glyphicon-plus"></i> Content</button>
                <button class="btn btn-default" onclick="reload();"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading no-collapse">Data Content</div>
                    <table id="example" class="table table-bordered table-striped" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>Tittle</th>
                                <th>Subtittle</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tittle</th>
                                <th>Subtittle</th>
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
                <h3 class="modal-title">Service Content</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul Content</label>
                            <div class="col-md-9">
                                <input type="text" hidden value="" id="id" name="id"/> 
                                <input id="item_tittle" name="item_tittle" class="form-control" type="text" placeholder="Judul Content">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Isi Content</label>
                            <div class="col-md-9">
                                <textarea  id="item_subtittle" name="item_subtittle" class="form-control" placeholder="Isi Content"></textarea>
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