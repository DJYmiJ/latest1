<?php require APPROOT.'/views/inc/header.php'; ?>
   
<!-- Top Navigation -->
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?> 
  
  
<h1> Delete Post </h1>

<div class="post-container">
   <center><h2>Delete post</h2></center>
    <form action="<?php echo URLROOT; ?>/Posts/delete/<?php echo $data['post_id']; ?>" method="POST" >
        <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $data['title']; ?>" readonly>
        <span class="form-invalid"><?php echo $data['title_err']; ?></span> 
        <br>
        <textarea name="body" id="body" rows="10" cols="70" placeholder="Content" readonly><?php echo $data['body']; ?> </textarea>
        <span class="form-invalid"><?php echo $data['body_err']; ?></span>
        <br>
        <h3>Are you sure you want to delete this post?</h3>
        <input type="submit" value="Delete!" class="post-btn">
    </form>
</div>


<?php require APPROOT.'/views/inc/footer.php'; ?>
 