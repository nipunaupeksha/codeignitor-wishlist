<h2><?=$title; ?></h2>
<?php echo validation_errors();?>
<?php echo form_open('wishes/update');?>
    <input type="hidden" name="id" value="<?php echo $wish['id'];?>">
    <div class="form-group" >
        <label >Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $wish['title']?>">
    </div>
    <div class="form-group">
        <label >Body</label>
        <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $wish['body']?></textarea>
    </div>
    <div class="form-group">
        <input type="radio" name="priority_id" value="1" <?php echo $wish['priority_id']=="1" ?"checked":""?>>
        <label>High Priority</label><br>
        <input type="radio" name="priority_id" value="2" <?php echo $wish['priority_id']=="2" ?"checked":""?>>
        <label>Medium Priority</label><br>
        <input type="radio" name="priority_id" value="3" <?php echo $wish['priority_id']=="3" ?"checked":""?>>
        <label>Low Priority</label>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <?php foreach($categories as $category):?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name'];?></option>
            <?php endforeach;?>
        </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>