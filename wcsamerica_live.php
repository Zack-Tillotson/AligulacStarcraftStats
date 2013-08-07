<?php 

require '_wcsgs.php';

$ro16PredUrl = "http://www.starcrafttrends.com/data/aligulac/wcsamericaplayersro16.json.php";
$ro16ResultsUrl = "http://www.starcrafttrends.com/data/aligulac/wcs_results_am_2013_s2_ro16.json.php";

$ro32PredUrl = "http://www.starcrafttrends.com/data/aligulac/wcsamericaplayersro32.json.php";
$ro32ResultsUrl = "http://www.starcrafttrends.com/data/aligulac/wcs_results_am_2013_s2_ro32.json.php";

?>
<html>
  <head>
    <?php include '_header.php'; ?>
    <?php include '_google_analytics.php'; ?>
  </head>
  <body>
    <div id="header"><a class="title" href="/">Starcraft Trends</a><span class="links"><a href="http://us.blizzard.com/en-us/games/sc2/">Game</a>|<a href="http://aligulac.com/">Data</a>|<a href="http://zacherytillotson.com">Me</a></span></div>
    <div id="body">
      <div class="graph-container">
        <h2>Who Will Win WCS 2013 America Season 2?</h2>
        <table>
          <tr>
            <td class="highlight">The favorite to win is Polt.</td>
            <td>Polt, Taeja, and Jaedong have the greatest chance to win. There is a large dependancy on the random seeding for the 8 person single elimination tournament.</td>
          </tr>
          <tr>
            <td class="highlight">Predictions by <a href="http://aligulac.com/">Aligulac</a>.</td>
            <td>Every player has a per matchup rating and relative ratings are combined to predict each matchup.</td>
          </tr>
        </table>
      </div>
<?php drawGs("Round of 16", $ro16PredUrl, $ro16ResultsUrl); ?>
<?php drawGs("Round of 32", $ro32PredUrl, $ro32ResultsUrl); ?>
    </div>
    <div id="about">About: I love Starcraft and had a few minutes spare. <span class="cc">&copy <a href="http://www.zacherytillotson.com">Zack Tillotson</a> - <a href="mailto:StarcraftTrends@gmail.com">Comments! Recommendations?</a></span></div>
    <script type="text/javascript">
    </script>
  </body>
</html
