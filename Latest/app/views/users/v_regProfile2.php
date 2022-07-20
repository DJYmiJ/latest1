<?php require APPROOT.'/views/inc/header.php';
?>

<!-- Top Navigation -->
<?php require APPROOT.'/views/inc/components/topnavbar.php';
?>

<?php if($_SESSION['user_profile_type'] == 'male' || 'female' || 'transgender' || 'crossdresser' ): 

print_r($_SESSION['user_profile_type']);

?>

<div class="form-container">

    <div class="form-header">
        <center>
            <h1>Profile Information</h1>

            <p>Please complete the form to Register.</p>
        </center>
    </div>

    <form action="<?php echo URLROOT?>/Users/regProfile2" method="POST">

        <?php flash( 'reg_flash' );
?>

        <!-- Type -->
        <center>
            <div class="form-input-title">Profile Type</div>
        </center>
        <div class="form-profile">
            <div class="form-profile">

                <!-- Date of Birth -->
                <div class="form-input-title">Date of Birth (18+)</div>
                <center>
                
                <select name="day" id="day" class="custom-select"><?php for( $x=1; $x <= 31; $x++ ) {
                    if( $x == date("j" ) ) echo "<option selected>$x</option>"; else echo "<option>$x</option>"; }?>
                </select>
                <label for="profileType">Day</label>
                

                <select name="month" class="custom-select"><?php for( $x=1; $x<=12; $x++ ) {
                    if( $x == date("m" ) ) echo "<option selected>$x</option>"; else echo "<option>$x</option>"; }?>
                </select>
                <label for="profileType">Month</label>
                
                
                <select name="year" class="custom-select"><?php for( $x=2004; $x>=1900; $x-- ) {
                    if( $x == date("Y" ) ) echo "<option selected>$x</option>"; else echo "<option>$x</option>"; }?>
                </select>
                <label for="profileType">Year</label>
                <span class="form-invalid"><?php echo $data['user_dob_err']; ?></span>
                </center>
                
                
                
                <!-- Display Name -->
                <div class="form-input-title">Display Name</div>
                <input type="text" name="display_name" id="display_name" class="displayName" value="<?php echo $data['display_name']; ?>">
                <span class="form-invalid"><?php echo $data['display_name_err']; ?></span>

                <!-- Town -->
                <div class="form-input-title">Town</div>
                <input type="text" name="profile_town" id="profile_town" class="profile_town" value="<?php echo $data['profile_town']; ?>">
                <span class="form-invalid"><?php echo $data['profile_town_err']; ?></span>

                <!-- Post Code -->
                <div class="form-input-title">Post Code</div>
                <input type="text" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>

                <!-- Post Code -->
                <div class="form-input-title">Post Code</div>
                <input type="text" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>
            </div>


            <span class="form-invalid"><?php echo $data['display_name_err'];?></span>

        </div>



        <!-- Looking to meet -->
        <center>
            <div class="form-input-title">Looking to meet...</div>
        </center>
        <div class="form-type">
            <div class="form-left">
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetMale" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Male</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetFemale" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Female</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetTrans" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Transgender</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetCross" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Crossdresser</label><br>
            </div>
            <div class="form-right">
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetMfCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">MF Couple</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetFfCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">FF Couple</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetMmCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">MM Couple</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetTgCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">TG Couple</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetCdCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">CD Couple</label><br>

                <span class="form-invalid"><?php echo $data['looking_to_meet_err'];?></span>

            </div>

            <br>

        </div>

        <input type="submit" value="Next" class="form-btn">

    </form>
</div>

<?php elseif($_SESSION['user_profile_type'] == 'mfcouple' || 'ffcouple' || 'mmcouple' || 'tgcouple' || 'cdcouple' ): 

print_r($_SESSION['user_profile_type']);

?>

<div class="form-container">

    <div class="form-header">
        <center>
            <h1>Profile Information</h1>

            <p>Please complete the form to Register.</p>
        </center>
    </div>

    <form action="<?php echo URLROOT?>/Users/regProfile2" method="POST">

        <?php flash( 'reg_flash' );
?>

        <!-- Type -->
        <center>
            <div class="form-input-title">Profile Type</div>
        </center>
        <div class="form-type">
            <div class="form-left">
                <!-- Name -->
                <div class="form-input-title">Username</div>
                <input type="text" name="username" id="username" class="username" value="<?php echo $data['username']; ?>">
                <span class="form-invalid"><?php echo $data['username_err']; ?></span>

                <!-- Email -->
                <div class="form-input-title">Email</div>
                <input type="text" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-right">
                <input type="radio" name="profileType" id="mfCouple" class="profileType" value="<?php echo $data['profile_type']; ?>">
                <label for="profileType">MF Couple</label><br>
                <input type="radio" name="profileType" id="ffCouple" class="profileType" value="<?php echo $data['profile_type']; ?>">
                <label for="profileType">FF Couple</label><br>
                <input type="radio" name="profileType" id="mmCouple" class="profileType" value="<?php echo $data['profile_type']; ?>">
                <label for="profileType">MM Couple</label><br>
                <input type="radio" name="profileType" id="tgCouple" class="profileType" value="<?php echo $data['profile_type']; ?>">
                <label for="profileType">TG Couple</label><br>
                <input type="radio" name="profileType" id="cdCouple" class="profileType" value="<?php echo $data['profile_type']; ?>">
                <label for="profileType">CD Couple</label><br>
            </div>

            <span class="form-invalid"><?php echo $data['profile_type_err'];?></span>

        </div>



        <!-- Looking to meet -->
        <center>
            <div class="form-input-title">Looking to meet...</div>
        </center>
        <div class="form-type">
            <div class="form-left">
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetMale" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Male</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetFemale" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Female</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetTrans" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Transgender</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetCross" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">Crossdresser</label><br>
            </div>
            <div class="form-right">
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetMfCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">MF Couple</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetFfCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">FF Couple</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetMmCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">MM Couple</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetTgCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">TG Couple</label><br>
                <input type="checkbox" name="lookingToMeet" id="lookingToMeetCdCouple" class="lookingToMeet" value="<?php echo $data['looking_to_meet']; ?>">
                <label for="profileType">CD Couple</label><br>

                <span class="form-invalid"><?php echo $data['looking_to_meet_err'];?></span>

            </div>

            <br>

        </div>

        <input type="submit" value="Next" class="form-btn">

    </form>
</div>

<?php endif ?>

<!-- Javascript -->

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/components/imageUpload/imageUpload.js"></script>
<!--  <script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/components/dateofbirth.js"></script>

<?php require APPROOT.'/views/inc/footer.php';
?>
