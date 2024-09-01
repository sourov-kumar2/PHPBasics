<?php 

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

if (isset($_POST['reg123'])) {
    $uname = $_POST['uname'];
    $umail = $_POST['umail'];
    $gndr = $_POST['gndr'] ?? null;
    $hobbies = $_POST['hobbies'] ?? null;
    $country = $_POST['country'];

    
    if (empty($uname)) {
        $errname = "Name is required";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $uname)) {
        $errname = "Enter a valid name";
    }else{
        $corrname = $uname;
    }
    if(empty($umail)){
        $errmail="Email is required";
    }elseif(!filter_var($umail, FILTER_VALIDATE_EMAIL)){
        $errmail = "Invalid mail address";
    }else{
        $corrmail = $umail;
    }
    if(empty($gndr)){
        $errgndr = " Pleaase Select a gender";
    }else{
        $corrgndr = $gndr;
    }
    if(empty($hobbies)){
        $errhobbies = "Please Select a Hobby";
    }else{
        $corrhobbies = $hobbies;
    }
    if(empty($country)){
        $errcountry = "Please Select a country";
    }
    else{
        $corrcountry = $country;
    }
    
}

?>



<form action="" method="post">
    <input type="text" name="uname" placeholder="Your Name" value="<?=$uname ?? null?>">
    <span style="color: red">
    <?= $errname ?? null ?>
    </span>
    <br> <br>
    <input type="text" name="umail" placeholder="Your Email" value="<?=$umail ?? null?>">
    <span style="color: red">
        <?= $errmail ?? null ?>
    </span>
    <br> <br>
    <label for="">Gender :</label>
    <label for="Male">
        <input type="radio" name="gndr" value="Male" id="Male" <?=isset($gndr) && $gndr == "Male"? "checked":null?> >Male
    </label>
    <label for="Female">
        <input type="radio" name="gndr" value="Female" id="Female" <?=isset($gndr)&& $gndr == "Female"? "checked":null?> >Female
    </label>
    <span style="color: red">
        <?= $errgndr ?? null ?>
    </span>
    <br><br>
    <label for="">Hobbies :</label>
    <label for="coding">
        <input type="checkbox" name="hobbies[]" id="coding" value="coding" <?=isset($hobbies)&& in_array("coding",$hobbies)? "checked":null?>>Coding
    </label>
    <label for="gaming">
        <input type="checkbox" name="hobbies[]" id="gaming" value="gaming" <?=isset($hobbies)&& in_array("gaming",$hobbies)? "checked":null?>>Gaming
    </label>
    <label for="sleeping">
        <input type="checkbox" name="hobbies[]" id="sleeping" value="sleeping" <?=isset($hobbies)&& in_array("sleeping",$hobbies)? "checked":null?>>Sleeping
    </label>
    <span style="color: red">
        <?= $errhobbies ?? null ?>
    </span>
    <br><br>
    <select name="country" id="">
        <option value="">--select country--</option>
        <?php foreach($countries as $ctr){ ?>
            <option value="<?= $ctr ?>" <?= isset($country) && $country == $ctr ? "selected":null ?>><?= $ctr ?></option>
        <?php } ?>
    </select>
    <span style="color: red">
        <?= $errcountry ?? null ?>
    </span>
    <br><br>
    <button type="submit" name="reg123">submit</button>

</form>
<?php  
    if(isset($corrname) && isset($corrmail) && isset($corrgndr) && isset($corrhobbies) && isset($corrcountry)){
?>
    <h4>Name : <?= $corrname ?></h4>
    <h4>Email : <?= $corrmail ?></h4>
    <h4>Gender : <?= $corrgndr ?></h4>
    <h4>Hobbies : <?= implode(", ",$corrhobbies) ?></h4>
    <h4>Country : <?= $corrcountry ?></h4>
<?php
    }
?>