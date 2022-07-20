<?php require APPROOT.'/views/inc/header.php'; ?>

<!-- Top Navigation -->
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<?php flash('post_msg'); ?>
<br>
<a href="<?php echo URLROOT?>/Posts/create"><button class="post-create-btn">CREATE</button></a>

<?php foreach($data['posts'] as $post): ?>

<div class="post-index-container">
    <div class="post-header">
        <div class="post-user-profile-image">
            <img src="<?php echo URLROOT ; ?>/img/profileImgs/<?php echo $post->profile_image ;?>" alt="">
        </div>
        <div class="post-user-username"> <?php echo $post->user_username; ?> </div>
        <div class="post-created-at"><?php echo convertTimeToReadableFormat($post->post_created_at); ?></div>

        <?php if($post->user_id == $_SESSION['user_id']): ?>

        <div class="post-control-btns">
            <a href="<?php echo URLROOT?>/Posts/edit/<?php echo $post->post_id ?>"><button class="post-control-btn1">EDIT</button></a>
            <a href="<?php echo URLROOT?>/Posts/delete/<?php echo $post->post_id ?>"><button class="post-control-btn2">DELETE</button></a>
        </div>

        <?php endif; ?>

    </div>
    <div class="post-body">
        <div class="post-image">
            <?php if($post->image != null) : ?>
            <center><img src="<?php echo URLROOT ; ?>/img/postImgs/<?php echo $post->image ;?>" alt=""></center>
            <?php else : ?>
            <center><img src="" alt="" style="display: none"></center>
            <?php endif ; ?>
        </div>
        <div class="post-title"><?php echo $post->title; ?></div>
        <div class="post-content"><?php echo $post->body; ?></div>
    </div>
    <div class="post-footer" >
        <div class="post-likes" id="post-likes-<?php echo $post->post_id; ?>" onclick="addLike(<?php echo $post->post_id; ?>)">
            <img src="<?php echo URLROOT; ?>/img/components/imageUpload/like.png" alt="">
            <div class="post-likes-count" id="post-likes-count-<?php echo $post->post_id; ?>">0</div>
        </div>
        <div class="post-dislikes" id="post-dislikes-<?php echo $post->post_id; ?>" onclick="addDislike(<?php echo $post->post_id; ?>)">
            <img src="<?php echo URLROOT; ?>/img/components/imageUpload/dislike.png" alt="">
            <div class="post-dislikes-count" id="post-dislikes-count-<?php echo $post->post_id; ?>">0</div>
        </div>
    </div>
</div>

<?php endforeach; ?>

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/jQuery/jQuery.js"></script>

<script type="text/javascript">
    var URLROOT = '<?php echo URLROOT; ?>'
</script>

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/components/posts/postInteractions.js"></script>

<?php print_r(); ?>

<?php require APPROOT.'/views/inc/footer.php'; ?>
