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
            <td>There have been <b>5 Terran, 3 Zerg, and 2 Protoss</b> champions of premier tournaments.</td>
          </tr>
          <tr>
            <td class="highlight">All races are winning.</td>
            <td>Counting top four finishes where there are <b>15 Terran, 14 Zerg, and 11 Protoss</b>.</td>
          </tr>
          <tr>
            <td class="highlight">Terran is being figured out.</td>
            <td>The early Terran success is slowly eroding as Protoss and especially Zerg learn to cope.</td>
          </tr>
          <tr>
            <td class="highlight">Starcraft is balanced.</td>
            <td>Even at its worst Starcraft 2: Heart Of The Swarm has been incredibly balanced.</td>
          </tr>
        </table>
      </div>
      <div class="graph" id="graph1"><img class="loading" src="resources/loading.gif" /></div>
      <div class="graph-container">
        <h2>How are Foreigners vs Koreans?</h2>
        <table>
          <tr>
            <td class="highlight">In general, non Koreans aren't doing well against Koreans.</td>
            <td>Koreans have had a very high win rate against non Koreans since the beginning of WoL.</td>
          </tr>
          <tr>
            <td class="highlight">This win rate gap isn't closing.</td>
            <td>The overall win rate is even slightly lower in HotS (31%) than in WoL (34%).</td>
          </tr>
          <tr>
            <td class="highlight">Some foreigners are as good as Koreans.</td>
            <td>Jim the Chinese Protoss and several others have impressive win rates against Koreans.</td>
          </tr>
        </table>
      </div>
      <div class="graph" id="graph3"><img class="loading" src="resources/loading.gif" /></div>
      <h2 class="big-title">Win Rates Against Korean Opponents</h2>
      <div class="list-container">
        <div class="list" id="list1"><img class="loading" src="resources/loading.gif" /></div>
        <div class="list" id="list2"><img class="loading" src="resources/loading.gif" /></div>
      </div>
    </div>
    <div id="about">About: I love Starcraft and had a few minutes spare. <span class="cc">&copy <a href="http://www.zacherytillotson.com">Zack Tillotson</a> - <a href="mailto:StarcraftTrends@gmail.com">Suggestions? Questions?</a></span></div>
    <script type="text/javascript">
      makeGraphRaceOverTime('graph1', 'Race Win Rates', '3 Week Moving Average, Source: <a href="http://aligulac.com">Aligulac.com</a>', "http://www.starcrafttrends.com/data/aligulac/hots_race_wins.json.php", false);
      setTimeout(function(){$('#list1').load('frvskrPlayerList.php');}, 100);
      setTimeout(function(){$('#list2').load('krvskrPlayerList.php');}, 150);
      makeGraphRaceOverTime('graph3', 'Non Koreans vs Korean Opponents Win Rates', '3 Week Moving Average, Source: <a href="http://aligulac.com">Aligulac.com</a>', "http://www.starcrafttrends.com/data/aligulac/hots_kr_race_wins.json.php", true);
    </script>
  </body>
</html
