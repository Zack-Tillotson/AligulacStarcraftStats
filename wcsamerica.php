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
            <td class="highlight">Hero will win!.</td>
            <td>He has a 30% chance of winning.</td>
          </tr>
          <tr>
            <td class="highlight">Protoss has the greatest chance of winning!</td>
            <td>40%!</td>
          </tr>
          <tr>
            <td class="highlight">Koreans will win!</td>
            <td>99%</td>
          </tr>
          <tr>
            <td class="highlight">These are totally made up numbers so far</td>
            <td>.</td>
          </tr>
        </table>
      </div>
      <div class="graph" id="graph5"><img class="loading" src="resources/loading.gif" /></div>
    </div>
    <div id="about">About: I love Starcraft and had a few minutes spare. <span class="cc">&copy <a href="http://www.zacherytillotson.com">Zack Tillotson</a> - <a href="mailto:StarcraftTrends@gmail.com">Comments! Recommendations?</a></span></div>
    <script type="text/javascript">
      makeGraphRaceOverTime('graph5', 'Non Mirror HotS Games 2013', '3 Week Moving Average, Source: <a href="http://aligulac.com">Aligulac.com</a>', "http://www.starcrafttrends.com/data/aligulac/hots_race_wins.json.php");
    </script>
  </body>
</html
