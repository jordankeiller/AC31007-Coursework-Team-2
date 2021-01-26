<!DOCTYPE HTML>
<html lang = "en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<title>formDemo.html</title>


</head>
<body>
<table>
<tr>
<td width="650" height="100"> 
<img src="" width="150" height="150">
</td>

<td width="700" height="100">
<h1> Questionnaire</h1>
</td>
<td width="300" height="100">
</td>

</table>
<hr>
<div class="bg-img">
  <form action="CustomerForm.php" method="post" class="container">
    <h1>SampleQuestionnaire</h1>
    <TABLE>
        

  
</div>  


<body>
<ol>
<td>
<tr>
<!--  
  Consent y/n
  
  
  <form name="Add New Customer" action="CustomerForm.php" method="post"> 
<li>
ID:<input type="int" name="ID">
</li>
-->
<legend>1.Consent to questionaire</legend>

<input type="radio" name="consent" checked>yes</input>
<input type="radio" name="consent">no</input>
<p>
</p>


2.Age: <input type="number" name="Age">

<p>
</p>

3.Male / Female: 
<input type="radio" name="male_female" checked>Male</input>
<input type="radio" name="male_female">Female</input>

<p>
</p>




    <form>
       
          <legend>4.Highest Level of Education?</legend>
          <p>
             <label>Select list</label>
             <select id = "myList">
             <option selected>Open this select menu</option>
               <option value = "High-School">High-School</option>
               <option value = "college">college</option>
               <option value = "university">university</option>
               <option value = "other">other</option>
             </select>
          </p>
          <legend>5.Level of computer literacy?</legend>
          <p>
             <label>Select list</label>
             <select id = "computer literacy">
             <option selected>Open this select menu</option>
               <option value = "excellent">excellent</option>
               <option value = "good">good</option>
               <option value = "fair">fair</option>
               <option value = "poor">poor</option>
             </select>
          </p>
          <legend>6.Do you have a hearing loss?</legend>
          
          <p>
             <label>.Select list</label>
             <select id = "HearingLoss">
             <option selected>Open this select menu</option>
               <option value = "yes">yes</option>
               <option value = "no">no</option>
               <option value = "maybe">maybe</option>
               </select>
          </p>
          <legend>7.How long have you had hearing loss?</legend>
          <input type="number" name="duration of hearing loss">

          <legend>8. How would you describe your hearing loss?</legend>
          <select id = "TypeHearingLoss">
             <option selected>Open this select menu</option>
               <option value = "mild">mild</option>
               <option value = "moderate">moderate</option>
               <option value = "severe">severe</option>
               <option value = "profound">profound</option>
               </select>
<legend> 9.Cause of hearing loss? </legend>
select all that apply
<select class="selectpicker" multiple data-live-search="true" name="CauseOfLoss[]" id="CauseOfLoss">
    <option value="From Birth (congenital)">From Birth (congenital)</option>
    <option value="Exposure to loud noise">Exposure to loud noise</option>
    <option value="Head Trauma">Head Trauma</option>
    <option value="virus / disease">virus / disease</option>
    <option value="aging">aging</option>
    <option value="other">other</option>
</select>

<legend>10. Do you use? </legend>
select all that apply
<select class="selectpicker" multiple data-live-search="true name="Hearing Aids[]" id="Hearing Aid">
    <option value="cochlea implant">cochlead implant</option>
    <option value="Hearing aid">Hearing aid</option>
    <option value="Personal Listening Device">Personal Listening Device</option>
</select>

          


          <p> 
          </p> 
          <legend> 11.What devices do you watch scripted entertainment (e.g., tv shows, movies, documentaries)on?</legend>
         
          select all that apply

<select class="selectpicker" multiple data-live-search="true name="tvshows[]" id="tvshows" >
    <option value="tv">tv</option>
    <option value="smart-tv">smart-tv</option>
    <option value="laptop">laptop</option>
    <option value="smartphone">smartphone</option>
    <option value="desktop">desktop</option>
    <option value="tablet">tablet</option>
    <option value="ipad">ipad</option>
    <option value="overheadprojector">overheadprojector</option>
    <option value="other">other</option>
</select>
</p>
<legend>12.How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries)? </legend>
          <select id = "Scripted Entertainment">
             <option selected>Open this select menu</option>
               <option value = "everyday">everyday</option>
               <option value = "everyotherday">everyotherday</option>
               <option value = "once a week">once a week</option>
               <option value = "twice a week">twice a week</option>
               <option value = "seldom">seldom</option>
               <option value = "never">never</option>
               </select>
               <p>
               </p>

   <legend> 13.How many hours per day do you watch scripted entertainment (e.g., tv shows, movies,documentaries)?</legend>
   <select id = "Hours of entertainment">
             <option selected>Open this select menu</option>
               <option value = "less than hour">less than hour</option>
               <option value = "one to two">one to two</option>
               <option value = "three to four">three to four</option>
               <option value = "five or more">five or more</option>
              
               </select>
               <p>
               </p>
<legend>14.What services do you use to watch scripted entertainment (e.g., tv shows, movies,documentaries)? </legend>
check all that apply
    <select class="selectpicker" multiple data-live-search="true name="tvservices[]" id="tvservices">
    <option value="Terrestrial TV">Terrestrial TV</option>
    <option value="SKY">SKY</option>
    <option value="Virgin">Virgin</option>
    <option value="Freeview">Freeview</option>
    <option value="SkyGo">SkyGo</option>
    <option value="NowTv">NowTv</option>
    <option value="AppleTv">AppleTv</option>
    <option value="Amazon Instant Video / Amazon Prime Video">Amazon Instant Video / Amazon Prime Video</option>
    <option value="Netflix">Netflix</option>
    <option value="other">Other</option>
</select>
<br>

<legend> 15.Alongside terrestrial TV and online streaming do you use any of the following to watchscripted entertainment (e.g., tv shows, movies, documentaries)</legend>
check all that apply
<select class="selectpicker" multiple data-live-search="true name="additonalservices[]" id="additonalservices">
    <option value="On the go Live TV">On the go Live TV TV</option>
    <option value="On Demand TV (BBC iPlayer, ITV Player, Roku, YoutubeTV etc)">On Demand TV (BBC iPlayer, ITV Player, Roku, YoutubeTV etc)</option>
    <option value="Recorded Programmes">Recorded Programmes</option>
    <option value="Other">Other:</option>
    <p>
    </p>
    </select>
    <p>
    </p>

    <legend>16. Do you regularly watch scripted entertainment (e.g., tv shows, movies, documentaries) withsubtitles turned on?</legend>
<input type="radio" name="subtitle_on" checked>Yes</input>
<input type="radio" name="subtitle_on">No</input>
<p>
</p>

<legend> 17.What are the reasons you watch scripted entertainment (e.g., tv shows, movies,documentaries) with subtitles turned on?</legend>
check all that apply
<select class="selectpicker" multiple data-live-search="true name="reasonscripted[]" id="reasonscripted">
    <option value="Help me Understood context">Help me Understood context</option>
    <option value="I have hearing loss (situational, temporary, permanents)">I have hearing loss (situational, temporary, permanents)</option>
    <option value="Use subtitles to translate speech to native language">Use subtitles to translate speech to native language</option>
    <option value="Use subtitles to reinforce language">Use subtitles to reinforce language</option>
    <option value="Trouble understanding regional accents">Trouble understanding regional accents</option>
    <option value="rouble understanding national accents">rouble understanding national accents</option>
    <option value="trouble understanding international accents">trouble understanding international accents</option>
    <option value="Busy using another device">Busy using another device</option>
    <option value="Noisy viewing conditions">Noisy viewing conditions</option>
    <option value="Quiet viewing conditions">Quiet viewing conditions</option>
    <option value="Media content has low sound quality (e.g., hard to extract voices from background noise)">Media content has low sound quality (e.g., hard to extract voices from background noise)</option>
    <option value="Other">Other</option>
</select>
<p>
</p>
<legend>18.How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries) withsubtitles turned ON?</legend>
<select id = "Frequency of Subtitles">
             <option selected>Open this select menu</option>
               <option value = "daily">daily</option>
               <option value = "2-3 times a week">2-3 times a week</option>
               <option value = "once a week">once a week</option>
               <option value = "1-2 times a month">1-2 times per month</option>
               <option value = "1-2 times a year">1-2 times a year</option>
               <option value = "never">never</option>
              
              </select>

              <p>
              </p>
              <legend>19.How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries) withsubtitles turned OFF?</legend>
<select id = "Non Frequency of Subtitles">
             <option selected>Open this select menu</option>
               <option value = "daily">daily</option>
               <option value = "2-3 times a week">2-3 times a week</option>
               <option value = "once a week">once a week</option>
               <option value = "1-2 times a month">1-2 times per month</option>
               <option value = "1-2 times a year">1-2 times a year</option>
               <option value = "never">never</option>
              
              </select>

              <p>
              </p>
              <br>
<br>
              <legend>20. Have you ever turned subtitles on for a specific show or type of content?</legend>
              <input type="radio" name="subtitle_on_specific" checked>Yes</input>
              <input type="radio" name="subtitle_on_specific">No</input>

<p>
</p>
<legend>21. If yes, what type of content do you turn them on for?</legend>
<div class="form-group">
    <label for="exampleFormControlTextarea1">please explain your answer here</label>
    <textarea class="form-control" id="TxtOnFor" rows="3"></textarea>
  </div>
<p>
</p>
<legend> 22. Have you ever needed to pause or stop watching a show because you couldn't hear what wasbeing said on screen? </legend>
<input type="radio" name="CouldntHearTv" checked>Yes</input>
              <input type="radio" name="CouldntHearTv">No</input>
              <input type="radio" name="CouldntHearTv">Maybe</input>
<p>
</p>
<legend> 23.If yes, please explain</legend>
<div class="form-group">
    <label for="exampleFormControlTextarea1">please explain your answer here</label>
    <textarea class="form-control" id="subtitleontext" rows="3"></textarea>
  </div>

<legend>24. Have you ever had a trouble understanding an accent on a programme?</legend>
<input type="radio" name="accent_on_program" checked>Yes</input>
<input type="radio" name="accent_on_program">No</input>
<p>
</p>
<legend> 25.If yes, please explain</legend>
<div class="form-group">
    <label for="trouble with accent on programme">please explain your answer here</label>
    <textarea class="form-control" id="accenttroubletext" rows="3"></textarea>
  </div>





  
    
      
    </form>
  
</html>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
 <!-- <select class="selectpicker" multiple data-live-search="true">
-->

<input type="submit" name="submit" value="submit" />
</form>
</table>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

