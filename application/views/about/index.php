<script type="text/javascript">
    
    var save_method; //for save method string
    var table;
    
    function save(){
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;

        url = "<?php echo base_url(); ?>about/ajax_edit";
        
        // ajax adding data to database
        var file_data = $('#img').prop('files')[0];
        var tittle = $('#tittle').val();
        var content = $('#content').val();

        // ajax adding data to database
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('tittle', tittle);
        form_data.append('content', content);

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

                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            },error: function (response) {
                alert(response.status);
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }

</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Maintenance About Us</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">About Us</li>
        </ul>
    </div>
    <div class="main-content">
    <form id="form">
        <div class="row">
            <div class="col-md-12">
            <div class="card-body">
                <div class="form-group">
                    <input type="text" id="tittle" name="tittle" hidden value="<?php echo $tittle; ?>">
                    <label class="control-label">Subtittle</label>
                    <textarea name="content" id="content" class="form-control" style="height: 100px;" ><?php echo $content; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo $img; ?>" style="width:100%;">
                    <div class="form-group"> 
                        <input type="file" id="img" name="img">
                    </div>
                </div>
            </div>
            <hr>
                <button type="button" id="btnUpdate" onclick="save();" class="btn btn-primary" >Simpan</button>
            </div>
        </div>
        </form>