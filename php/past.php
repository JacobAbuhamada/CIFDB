<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Jacob Abuhamada">
      <meta name="keywords" content="CIF, CIFDB, Common, Integrative, Framework">
      <meta name="color-scheme" content="light only">
      <title>CIFDB | Add Past Experience</title>  
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

  <h1>Past or Hypothetical Experience</h1>
  <h3>These questions will characterize past or hypothetical (i.e. typical) experiences.</h3>
  <br><hr>
  <form action="past-handler.php" method="POST">
      <section class="description">
        <label for="description"><strong>Description/Keywords describing the experience: </strong><br>
          <br>
          These should be kept simple: Focus on
          the few most prominent/salient aspects of the experience, as you would define or think about it. 
          <br>Please use relationships instead of the actual names of people so it can be searchable to researchers.
          <br>Please use only letters, numbers, and spaces; no commas, periods, colons, semicolons, or other special characters.
          <br><br>
        <input type="text" name="description" id="description" pattern="[a-zA-Z0-9 .,]+" title="alphanumeric only" placeholder="Enter keywords/description here" size="80" maxlength="255" required>
        <br><br>
        Example 1: average relaxation<br>
        Example 2: winning 8th grade science fair<br>
        Example 3: most intense psychedelic trip<br>
        <br><br>
          Still having trouble thinking of a past experience to include? <a href="prompts.html" target="_blank">Click here for some prompts to open in a new tab/window.</a>
      </section>
      <hr>

      <!-- <h4>Experiential Vector</h4> -->
      <section class="vectors">
        <label for="X"><strong>Executive Functioning</strong></label>
        <br><br>
        This dimension of experience is measuring your felt sense of effectiveness, executive-cognitive function, or self-efficacy.
        <br>Some alternative framings include: in-control of yourself and your faculties vs. out of control. 
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
        <strong>Weak/Minimal/none:</strong> minimal or no selfhood or certainty/stability of self present in the experience<br>
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