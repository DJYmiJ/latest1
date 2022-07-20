<?php require APPROOT.'/views/inc/header.php';
$gender = '';
print_r($gender);
?>

<!-- Top Navigation -->
<?php require APPROOT.'/views/inc/components/topnavbar.php';
?>

<div class="form-container">

    <div class="form-header">
        <center>
            <h1>Profile Information</h1>

            <p>Please complete the form to Register.</p>
        </center>
    </div>

    <form action="<?php echo URLROOT?>/Users/regProfile" method="POST">

        <?php flash( 'reg_flash' );
?>

        <!-- Type -->
        <center>
            <div class="form-input-title">Profile Type</div>
        </center>
        <div class="form-type">
            <div class="form-left">
               
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> 
                <label for="profile_type">Male</label><br>
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> 
                <label for="profile_type">Female</label><br>
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="transgender") echo "checked";?> value="transgender"> 
                <label for="profile_type">Transgender</label><br>
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="crossdresser") echo "checked";?> value="crossdresser"> 
                <label for="profile_type">Crossdresser</label><br>
                
                <!--<input type="radio" name="profile_type" id="male" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">Male</label><br>
                <input type="radio" name="profile_type" id="female" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">Female</label><br>
                <input type="radio" name="profile_type" id="transgender" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">Transgender</label><br>
                <input type="radio" name="profile_type" id="crossdresser" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">Crossdresser</label><br> -->
            </div>
            <div class="form-right">
               
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="mfcouple") echo "checked";?> value="mfcouple"> 
                <label for="profile_type">MF Couple</label><br>
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="ffcouple") echo "checked";?> value="ffcouple"> 
                <label for="profile_type">FF Couple</label><br>
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="mmcouple") echo "checked";?> value="mmcouple"> 
                <label for="profile_type">MM Couple</label><br>
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="tgcouple") echo "checked";?> value="tgcouple"> 
                <label for="profile_type">TG Couple</label><br>
                <input type="radio" name="profile_type" <?php if (isset($gender) && $gender=="cdcouple") echo "checked";?> value="cdcouple"> 
                <label for="profile_type">CD Couple</label><br>
                
                <!--<input type="radio" name="profile_type" id="mfCouple" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">MF Couple</label><br>
                <input type="radio" name="profile_type" id="ffCouple" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">FF Couple</label><br>
                <input type="radio" name="profile_type" id="mmCouple" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">MM Couple</label><br>
                <input type="radio" name="profile_type" id="tgCouple" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">TG Couple</label><br>
                <input type="radio" name="profile_type" id="cdCouple" class="profile_type" value="<?php echo $data['profile_type']; ?>">
                <label for="profile_type">CD Couple</label><br>-->
            </div>

        </div>

            <center><span class="form-invalid"><?php echo $data['profile_type_err'];?></span></center>

        

        <!-- Looking to meet -->
        <center>
            <div class="form-input-title">Looking to meet...</div>
        </center>
        <div class="form-type">
            <div class="form-left">
               
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> 
                <label for="profile_type">Male</label><br>
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> 
                <label for="profile_type">Female</label><br>
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="transgender") echo "checked";?> value="transgender"> 
                <label for="profile_type">Transgender</label><br>
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="crossdresser") echo "checked";?> value="crossdresser"> 
                <label for="profile_type">Crossdresser</label><br>
               
                <!--<input type="checkbox" name="looking_to_meet" id="lookingToMeetMale" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType"></label><br>
                <input type="checkbox" name="looking_to_meet" id="lookingToMeetFem" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Female</label><br>
                <input type="checkbox" name="looking_to_meet" id="lookingToMeetTrans" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Transgender</label><br>
                <input type="checkbox" name="looking_to_meet" id="lookingToMeetCross" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Crossdresser</label><br> -->
                
            </div>
            <div class="form-right">
               
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="mfcouple") echo "checked";?> value="mfcouple"> 
                <label for="looking_to_meet">MF Couple</label><br>
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="ffcouple") echo "checked";?> value="ffcouple"> 
                <label for="looking_to_meet">FF Couple</label><br>
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="mmcouple") echo "checked";?> value="mmcouple"> 
                <label for="looking_to_meet">MM Couple</label><br>
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="tgcouple") echo "checked";?> value="tgcouple"> 
                <label for="looking_to_meet">TG Couple</label><br>
                <input type="checkbox" name="looking_to_meet[]" <?php if (isset($gender) && $gender=="cdcouple") echo "checked";?> value="cdcouple"> 
                <label for="looking_to_meet">CD Couple</label><br>
               
                <!--<input type="checkbox" name="looking_to_meet" id="lookingToMeetMfCouple" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">MF Couple</label><br>
                <input type="checkbox" name="looking_to_meet" id="lookingToMeetFfCouple" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">FF Couple</label><br>
                <input type="checkbox" name="looking_to_meet" id="lookingToMeetMmCouple" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">MM Couple</label><br>
                <input type="checkbox" name="looking_to_meet" id="lookingToMeetTgCouple" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">TG Couple</label><br>
                <input type="checkbox" name="looking_to_meet" id="lookingToMeetCdCouple" class="looking_to_meet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">CD Couple</label><br> -->
            </div>

        </div>
        <center><span class="form-invalid"><?php echo $data['looking_to_meet_err'];?></span></center>


            <br>


        <input type="submit" value="Next" class="form-btn">

    </form>
</div>

<!-- Javascript -->

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/components/imageUpload/imageUpload.js"></script>

<?php require APPROOT.'/views/inc/footer.php';
?>
