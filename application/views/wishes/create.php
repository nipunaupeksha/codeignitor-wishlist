<h2><?=$title; ?></h2>
<?php echo validation_errors();?>
<?php echo form_open_multipart('wishes/create');?>
    <div class="form-group">
        <label >Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
        <label >Body</label>
        <textarea id="editor1" class="form-control" id="body" name="body" placeholder="Add Body"></textarea>
    </div>
    <div class="form-group">
        <label >URL</label>
        <textarea id="editor1" class="form-control" id="url" name="url" placeholder="Add URL"></textarea>
    </div>
    <div class="form-group">
        <label >Price</label>
        <textarea id="editor1" class="form-control" id="price" name="price" placeholder="Add Price"></textarea>
    </div>
    <div class="form-group">
        <input type="radio" name="priority_id" value="1" checked>
        <label>High Priority</label><br>
        <input type="radio" name="priority_id" value="2">
        <label>Medium Priority</label><br>
        <input type="radio" name="priority_id" value="3">
        <label>Low Priority</label>
    </div>
    <!-- <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <?php /*foreach($categories as $category):*/?>
                <option value="<?php /*echo $category['id']; */?>"><?php /*echo $category['name'];*/?></option>
            <?php/* endforeach;*/?>
        </select>
    </div> -->
    <div class="form-group">
        <label>Upload Image</label>
        <input type="file" name="userfile" size="20">
    </div>
  <button id="create" type="submit" class="btn btn-primary">Submit</button>
</form>