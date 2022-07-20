<?php require APPROOT.'/views/inc/header.php'; ?>

<!-- Top Navigation -->
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>



<h1> Edit existing post... </h1>

<div class="post-container">
    <center>
        <h2>Edit post</h2>
    </center>
    <form action="<?php echo URLROOT; ?>/Posts/edit/<?php echo $data['post_id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="post-image">
            <?php if(!empty($data['image_name'])) : ?>
            <center><img src="<?php echo URLROOT; ?>/img/postImgs/<?php echo $data['image_name']; ?>" alt="" id="image_placeholder" ></center>
            <?php else : ?>
            <center><img src="" alt="" id="image_placeholder" style="display: none"></center>
            <?php endif ; ?>
        </div>
        <br>
        <div class="upper">
            <div class="left">
                <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $data['title']; ?>">
                <span class="form-invalid"><?php echo $data['title_err']; ?></span>
                <span class="form-invalid"><?php echo $data['image_err']; ?></span>
            </div>
            <div class="right">
                <img src="<?php echo URLROOT; ?>/img/components/imageUpload/add-image.png" id="addImagebtn" onclick="toggleBrowse()">
                <img src="<?php echo URLROOT; ?>/img/components/imageUpload/remove-image.png" id="removeImagebtn" style="display: none" onclick="removeImage()">
                <input type="text" name="removeIntend" id="removeIntend" style="display: none" readonly >
                <input type="file" name="image" id="image" style="display: none">
            </div>
        </div>

        <br>
        <textarea name="body" id="body" rows="10" cols="70" placeholder="Content"><?php echo $data['body']; ?></textarea>
        <span class="form-invalid"><?php echo $data['body_err']; ?></span>
        <br>
        <input type="submit" value="Update!" class="post-btn">
    </form>
</div>

<!-- Javascript -->

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/components/posts/posts.js"></script>


<?php require APPROOT.'/views/inc/footer.php'; ?>
