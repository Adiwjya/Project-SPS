
<script type="text/javascript">
    
    var save_method; //for save method string
    var table;
    

    function type(){
        var tittle = $('#tittle').val();
    }

    function save(){
        $('#btnUpdate').text('Saving...'); //change button text
        $('#btnUpdate').attr('disabled',true); //set button disable 
        
        var url = "<?php echo base_url(); ?>contact/ajax_edit";
        
        // ajax adding data to database
        var file_data = $('#img').prop('files')[0];
        var tittle = $('#tittle').val();
        var subtittle = $('#subtittle').val();
        var location = $('#location').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var facebook = $('#facebook').val();
        var twitter = $('#twitter').val();
        var instagram = $('#instagram').val();
        
        // ajax adding data to database
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('tittle', tittle);
        form_data.append('subtittle', subtittle);
        form_data.append('location', location);
        form_data.append('phone', phone);
        form_data.append('email', email);
        form_data.append('facebook', facebook);
        form_data.append('twitter', twitter);
        form_data.append('instagram', instagram);

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
        <h1 class="page-title">Maintenance Contact</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Contact</li>
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
                    <textarea name="subtittle" id="subtittle" class="form-control" style="height: 100px;" ><?php echo $subtittle; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Location</label>
                        <textarea name="location" id="location" class="form-control" ><?php echo $location; ?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <textarea name="phone" id="phone" class="form-control" ><?php echo $phone; ?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <textarea name="email" id="email" class="form-control" ><?php echo $email; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group"> 
                        <input type="file" id="img" name="img">
                    </div>
                </div>
            </div>
            <hr>
            <h2 class="page-title">Social Media</h2>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo $facebook; ?>" placeholder="https://facebook.com/" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control" value="<?php echo $twitter; ?>" placeholder="https://twitter.com/" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" value="<?php echo $instagram; ?>" placeholder="https://instagram.com/" >
                    </div>
                </div>
            </div><br>
                <button type="button" id="btnUpdate" onclick="save();" class="btn btn-primary" >Simpan</button>
            </div>
        </div>
        </form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
