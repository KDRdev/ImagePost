<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="alert d-none"  id="alert" role="alert">
        </div>
        <div class="p-3">
            <h2 class="text-center">Add a record</h2>
            <form id="fileUploadForm">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control form-control-lg"
                                        value="<?php echo $data['firstname'] ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control form-control-lg"
                                        value="<?php echo $data['lastname'] ?>">
                </div>
                <div class="form-group">
                    <label for="filename">File (max.size is 64MB)</label>
                    <input type="file" name="filename"id="filename" class="form-control form-control-lg"
                                        value="<?php echo $data['filename'] ?>">
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Add post" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
