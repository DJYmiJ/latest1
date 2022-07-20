<?php require APPROOT.'/views/inc/header.php'; ?>

<!-- Top Navigation -->
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<div class="form-container">

    <div class="form-header">
        <center>
            <h1>User Signup!</h1>

            <p>Please complete the form to Register.</p>
        </center>
    </div>


    <form action="<?php echo URLROOT?>/Users/register" method="POST" enctype="multipart/form-data">

        <!-- Profile picture -->
        <div class="form-drag-area">
            <div class="icon">
                <img src="<?php echo URLROOT; ?>/public/img/components/imageUpload/profile-placeholder.png" alt="placeholder" width="90px" height="90px" id="profile-image-placeholder" name="profile-image-placeholder">
            </div>
            <div class="right-content">
                <div class="description">Drag & Drop to Upload Image</div>
                <div class="form-upload">
                    <input type="file" name="profile_image" id="profile_image" style="display: none">
                    Browse File
                </div>
            </div>
        </div>
        <div class="form-validation">
            <div class="profile-image-validation">
                <img src="<?php echo URLROOT; ?>/public/img/components/imageUpload/tick.png" alt="tick" width="15px" height="15px">
                Select a Profile Picture
            </div>
        </div>
        <span class="form-invalid"><?php echo $data['profile_image_err']; ?></span>
        

        <!-- Date of Birth -->
        <div class="form-input-title">Date of Birth (18+)</div>
        <input type="date" id="start" name="trip-start" value="2018-07-22" min="1900-01-01" max="<?php date('Y-m-d', strtotime('18 years ago'));?>" class="form-dob">
        <span class="form-invalid"><?php echo $data['username_err']; ?></span>
        

        <!-- Name -->
        <div class="form-input-title">Username</div>
        <input type="text" name="username" id="username" class="username" value="<?php echo $data['username']; ?>">
        <span class="form-invalid"><?php echo $data['username_err']; ?></span>

        <!-- Email -->
        <div class="form-input-title">Email</div>
        <input type="text" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
        <span class="form-invalid"><?php echo $data['email_err']; ?></span>

        <!-- Password -->
        <div class="form-input-title">Password</div>
        <input type="password" name="password" id="password" class="password" value="<?php echo $data['password']; ?>">
        <span class="form-invalid"><?php echo $data['password_err']; ?></span>

        <!-- Confirm Password -->
        <div class="form-input-title">Confirm Password</div>
        <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" value="<?php echo $data['confirm_password']; ?>">
        <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>

        <br>
        <input type="submit" value="Register" class="form-btn">

    </form>
</div>

<!-- Javascript -->

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/components/imageUpload/imageUpload.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>
