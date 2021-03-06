<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light only">
    <title>Consent Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="consent-form" style="text-align: justify;">
        <h1>Common Integrative Framework – Experience Sampling Study Consent Form And Instructions</h1>
        <br>
        <h2>PLEASE READ IN ENTIRETY BEFORE JOINING THE STUDY!</h2>
        <br>
        <h3>1.  	INTRODUCTION</h3>
        
        You are invited to be a participant in a research study about the nature and structure of the mind. We ask that you read this document and ask any questions you may have before agreeing to be in the study by making your account. We require that participants in this study be at least 18 years old.  
        <br><br>
        This study is being conducted by Jacob Abuhamada, a graduate student at Hood College.
        <br>
        <h3>2.	BACKGROUND AND PURPOSE OF THE STUDY</h3>

        Researchers in the psychological sciences have long searched for unifying theories, models, and frameworks to improve the understanding of the human mind for both research and clinical applications. The general purpose of this study is to understand the nature of the mind by tracking experiences over time from many individual participants along a few basic qualities of subjective experience. The specific goals of the study include understanding differences of experience across demographic categories, predicting psychiatric diagnosis, and validating a general framework of the mind: the Common Integrative Framework (CIF).

        <h3>3.	DURATION</h3>

        This study will continue until July 1st, 2022. The length of time you will be participating is at your discretion, although a minimum of 3 months participation is preferable. You will receive two randomized prompts daily between the hours of 8am and 9pm for as long as you wish to participate. Simply uninstall or silence the Samply app or ignore the prompts when you no longer wish to participate.

        <h3>4.	PROCEDURES</h3>

        If you agree to be in this study, we will ask you to do the following: <br>
        <ul>
            <li>First, you will create an account on the CIF DB site: cifdb.org (this will be the link sent in the two daily prompts). 
                Additionally, you will have to sign up for the study on the <a href="https://samply.uni-konstanz.de/studies/common-integrative-framework-study" target="_blank" rel="noopener noreferrer">Samply app</a> to receive the notifications.</li>
            <li>Next, you will be prompted to complete demographic and basic psychiatric questions.</li>
            <li>When prompted via reminder once or twice per day using the Samply Research mobile app or an email reminder, (circumstances permitting) you will click the link in the reminder to log in to the CIF DB site and record your current experience on the website, generally taking no more than 2 to 3 minutes.</li>  
            <li>If you are unable to respond to all prompts, there is no need to submit the incomplete current experience—either respond in full when you have a moment to safely do so or skip that entry (please do not answer questions when in a situation where doing so is unsafe, i.e. while driving). Skipping entries is not a problem for the study (as the study's focus is on aggregating this data over an extended period of time), so do not hesitate to ignore the prompt if completing it feels at all stressful/unsafe given your present situation.</li>
            <li>Additionally, you are encouraged to do the EncephalApp Stroop Test (<a href="https://www.encephalapp.com/" target="_blank" rel="noopener noreferrer">Apple iOS</a> | <a  href="https://play.google.com/store/apps/details?id=com.mobelux.stroop_android&hl=en_US&gl=US&showAllReviews=true" target="_blank" rel="noopener noreferrer"> Android</a>) immediately afterwards and follow the instructions for submitting the completed tests as often as possible to have an objective measure of cognition/processing speed, but this is not required to submit your experiences.</li>
        </ul>
        <h3>5.	RISKS/BENEFITS</h3>

        Given that the respondent has control over the choice to respond, this study has minimal or no anticipated risks associated with participating. The two daily prompts may be distracting, but do not hesitate to ignore them if this is ever the case. 
        <br><br>
        The benefits of participation are:  
            <br>1) A .csv file/s containing all of your data will be available upon request.
            <br>2) When the study is completed you will receive a report detailing the conclusions of the study, and access to a copy of the final thesis manuscript upon request.
            <br>3) If you are an undergraduate student enrolled in a psychology course at Hood College, you may receive extra credit for participating in this student-led research.
        <br>
        <h3>6.	CONFIDENTIALITY</h3>

        The records of this study will be kept private on Hood College's password-protected server and your name will not be recorded at any point. Birthdate, ID, login and contact information will all be encrypted. In any sort of report that is published or presentation that is given, we will not include any information that will make it possible to identify a participant.  

        <h3>7.	VOLUNTARY NATURE OF THE STUDY</h3>

        Your participation in this study is completely voluntary. Your decision whether or not to participate will not affect your current or future relations with Hood College or any of its representatives.  If you decide to participate in this study, you are free to withdraw from the study at any time without affecting those relationships. You are also free to simply stop participating at any time. If you wish to formally withdraw, send an email request to cif.database@gmail.com, and you will be sent a copy of your data before it is deleted.

        <h3>8.	CONTACTS AND QUESTIONS</h3>

        The researcher conducting this study is Jacob Abuhamada. If you have questions, you may contact the researcher at cif.database@gmail.com.  

        If you have questions or concerns regarding this study and would like to speak with someone other than the researcher, you may contact Dr. Jolene Sanders, Institutional Review Board Chair, Hood College, 401 Rosemont Ave., Frederick, MD 21701, sandersj@hood.edu.  

        <h3>9.	STATEMENT OF CONSENT</h3>

        You can access this consent statement on the CIFDB About page at any time, and can be emailed a copy upon request.  
        <br><br>
        The procedures of this study have been explained to me and my questions have been addressed.  The information that I provide is confidential and will be used for research purposes only.  I am at least eighteen years old.  I understand that my participation is voluntary and that I may withdraw or cease to participate at anytime without penalty.  If I have any concerns about my experience in this study (e.g., that I was treated unfairly or felt unnecessarily threatened), I may contact the Chair of the Institutional Review Board or the Chair of the sponsoring department of this research regarding my concerns.
    </div>
    <br><br>
    <?php if(isset($_SESSION["user"])){ ?>
        <form action="php/about.php">
            <input type="submit" value="Return to About Page" />
        </form>
    <?php } else { 
         if(isset($_GET["redirect"]) && $_GET["redirect"] == "signup") { ?>
            <form action="php/signup.php">
                <input type="submit" value="Agree and Continue to Account Registration" />
            </form>
    <?php } else if(isset($_GET["redirect"]) && $_GET["redirect"] == "about") { ?>
            <form action="php/about.php">
                <input type="submit" value="Return to About Page" />
            </form>
    <?php } else { ?>
        <form action="php/login.php">
                <input type="submit" value="Agree and Continue to Account Registration" />
            </form>
        <?php } } ?>

</body>
</html>