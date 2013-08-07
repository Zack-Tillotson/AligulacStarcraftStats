<!DOCTYPE html>
<html>
  <head>
    <?php include '_header.php'; ?>
    <?php include '_google_analytics.php'; ?>
  </head>
  <body>
    <div id="header"><a class="title" href="/">Starcraft Trends</a><span class="links"><a href="http://us.blizzard.com/en-us/games/sc2/">Game</a>|<a href="http://aligulac.com/">Data</a>|<a href="http://zacherytillotson.com">Me</a></span></div>
    <div id="body">
      <div class="graph-container">
        <h2>Which Race Is The Strongest?</h2>
        <table>
          <tr>
            <td class="highlight">Terran has won the most.</td>
            <td>There have been <b>5 Terran, 4 Zerg, and 2 Protoss</b> champions of premier tournaments.</td>
          </tr>
          <tr>
            <td class="highlight">All races are winning.</td>
            <td>Counting top four finishes where there are <b>17 Zerg, 15 Terran, and 11 Protoss</b>.</td>
          </tr>
          <tr>
            <td class="highlight">Starcraft is balanced.</td>
            <td>Even at its worst Starcraft 2: Heart Of The Swarm has been incredibly balanced.</td>
          </tr>
        </table>
      </div>
      <div class="graph" id="graph1"><img class="loading" src="resources/loading.gif" /></div>
      <div class="graph-container page-links">
        <h2>More Trends</h2>
        <a href="/KrVsWorld.php">Koreans vs The World</a>
        <a href="/wcsamerica.php">WCS America Season 2</a>
      </div>
    </div>
    <div id="about">About: I love Starcraft and had a few minutes spare. <span class="cc">&copy <a href="http://www.zacherytillotson.com">Zack Tillotson</a> - <a href="mailto:StarcraftTrends@gmail.com">Suggestions? Questions?</a></span></div>
    <script type="text/javascript">
      makeGraphRaceOverTime('graph1', 'Race Win Rates', '3 Week Moving Average, Source: <a href="http://aligulac.com">Aligulac.com</a>', "http://www.starcrafttrends.com/data/aligulac/hots_race_wins.json.php", false);
    </script>
  </body>
</html
