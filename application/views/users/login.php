<?php echo form_open();?>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h1 class="text-center"><?php echo $title;?></h1>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter password" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
<?php echo form_close();?>