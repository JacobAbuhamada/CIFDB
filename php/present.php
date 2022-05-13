
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Jacob Abuhamada">
      <meta name="keywords" content="CIF, CIFDB, Common, Integrative, Framework">
      <meta name="color-scheme" content="light only">
      <title>CIFDB | Add Present Experience</title>  
      <link rel="stylesheet" href="../css/style.css">
    </head> 
<body>  

<?php 

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

?>

  <div class="container">    
    <div class="nav-wrapper">  
      <div class="right-side">
        <div class="brand">
            <div class='brand' ><h1>CIF Database</h1></div>
        </div>    
      </div>
    </div>    
  </div>

  <h1>Present or Current Experience</h1>     
  
  <h3>These questions will allow for the unique characterization of your current experience right now or very recently.</h3>
  <br><hr>
  <form action="scripts/present-handler.php" method="POST">
    <section class="description">
      <label for="description"><strong>Description/Keywords describing the experience: </strong><br>
      <br></label>  
      These should be kept simple: Focus on
      the few most prominent/salient aspects of the experience, as you would define or think about it. 
      <br>Please use relationships instead of the actual names of people so it can be searchable to researchers.
      <br>Please use only letters, numbers, and spaces; no commas, periods, colons, semicolons, or other special characters.
      <br><br>
      <input type="text" name="description" id="description" pattern="[a-zA-Z0-9 .,]+" title="alphanumeric only" placeholder="Enter keywords/description here" size="70" maxlength="255" required>
      <br><br>
      Example 1: lunch break anxious tired thirsty<br>
      Example 2: party three drinks fun<br>
      Example 3: meditation with sister<br>
    </section>
    <hr>

    <!-- <h4>Experiential Vector</h4> -->
    <section class="vectors">
      <label for="X"><strong>Executive Functioning</strong></label>
      <br><br>
      This aspect of subjective experience is measuring your felt sense of effectiveness, executive-cognitive function, or self-efficacy.
      <br>Some alternative framings include: in-control of yourself and your faculties vs. out of control. 
      <br>This will be correlated with the results of the Stroop test (See below), so it is recommended that as frequently as possible the Stroop test be
      taken immediately afterwards as a point of objective comparison.
      <br><br>
      <span>Completely Ineffective/Non-Functional (Far Left)</span>
      <input type="range" name="X" id="X" value="0" min="-5" max="5" step="0.1" list="xtickmarks">
      <span>Extremely Effective/Super-Functional (Far Right)</span>
      <datalist id="xtickmarks">
        <option value="-5" label="-5"></option>
        <option value="-4"></option>
        <option value="-3"></option>
        <option value="-2"></option>
        <option value="-1"></option>
        <option value="0" label="0"></option>
        <option value="1"></option>
        <option value="2"></option>
        <option value="3"></option>
        <option value="4"></option>
        <option value="5" label="5"></option>
      </datalist>

      <br><hr>
      <label for="Y"><strong>Intensity of Experience/Activation/Arousal</strong></label>
      <br><br>
      This parameter refers to the experience of physiological arousal, also referred to as "activation" or "intensity of experience".
      Intensity of experience ranges from extreme subtlety (deep meditation, sleep, etc.) to extreme intensity (panic attack, intense 
      flow state, use of high-dose stimulants). Also referred to as <a href="https://dictionary.apa.org/affect-intensity">affect intensity.</a>
      <br><br>
      <span>Undetectable Intensity/Activation (Far Left)</span>
      <input type="range" name="Y" id="Y" value="5" min="0" max="10" step="0.1" list="ytickmarks">
      <span>Extremely Intense/Activated (Far Right)</span>
      <datalist id="ytickmarks">
        <option value="0" label="0"></option>
        <option value="1"></option>
        <option value="2"></option>
        <option value="3"></option>
        <option value="4"></option>
        <option value="5" label="5"></option>
        <option value="6"></option>
        <option value="7"></option>
        <option value="8"></option>
        <option value="9"></option>
        <option value="10" label="10"></option>
      </datalist>

      <br><hr>
      <label for="Z"><strong>Affective Valence</strong></label>
      <br><br>
      Affective valence refers to how good/positive you feel versus bad/negative. Bad/negative is not necessarily the same thing as pain,
      as it is possible to have a good experience even while experiencing pain (and vice versa). The middle of the slider represents 
        neutral valence--neither distinctly positive nor negative.
      <br>
      To read more see: <a href="https://en.wikipedia.org/wiki/Valence_(psychology)" target="_blank" rel="noopener noreferrer">Valence (psychology)</a>
      <br><br>
      <span>Extremely Unpleasant/Negative/Suffering (Far Left)</span>
      <input type="range" name="Z" id="Z" value="0" min="-5" max="5" step="0.1" list="xtickmarks">
      <span>Extremely Positive/Pleasurable (Far Right)</span>

      <br><hr>
      <label for="SoS"><strong>Sense of Self</strong></label>
      <br><br>
      Sense of Self (SoS) is defined by the <a href="https://dictionary.apa.org/sense-of-self" target="_blank" rel="noopener noreferrer">American Psychological Association</a> as "an individual’s feeling of identity, uniqueness, and self-direction."
      <br>
      SoS is weakened in certain situations/contexts including mental illness, trauma, the effects of psychoactive drugs, tiredness, and more.
      <br>
      Still confused? <a href="https://www.researchgate.net/publication/232890741_Having_a_weak_versus_strong_sense_of_self_The_Sense_of_Self_Scale_SOSS" target="_blank" rel="noopener noreferrer">Click here for a comprehensive paper on Sense of Self Scale.</a> 
      <br><br>
      <strong>Strong/Full:</strong> feeling "like yourself"; who you are feels very stable and clearly defined<br>
      <strong>Moderate/Partial:</strong> who I am feels fuzzy or less stable/well-defined/clear/absolute<br>
      <strong>Weak/Minimal/none:</strong> minimal or no selfhood or stability/certainty of self present in the experience<br>
      <br>
      <span>Weak/Minimal/None (Far Left)</span>
      <input type="range" name="SoS" id="SoS" value="3" min="1" max="5" step="1" list="SoStickmarks">
      <span>Strong/Full (Far Right)</span>
      <datalist id="SoStickmarks">
        <option value="1"></option>
        <option value="2"></option>
        <option value="3"></option>
        <option value="4"></option>
        <option value="5"></option>
      </datalist>

    </section>
    <hr>
    <!-- This section will include a button to the App and information about the Stroop test and its importance-->
    <section class="stroop">
      <strong>Stroop (Optional)</strong>
      <br><br>
      If you have the <em>EncephalApp Stroop Test</em> already installed on your device, please go to the app
      and select "New Test" (If not already installed, please download the App now: 
      (<a href="https://www.encephalapp.com/" target="_blank" rel="noopener noreferrer">Apple iOS</a> | <a  href="https://play.google.com/store/apps/details?id=com.mobelux.stroop_android&hl=en_US&gl=US&showAllReviews=true" target="_blank" rel="noopener noreferrer"> Android</a>) 
      <br><br>
      For the Subject ID please put your email that you use to login. Study Name should be either "CIF Study" or "CIF". 
      When you have completed the test, please email the results to cif.database@gmail.com by clicking on "Test Results"
      within the App --> Edit (top right corner) --> select any results that have not yet been submitted --> Submit (bottom left-side)
    --> send email using your preferred email app.

    </section>
    <br><hr>

    <br>
    <section class="submission">
        <input type="hidden" name="date" id="date" value="">
        <input type="hidden" name="time" id="time" value="">
        <button type="submit" name="submit">Submit</button>
    </section>
    <br><br>
  </form>
</body>

<script>
  var cDate = new Date(); // current date
  var date = cDate.getFullYear()+'-'+
              (cDate.getMonth()+1 < 10 ? '0'+(cDate.getMonth()+1) : cDate.getMonth()+1)+'-'+
              (cDate.getDate() < 10 ? '0'+cDate.getDate() : cDate.getDate());
  var time = (cDate.getHours() < 10 ? '0'+cDate.getHours() : cDate.getHours())+':'+
              (cDate.getMinutes() < 10 ? '0'+cDate.getMinutes() : cDate.getMinutes())+':'+
              (cDate.getSeconds() < 10 ? '0'+cDate.getSeconds() : cDate.getSeconds());

  document.getElementById("date").value = date;
  document.getElementById("time").value = time;
  // console.log(date, time)
</script>

</html>