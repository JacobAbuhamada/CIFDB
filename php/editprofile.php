<!DOCTYPE html>
<!-- editprofile page is linked from signup or edit profile -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light only">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php
    include "class-db.php";

    session_start();
    
    if (!isset($_SESSION['user'])) {
      header('Location: login.php');
  }
  $db = new DB();

  $data = $db->get_profile_data($_SESSION['user']['ID']);

  $countries = array(
            "AF" => "Afghanistan",
            "AX" => "Aland Islands",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BQ" => "Bonaire, Sint Eustatius and Saba",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "IO" => "British Indian Ocean Territory",
            "BN" => "Brunei Darussalam",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos (Keeling) Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo",
            "CD" => "Congo, Democratic Republic of the Congo",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "CI" => "Cote D'Ivoire",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CW" => "Curacao",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands (Malvinas)",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and Mcdonald Islands",
            "VA" => "Holy See (Vatican City State)",
            "HN" => "Honduras",
            "HK" => "Hong Kong",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran, Islamic Republic of",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KP" => "Korea, Democratic People's Republic of",
            "KR" => "Korea, Republic of",
            "XK" => "Kosovo",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Lao People's Democratic Republic",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libyan Arab Jamahiriya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macao",
            "MK" => "North Macedonia",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "MX" => "Mexico",
            "FM" => "Micronesia, Federated States of",
            "MD" => "Moldova, Republic of",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestinian Territory, Occupied",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RE" => "Reunion",
            "RO" => "Romania",
            "RU" => "Russian Federation",
            "RW" => "Rwanda",
            "BL" => "Saint Barthelemy",
            "SH" => "Saint Helena",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "MF" => "Saint Martin",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome and Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "CS" => "Serbia and Montenegro",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SX" => "Sint Maarten",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "SS" => "South Sudan",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syrian Arab Republic",
            "TW" => "Taiwan, Province of China",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania, United Republic of",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "UM" => "United States Minor Outlying Islands",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VE" => "Venezuela",
            "VN" => "Viet Nam",
            "VG" => "Virgin Islands, British",
            "VI" => "Virgin Islands, U.s.",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe",
  );

  $education = array(
           "no_edu"=> "No formal education",
            "primary_edu"=> "Primary school",
            "secondary_edu"=> "High/Secondary school",
            "one_year_edu"=> "One year of college/university",
            "assoc_edu"=> "Two years of college/university or Associate's degree",
            "three_year_edu"=> "Three years of college/university",
            "BA_or_four_edu"=> "Four years of college/university or Bachelor's degree",
            "grad_cert_edu"=> "Graduate certificate or one to two years of graduate school",
            "masters_edu"=> "Master's degree or 3 - 4 years graduate school",
            "phd_edu"=> "Doctorate degree/PhD/MD/JD/etc. or 5+ years graduate school",
  );
?>  
    <div class="container">    
        <div class="nav-wrapper">  
          <div class="right-side">
            <div class='brand' ><h1>CIF Database</h1></div> 
          </div>
        </div>    
    </div>
    <br>
    <h1>Demographic Information</h1>
    Why these are important: This information will allow researchers to compare the psychology/subjective
experience of different demographic groups and look for relationships between identity and experience. Without the
ability to sort experiences by different categories the nuanced differences between groups will be lost in the aggregation.
    <br><br>
    <!-- <strong>Responses are optional except for Date of Birth, which will be encrypted.</strong>
    <br><br> -->
    
    <hr>
    <form action="profile-handler.php" method="POST">
    <div>
        <label for="birthdate"><strong>Birthdate:</strong></label>
        <input type="date" name="birthdate" id="birthdate" min="1900-01-01" max="2012-01-01" value="<?php echo isset($data['DOB']) ? $data['DOB'] : ""; ?>" required>
    </div>
    <hr>

    <div>
        <strong>Gender</strong>
        <div>
          <label for="male">Male</label>
          <input type="radio" name="gender" id="male" value="0" <?php echo isset($data['gender']) && $data['gender']=='0' ? "checked" : ''; ?>>
        </div>
        <div>
          <label for="female">Female</label>
          <input type="radio" name="gender" id="female" value="1" <?php echo isset($data['gender']) && $data['gender']=='1' ? "checked" : ''; ?>>
        </div>
        <div>
            <label for="nb">Genderqueer/Non-Binary</label>
            <input type="radio" name="gender" id="nb" value="2" <?php echo isset($data['gender']) && $data['gender']=='2' ? "checked" : ''; ?>>
        </div>
        <div>
            <label for="other">Other</label>
            <input type="radio" name="gender" id="other" value="3" <?php echo isset($data['gender']) && $data['gender']=='3' ? "checked" : ''; ?>>
        </div>
        <hr>
        
        <section class="trans">
            <span><strong>Are you transgender?</strong></span>
            <br>
            <input type="radio" name="trans" id="yes" value="1" <?php echo isset($data['trans']) && $data['trans']=='1' ? "checked" : ''; ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="trans" id="no" value="0" <?php echo isset($data['trans']) && $data['trans']=='0' ? "checked" : ''; ?>>
            <label for="no">No</label>
        </section>
        <hr>
        <section class="races">
            <span><strong>What is your racial identity?</strong></span>
            <br>
            <input type="radio" name="race" id="native" value="0" <?php echo isset($data['race']) && $data['race']=='0' ? "checked" : ''; ?>>
            <label for="native">American/Alaskan Native/Indigenous</label>
            <br>
            <input type="radio" name="race" id="asian" value="1" <?php echo isset($data['race']) && $data['race']=='1' ? "checked" : ''; ?>>
            <label for="asian">Asian</label>
            <br>
            <input type="radio" name="race" id="black" value="2" <?php echo isset($data['race']) && $data['race']=='2' ? "checked" : ''; ?>>
            <label for="black">Black or of African descent</label>
            <br>
            <input type="radio" name="race" id="pacific" value="3" <?php echo isset($data['race']) && $data['race']=='3' ? "checked" : ''; ?>>
            <label for="pacific">Pacific Islander/Polynesian/Native Hawaiian</label>
            <br>
            <input type="radio" name="race" id="white" value="4" <?php echo isset($data['race']) && $data['race']=='4' ? "checked" : ''; ?>>
            <label for="white">White/Caucasian</label>
            <br>
            <input type="radio" name="race" id="two_or_more" value="5" <?php echo isset($data['race']) && $data['race']=='5' ? "checked" : ''; ?>>
            <label for="two_or_more">Two or more of the above</label>
            <br>
            <input type="radio" name="race" id="otherace" value="6" <?php echo isset($data['race']) && $data['race']=='6' ? "checked" : ''; ?>>
            <label for="otherace">Other/Race Not Listed</label>
          </section>
          <hr>
          <section class="ethnicity">
            <label for="ethnicity"><strong>What is your ethnicity or ethnic group?</strong> 
              <br>(If not in the dropdown enter whatever you consider to be your ethnic identity)</label>
              <br>
              <input list="ethnicities" id="ethnicity" name="ethnicity" value="<?php echo isset($data['ethnicity']) ? $data['ethnicity'] : ''; ?>">
            <datalist id="ethnicities">
              <option value="Arab"></option>
              <option value="Jewish"></option>
              <option value="Slavic"></option>
              <option value="Japanese"></option>
              <option value="Cherokee"></option>
              <option value="Tibetan"></option>
              <option value="Han Chinese"></option>
              <option value="Hmong"></option>
              <option value="Germanic"></option>
              <option value="Hispanic"></option>
              <option value="Ojibwe"></option>
              <option value="Somali"></option>
              <option value="Tamil"></option>
              <option value="Roma"></option>
              <option value="Other"></option>
            </datalist>
          </section>
          <hr>
          <section class="religion">
            <label for="religion"><strong>What is your religious affiliation?</strong> 
              <br>(If not in the dropdown please enter the best descriptor of your religious identity)</label>
              <br>
              <input list="religion" name="religion" value="<?php echo isset($data['religion']) ? $data['religion'] : ''; ?>">
            <datalist id="religion">
              <option value="Agnostic"></option>
              <option value="Atheist"></option>
              <option value="Buddhist - Tibetan"></option>
              <option value="Buddhist - Mahayana"></option>
              <option value="Buddhist - Theravada"></option>
              <option value="Buddhist - Other"></option>              
              <option value="Christian - Catholic"></option>
              <option value="Christian - Orthodox"></option>
              <option value="Christian - Protestant"></option>
              <option value="Christian - Other"></option>
              <option value="Jewish"></option>
              <option value="Hindu"></option>
              <option value="Muslim - Sunni"></option>
              <option value="Muslim - Shia"></option>
              <option value="Muslim - Sufi"></option>
              <option value="Paganism"></option>
              <option value="Shinto"></option>
              <option value="Sikhism"></option>
              <option value="Spiritual but not Religious"></option>
              <option value="Taoist"></option>
            </datalist>
          </section>
          <hr>
          <strong>Political Affiliation</strong>
          <br>
          <br>
          <section class="politics">
            <label for="economics">What is your economic stance?</label>
            <br>
            <span>Left/Liberal</span>
            <input type="range" name="economics" id="economics" value="<?php echo isset($data['econ_stance']) ? $data['econ_stance'] : '3'; ?>" min="1" max="5" list="cultureTicks">

            <span>Right/Conservative</span>
            <br><br>
            <label for="culture">What is your cultural stance?</label>
            <br>
            <span>Left/Progressive</span>
            <input type="range" name="culture" id="culture" value="<?php echo isset($data['cultural_stance']) ? $data['cultural_stance'] : '3'; ?>" min="1" max="5" list="cultureTicks">
            <datalist id="cultureTicks">
                <option value="0" label="0"></option>
                <option value="1"></option>
                <option value="2"></option>
                <option value="3" label="3"></option>
                <option value="4"></option>
                <option value="5" label="5"></option>
            </datalist>
            <span>Right/Conservative</span>
          </section>
          <hr>

          <strong>Education</strong>
          <br><br>

          <select id="education" name="education">
            <?php 
              if (!isset($data['education'])){
                echo "<option>select education level</option>";
              } else {
                echo '<option value="'.$data["education"].'">'.$education[$data['education']].'</option>';
              }
            ?>
            <option value="no_edu">No formal education</option>
            <option value="primary_edu">Primary school</option>
            <option value="secondary_edu">High/Secondary school</option>
            <option value="one_year_edu">One year of college/university</option>
            <option value="assoc_edu">Two years of college/university or Associate's degree</option>
            <option value="three_year_edu">Three years of college/university</option>
            <option value="BA_or_four_edu">Four years of college/university or Bachelor's degree</option>
            <option value="grad_cert_edu">Graduate certificate or one to two years of graduate school</option>
            <option value="masters_edu">Master's degree or 3 - 4 years graduate school</option>
            <option value="phd_edu">Doctorate degree/PhD/MD/JD/etc. or 5+ years graduate school</option>
          </select>


          <hr>
          <strong>Location</strong>
          <br><br>
          What is your country of residence?
          <select id="country" name="country">
            <?php 
              if (!isset($data['country'])){
                echo "<option>select country</option>";
              } else {
                echo '<option value="'.$data["country"].'">'.$countries[$data['country']].'</option>';
              }
            ?>
            <option value="AF">Afghanistan</option>
            <option value="AX">Aland Islands</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua and Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia</option>
            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
            <option value="BA">Bosnia and Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="BN">Brunei Darussalam</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="CV">Cape Verde</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos (Keeling) Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, Democratic Republic of the Congo</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Cote D'Ivoire</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CW">Curacao</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="ET">Ethiopia</option>
            <option value="FK">Falkland Islands (Malvinas)</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="TF">French Southern Territories</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GG">Guernsey</option>
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HM">Heard Island and Mcdonald Islands</option>
            <option value="VA">Holy See (Vatican City State)</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran, Islamic Republic of</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IM">Isle of Man</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JE">Jersey</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KP">Korea, Democratic People's Republic of</option>
            <option value="KR">Korea, Republic of</option>
            <option value="XK">Kosovo</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Lao People's Democratic Republic</option>
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libyan Arab Jamahiriya</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MO">Macao</option>
            <option value="MK">North Macedonia</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico</option>
            <option value="FM">Micronesia, Federated States of</option>
            <option value="MD">Moldova, Republic of</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia</option>
            <option value="ME">Montenegro</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="AN">Netherlands Antilles</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="MP">Northern Mariana Islands</option>
            <option value="NO">Norway</option>
            <option value="OM">Oman</option>
            <option value="PK">Pakistan</option>
            <option value="PW">Palau</option>
            <option value="PS">Palestinian Territory, Occupied</option>
            <option value="PA">Panama</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="RE">Reunion</option>
            <option value="RO">Romania</option>
            <option value="RU">Russian Federation</option>
            <option value="RW">Rwanda</option>
            <option value="BL">Saint Barthelemy</option>
            <option value="SH">Saint Helena</option>
            <option value="KN">Saint Kitts and Nevis</option>
            <option value="LC">Saint Lucia</option>
            <option value="MF">Saint Martin</option>
            <option value="PM">Saint Pierre and Miquelon</option>
            <option value="VC">Saint Vincent and the Grenadines</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="ST">Sao Tome and Principe</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="RS">Serbia</option>
            <option value="CS">Serbia and Montenegro</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore</option>
            <option value="SX">Sint Maarten</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia and the South Sandwich Islands</option>
            <option value="SS">South Sudan</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SD">Sudan</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard and Jan Mayen</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="SY">Syrian Arab Republic</option>
            <option value="TW">Taiwan, Province of China</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania, United Republic of</option>
            <option value="TH">Thailand</option>
            <option value="TL">Timor-Leste</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad and Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
            <option value="TC">Turks and Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB">United Kingdom</option>
            <option value="US">United States</option>
            <option value="UM">United States Minor Outlying Islands</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Viet Nam</option>
            <option value="VG">Virgin Islands, British</option>
            <option value="VI">Virgin Islands, U.s.</option>
            <option value="WF">Wallis and Futuna</option>
            <option value="EH">Western Sahara</option>
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
          </select>
          <br><br>
          <section class="zip">
            <label for="zip">What is your zip code? (US residents only) </label>
            <input type="number" name="zip" id="zip" min="00100" max="99999" value="<?php echo isset($data["zip"]) ? $data["zip"] : '' ?>">
          </section>
          <hr>

          <section class="soc_class">
            <span><strong>What is your socio-economic class?</strong></span>
            <br>
            <input type="radio" name="soc_class" id="poor" value="0" <?php echo isset($data["soc_class"]) && $data["soc_class"]==0 ? "checked" : '' ?>>
            <label for="poor">Poor/Poverty</label>
            <br>
            <input type="radio" name="soc_class" id="working" value="1" <?php echo isset($data["soc_class"]) && $data["soc_class"]==1 ? "checked" : '' ?>>
            <label for="working">Working/Lower-Middle Class</label>
            <br>
            <input type="radio" name="soc_class" id="middle" value="2" <?php echo isset($data["soc_class"]) && $data["soc_class"]==2 ? "checked" : '' ?>>
            <label for="middle">Middle Class</label>
            <br>
            <input type="radio" name="soc_class" id="up-mid" value="3" <?php echo isset($data["soc_class"]) && $data["soc_class"]==3 ? "checked" : '' ?>>
            <label for="up-mid">Upper-Middle Class</label>
            <br>
            <input type="radio" name="soc_class" id="upper" value="4" <?php echo isset($data["soc_class"]) && $data["soc_class"]==4 ? "checked" : '' ?>>
            <label for="upper">Upper Class/Wealthy</label>
            <br>
          </section>
          <hr>

          <section class="vet_status">
            <span><strong>What is your military/veteran status?</strong></span>
            <br>
            <input type="radio" name="vet_status" id="active" value="0" <?php echo isset($data["vet_status"]) && $data["vet_status"]==0 ? "checked" : '' ?>>
            <label for="active">Active Military</label>
            <br>
            <input type="radio" name="vet_status" id="veteran" value="1" <?php echo isset($data["vet_status"]) && $data["vet_status"]==1 ? "checked" : '' ?>>
            <label for="veteran">Veteran</label>
            <br>
            <input type="radio" name="vet_status" id="not_vet" value="2" <?php echo isset($data["vet_status"]) && $data["vet_status"]==2 ? "checked" : '' ?>>
            <label for="not_vet">Not a Veteran</label>
            <br>
            <input type="radio" name="vet_status" id="no_say_vet" value="3" <?php echo isset($data["vet_status"]) && $data["vet_status"]==3 ? "checked" : '' ?>>
            <label for="no_say_vet">Prefer Not to Say</label>
            <br>
          </section>
          <hr>

          <section class="dis_status">
            <span><strong>What is your disability status?</strong></span>
            <br>
            <input type="radio" name="dis_status" id="not_dis" value="0" <?php echo isset($data["dis_status"]) && $data["dis_status"]==0 ? "checked" : '' ?>>
            <label for="not_dis">Not Disabled/Differently Abled</label>
            <br>
            <input type="radio" name="dis_status" id="disabled" value="1" <?php echo isset($data["dis_status"]) && $data["dis_status"]==1 ? "checked" : '' ?>>
            <label for="disabled">Disabled/Differently Abled</label>
            <br>
            <input type="radio" name="dis_status" id="no_say_dis" value="2" <?php echo isset($data["dis_status"]) && $data["dis_status"]==2 ? "checked" : '' ?>>
            <label for="no_say_dis">Prefer Not to Say</label>
            <br>
          </section>
          <hr>

          <h1>Medical/Psychiatric Information</h1>

          <section class="known_diag">
            <span>Please specify any known psychiatric diagnoses, including all formal
            psychological and neurological diagnoses from a clinician, 
            <br>as well as any physical diagnoses that
            have a noticeable effect on your experience or quality of life in most situations.
            <br> If you suspect any
            diagnosis which wasn't formally determined by a clinician, wait until the next section to enter it/them.</span>
            <br><br>
            Select all below that apply:
            <br>
            <input type="checkbox" name="maj_depression" id="maj_depression" value="maj_depression" <?php echo isset($data["maj_depression"]) && $data["maj_depression"]==2 ? "checked" : '' ?>>
            <label for="maj_depression">Major Depression</label>
            <br>
            <input type="checkbox" name="min_depression" id="min_depression" value="min_depression" <?php echo isset($data["min_depression"]) && $data["min_depression"]==2 ? "checked" : '' ?>>
            <label for="min_depression">Dysthymia</label>
            <br>
            <input type="checkbox" name="GAD" id="GAD" value="GAD" <?php echo isset($data["GAD"]) && $data["GAD"]==2 ? "checked" : '' ?>>
            <label for="GAD">Generalized Anxiety Disorder (GAD)</label>
            <br>
            <input type="checkbox" name="PTSD" id="PTSD" value="PTSD" <?php echo isset($data["PTSD"]) && $data["PTSD"]==2 ? "checked" : '' ?>>
            <label for="PTSD">Post-Traumatic Stress Disorder (PTSD)</label>
            <br>
            <input type="checkbox" name="social_anx" id="social_anx" value="social_anx" <?php echo isset($data["social_anx"]) && $data["social_anx"]==2 ? "checked" : '' ?>>
            <label for="social_anx">Social Anxiety Disorder</label>
            <br>
            <input type="checkbox" name="OCD" id="OCD" value="OCD" <?php echo isset($data["OCD"]) && $data["OCD"]==2 ? "checked" : '' ?>>
            <label for="OCD">Obsessive-Compulsive Disorder (OCD)</label>
            <br>
            <input type="checkbox" name="DID" id="DID" value="DID" <?php echo isset($data["DID"]) && $data["DID"]==2 ? "checked" : '' ?>>
            <label for="DID">Dissociative Identity Disorder (DID)</label>
            <br>
            <input type="checkbox" name="dissociative" id="dissociative" value="dissociative" <?php echo isset($data["dissociative"]) && $data["dissociative"]==2 ? "checked" : '' ?>>
            <label for="dissociative">Other Dissociative Disorder (besides DID)</label>
            <br>
            <input type="checkbox" name="bipolar" id="bipolar" value="bipolar" <?php echo isset($data["bipolar"]) && $data["bipolar"]==2 ? "checked" : '' ?>>
            <label for="bipolar">Bipolar disorder/Manic Depression (I, II, or Cyclothymia)</label>
            <br>
            <input type="checkbox" name="psychotic" id="psychotic" value="psychotic" <?php echo isset($data["psychotic"]) && $data["psychotic"]==2 ? "checked" : '' ?>>
            <label for="psychotic">Psychotic disorder/Schizophrenia</label>
            <br>
            <input type="checkbox" name="personality" id="personality" value="personality" <?php echo isset($data["personality"]) && $data["personality"]==2 ? "checked" : '' ?>>
            <label for="personality">Personality Disorder (BPD, OCPD, APD, etc.)</label>
            <br>
            <input type="checkbox" name="sleep" id="sleep" value="sleep" <?php echo isset($data["sleep"]) && $data["sleep"]==2 ? "checked" : '' ?>>
            <label for="sleep">Sleep Disorder (Narcolepsy, Insomnia, Sleep Apnea, RLS, etc.)</label>
            <br>
            <input type="checkbox" name="eating" id="eating" value="eating" <?php echo isset($data["eating"]) && $data["eating"]==2 ? "checked" : '' ?>>
            <label for="eating">Eating disorder (Anorexia, Bullimia, Binge-Eating disorder, etc.)</label>
            <br>
            <input type="checkbox" name="dementia" id="dementia" value="dementia" <?php echo isset($data["dementia"]) && $data["dementia"]==2 ? "checked" : '' ?>>
            <label for="dementia">Dementia (Alzheimer's, Parkinson's, Huntington's, etc.)</label>
            <br><br>
            <label for="additional_diag">Please write all specific confirmed diagnoses (including any not listed above):</label>
            <!-- <input type="text" name="known_diag" id="additional_diag" placeholder=" "> -->
            <br>
            <textarea id="additional_diag" name="additional_diag" rows="3" cols="40" maxlength="1000"><?php echo isset($data["known_diagnoses"]) ? $data["known_diagnoses"] : '' ?></textarea>
            <br>
          </section>
          <hr>
          <section class="susp_diag">
            <span>Please specify any suspected psychiatric diagnoses, as well as any suspected physical diagnoses that
            have a noticeable effect on your experience or quality of life in most situations. 
            <br> If you suspect any
            diagnosis which wasn't formally determined by a clinician, enter it below.</span>
            <br><br>
            Select all that apply:
            <br>
            <input type="checkbox" name="maj_depression_sus" id="maj_depression_sus" value="maj_depression" <?php echo isset($data["maj_depression"]) && $data["maj_depression"]==1 ? "checked" : '' ?>>
            <label for="maj_depression">Major Depression</label>
            <br>
            <input type="checkbox" name="min_depression_sus" id="min_depression_sus" value="min_depression" <?php echo isset($data["min_depression"]) && $data["min_depression"]==1 ? "checked" : '' ?>>
            <label for="min_depression">Dysthymia</label>
            <br>
            <input type="checkbox" name="GAD_sus" id="GAD_sus" value="GAD" <?php echo isset($data["GAs"]) && $data["GAD"]==1 ? "checked" : '' ?>>
            <label for="GAD">Generalized Anxiety Disorder (GAD)</label>
            <br>
            <input type="checkbox" name="PTSD_sus" id="PTSD_sus" value="PTSD" <?php echo isset($data["PTSD"]) && $data["PTSD"]==1 ? "checked" : '' ?>>
            <label for="PTSD">Post-Traumatic Stress Disorder (PTSD)</label>
            <br>
            <input type="checkbox" name="social_anx_sus" id="social_anx_sus" value="social_anx" <?php echo isset($data["social_anx"]) && $data["social_anx"]==1 ? "checked" : '' ?>>
            <label for="social_anx">Social Anxiety Disorder</label>
            <br>
            <input type="checkbox" name="OCD_sus" id="OCD_sus" value="OCD" <?php echo isset($data["OCD"]) && $data["OCD"]==1 ? "checked" : '' ?>>
            <label for="OCD">Obsessive-Compulsive Disorder (OCD)</label>
            <br>
            <input type="checkbox" name="DID_sus" id="DID_sus" value="DID" <?php echo isset($data["DID"]) && $data["DID"]==1 ? "checked" : '' ?>>
            <label for="DID">Dissociative Identity Disorder (DID)</label>
            <br>
            <input type="checkbox" name="dissociative_sus" id="dissociative_sus" value="dissociative" <?php echo isset($data["dissociative"]) && $data["dissociative"]==1 ? "checked" : '' ?>>
            <label for="dissociative">Other Dissociative Disorder (besides DID)</label>
            <br>
            <input type="checkbox" name="bipolar_sus" id="bipolar_sus" value="bipolar" <?php echo isset($data["bipolar"]) && $data["bipolar"]==1 ? "checked" : '' ?>>
            <label for="bipolar">Bipolar disorder/Manic Depression (I, II, or Cyclothymia)</label>
            <br>
            <input type="checkbox" name="psychotic_sus" id="psychotic_sus" value="psychotic" <?php echo isset($data["psychotic"]) && $data["psychotic"]==1 ? "checked" : '' ?>>
            <label for="psychotic">Psychotic disorder/Schizophrenia</label>
            <br>
            <input type="checkbox" name="personality_sus" id="personality_sus" value="personality" <?php echo isset($data["personality"]) && $data["personality"]==1 ? "checked" : '' ?>>
            <label for="personality">Personality Disorder (BPD, OCPD, APD, etc.)</label>
            <br>
            <input type="checkbox" name="sleep_sus" id="sleep_sus" value="sleep" <?php echo isset($data["sleep"]) && $data["sleep"]==1 ? "checked" : '' ?>>
            <label for="sleep">Sleep Disorder (Narcolepsy, Insomnia, Sleep Apnea, RLS, etc.)</label>
            <br>
            <input type="checkbox" name="eating_sus" id="eating_sus" value="eating" <?php echo isset($data["eating"]) && $data["eating"]==1 ? "checked" : '' ?>>
            <label for="eating">Eating disorder (Anorexia, Bullimia, Binge-Eating disorder, etc.)</label>
            <br>
            <input type="checkbox" name="dementia_sus" id="dementia_sus" value="dementia" <?php echo isset($data["dementia"]) && $data["dementia"]==1 ? "checked" : '' ?>>
            <label for="dementia">Dementia (Alzheimer's, Parkinson's, Huntington's, etc.)</label>
            <br><br>
            <label for="add_susp_diag">Please write all suspected diagnoses (including any not listed above):</label>
            <!-- <input type="text" name="known_diag" id="additional_diag" placeholder=" "> -->
            <br>
            <textarea name="susp_diag" id="add_susp_diag"  rows="3" cols="40"  maxlength="1000"><?php echo isset($data["susp_diagnoses"]) ? $data["susp_diagnoses"] : '' ?></textarea>
            <br>
            <hr>
            <br>  
            <section class="Rx">
                <label for="Rx"><strong>Please list all daily medications/supplements: </strong></label>
                <br><br>
                (Including average caffeine consumption)
                <br><br> 
                <textarea name="Rx" id="Rx" rows="3" cols="40" maxlength="1000"><?php echo isset($data["medications"]) ? $data["medications"] : '' ?></textarea>            
            </section>
          </section>
          <hr>

          <button type="submit" name="submit">Submit</button>
          <br><br><br>
      </form>  
    </div>
</body>
</html>