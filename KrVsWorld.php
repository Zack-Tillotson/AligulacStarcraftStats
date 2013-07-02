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
<html>
  <head>
    <?php include '_header.php'; ?>
    <?php include '_google_analytics.php'; ?>
  </head>
  <body>
    <div id="header"><a class="title" href="/">Starcraft Trends</a><span class="links"><a href="http://us.blizzard.com/en-us/games/sc2/">Game</a>|<a href="http://aligulac.com/">Data</a>|<a href="http://zacherytillotson.com">Me</a></span></div>
    <div id="body">
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
      <?php foreach(array_slice($data['players'], 0, $listSize) as $player) { ?>
          <tr class="<?php print $odd ? "odd" : "even"; $odd = !$odd; ?>" >
            <td><img src="/resources/<?php print strtolower($player['country']); ?>.png" /> <span class="Race<?php print $player['rc']; ?>"><?php print $player['rc']; ?></span> <?php print $player['tag']; ?></td>
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
      <div class="big-container">
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
      <?php foreach(array_slice($data['players'], 0, $listSize) as $player) { ?>
          <tr class="<?php print $odd ? "odd" : "even"; $odd = !$odd; ?>" >
            <td><img src="/resources/<?php print strtolower($player['country']); ?>.png" /> <span class="Race<?php print $player['rc']; ?>"><?php print $player['rc']; ?></span> <?php print $player['tag']; ?></td>
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
  </body>
</html>