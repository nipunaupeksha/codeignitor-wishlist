<h2><?php echo $wish['title'];?></h2>
<small class="wish-date">Created at: <?php echo $wish['created_at'];?></small><br>
<p class="wish-type">Priority: 
    <?php 
        if($wish['priority_id']=="1"){
            echo "High";
        }elseif($wish['priority_id']=="2"){
            echo "Medium";
        }elseif($wish['priority_id']=="3"){
            echo "Low";
        }else{
            echo "Medium";
        }
    ?>
</p><br>
<img src="<?php echo site_url(); ?>assets/images/wishes/<?php echo $wish['wish_image']?>">
<div class="post-body">
    <?php echo $wish['body']?>
</div>
<?php if($this->session->userdata('user_id')==$wish['user_id']): ?>
<hr>
<a class="btn btn-warning float-left" href="<?php echo base_url(); ?>wishes/edit/<?php echo $wish['slug']; ?>">Edit</a>
<?php echo form_open('wishes/delete/'.$wish['id']);?>
    <input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif;?>
