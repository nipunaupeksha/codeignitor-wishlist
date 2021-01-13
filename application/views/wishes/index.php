<h2><?=$title?></h2><br>
<p id="createmsg"></p>
<?php foreach($wishes as $wish):?>
    <?php if($this->session->userdata('user_id')==$wish['user_id']): ?>
        <h3><?php echo $wish['title'];?></h3>
        <div class="row">
            <div class="col-md-3">
                <img class="wish-thumb" src="<?php echo site_url(); ?>assets/images/wishes/<?php echo $wish['wish_image']?>">
            </div>
            <div class="col-md-9">
                <small class="wish-date">Created at: <?php echo $wish['created_at'];?></small><br>
                <?php echo word_limiter($wish['body'],10);?><br><br>
                <p><a class="btn btn-primary" href="<?php echo base_url('/wishes/'.$wish['slug']);?>">Read More</a></p>
            </div>
        </div>
    <?php endif;?>
<?php endforeach;?>
<!-- <div class="pagination-links">
    {<?php /*echo $this->pagination->create_links();*/?>
</div> -->
