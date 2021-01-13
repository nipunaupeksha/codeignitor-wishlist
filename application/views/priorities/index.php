<h2><?=$title;?></h2>
<ul class="list-group">
    <?php foreach($priorities as $priority):?>
    <li class="list-group-item"><a href="<?php echo site_url('priorities/posts/').$priority['id']?>"><?php echo $priority['name']?></a>

    </li> 
    <?php endforeach;?>   
</ul>