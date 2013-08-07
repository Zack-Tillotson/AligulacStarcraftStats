<?php
$listSize = filter_input(INPUT_GET, 'length', FILTER_SANITIZE_STRING);
if(!is_int($listSize)) { $listSize = 300;}

$url = "http://www.starcrafttrends.com/data/aligulac/fr_kr_player_list.json.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data_json = curl_exec($curl);
$data = json_decode($data_json, true);
$odd = true;
?>
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
        <h2>How are Foreigners vs Koreans?</h2>
        <table>
          <tr>
            <td class="highlight">The world isn't doing well against Koreans.</td>
            <td>Koreans have had a very high win rate against non Koreans since the beginning of WoL.</td>
          </tr>
          <tr>
            <td class="highlight">This win rate gap isn't closing.</td>
            <td>The overall win rate is even slightly lower in HotS (31%) than in WoL (34%).</td>
          </tr>
          <tr>
            <td class="highlight">Some foreigners rise above the averages.</td>
            <td>Jim the Chinese Protoss and several others have impressive win rates against Koreans.</td>
          </tr>
        </table>
      </div>
      <div class="graph" id="graph3"><img class="loading" src="resources/loading.gif" /></div>
      <div class="big-container">
      <h2 class="big-title">Foreigner Wins Rates vs Korean Opponents</h1>
      <table class="big-table">
        <thead>
          <tr>
            <td class="name">Player</td>
            <td class="number">Wins</td>
            <td class="number">Losses</td>
            <td class="number">Ratio</td>
            <td class="links">Links</td>
          </tr>
        </thead>
        <tbody>
      <?php $no_break = true; ?>
      <?php foreach(array_slice($data['players'], 0, $listSize) as $player) { ?>
        <?php if($no_break and (intval($player['wins']) + intval($player['loss']) < 15)) { ?>
          <tr><td class="break-row" colspan="5">Players below have played fewer than fifteen games against Koreans</td></tr>
        <?php 
          $no_break = false;
          } 
        ?>
          <tr class="<?php print $odd ? "odd" : "even"; $odd = !$odd; ?>" >
            <td><span class="Race<?php print $player['rc']; ?>"><?php print $player['rc']; ?></span> <img class="country" src="/resources/<?php print strtolower($player['country']); ?>.png" /> <?php print $player['tag']; ?></td>
            <td class="number"><?php print $player['wins']; ?></td>
            <td class="number"><?php print $player['loss']; ?></td>
            <td class="number"><?php if($player['loss'] > 0) { print number_format($player['wins'] / $player['loss'], 2); } ?></td>
            <td class="links"><a href="http://aligulac.com/players/<?php print $player['ag_id'];?>/results/?after=2013-03-01&race=ptzr&nats=kr&bo=all&offline=both&game=HotS">&Sigma;</a></td>
          </tr>
      <?php } ?>
        </tbody>
      </table>
      <div class="note">
        Note: The players are sorted by win rate with players having at least ten games played against Koreans first.
      </div>
      </div>
<?php
$listSize = filter_input(INPUT_GET, 'length', FILTER_SANITIZE_STRING);
if(!is_int($listSize)) { $listSize = 300;}

$url = "http://www.starcrafttrends.com/data/aligulac/kr_kr_player_list.json.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data_json = curl_exec($curl);
$data = json_decode($data_json, true);
$odd = true;
?>
      <div class="big-container right">
      <h2 class="big-title">Korean Wins Rates vs Korean Opponents</h1>
      <table class="big-table">
        <thead>
          <tr>
            <td class="name">Player</td>
            <td class="number">Wins</td>
            <td class="number">Losses</td>
            <td class="number">Ratio</td>
            <td class="links">Links</td>
          </tr>
        </thead>
        <tbody>
      <?php $no_break = true; ?>
      <?php foreach(array_slice($data['players'], 0, $listSize) as $player) { ?>
        <?php if($no_break and (intval($player['wins']) + intval($player['loss']) < 10)) { ?>
          <tr><td class="break-row" colspan="5">Players below have played fewer than ten games against Koreans</td></tr>
        <?php 
          $no_break = false;
        } 
        ?>
          <tr class="<?php print $odd ? "odd" : "even"; $odd = !$odd; ?>" >
            <td><span class="Race<?php print $player['rc']; ?>"><?php print $player['rc']; ?></span> <img class="country" src="/resources/<?php print strtolower($player['country']); ?>.png" /> <?php print $player['tag']; ?></td>
            <td class="number"><?php print $player['wins']; ?></td>
            <td class="number"><?php print $player['loss']; ?></td>
            <td class="number"><?php if($player['loss'] > 0) { print number_format($player['wins'] / $player['loss'], 2); } ?></td>
            <td class="links"><a href="http://aligulac.com/players/<?php print $player['ag_id'];?>/results/?after=2013-03-01&race=ptzr&nats=kr&bo=all&offline=both&game=HotS">&Sigma;</a></td>
          </tr>
      <?php } ?>
        </tbody>
      </table>
      <div class="note">
        Note: The players are sorted by win rate with players having at least ten games played against Koreans first.
      </div>
      </div>
    </div>
    <div id="about">About: I love Starcraft and had a few minutes spare. <span class="cc">&copy <a href="http://www.zacherytillotson.com">Zack Tillotson</a> - <a href="mailto:StarcraftTrends@gmail.com">Suggestion? Comment?</a></span></div>
    <script type="text/javascript">
      makeGraphRaceOverTime('graph3', 'Non Koreans vs Korean Opponents Win Rates', '3 Week Moving Average, Source: <a href="http://aligulac.com">Aligulac.com</a>', "http://www.starcrafttrends.com/data/aligulac/hots_kr_race_wins.json.php", true);
    </script>
  </body>
</html>
