<?php require APPROOT.'/views/inc/header.php'; ?>

<!-- Top Navigation -->
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<div class="post-container">
    <center>
        <h2>Create a Post...</h2>
    </center>
    <form action="<?php echo URLROOT; ?>/Posts/create" method="POST" enctype="multipart/form-data">
       <div class="post-image">
           <center><img src="" alt="" id="image_placeholder" style="display: none"></center>
       </div>
           <br>
        <div class="upper">
            <div class="left">
                <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $data['title']; ?>">
                <span class="form-invalid"><?php echo $data['title_err']; ?></span>
            </div>
            <div class="right">
                <img src="<?php echo URLROOT; ?>/img/components/imageUpload/add-image.png" id="addImagebtn" onclick="toggleBrowse()">
                <img src="<?php echo URLROOT; ?>/img/components/imageUpload/remove-image.png" id="removeImagebtn" style="display: none" onclick="removeImage()">
                <input type="file" name="image" id="image" style="display: none">
            </div>
        </div>
        <span class="form-invalid"><?php echo $data['image_err']; ?></span>
        <br>
        <textarea name="body" id="body" rows="10" cols="70" placeholder="Content" value="<?php echo $data['body']; ?>"></textarea>
        <span class="form-invalid"><?php echo $data['body_err']; ?></span>
        <br>
        <input type="submit" value="Post!" class="post-btn">
    </form>
</div>

<!-- Javascript -->

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/components/posts/posts.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>
