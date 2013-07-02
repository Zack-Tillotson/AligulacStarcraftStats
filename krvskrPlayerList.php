<?php
$listSize = filter_input(INPUT_GET, 'length', FILTER_SANITIZE_STRING);
if(!is_int($listSize)) { $listSize = 10;}

$url = "http://www.starcrafttrends.com/data/aligulac/kr_kr_player_list.json.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data_json = curl_exec($curl);
$data = json_decode($data_json, true);
$odd = true;
?>
<table>
  <thead>
    <tr>
      <td class="name">Korean</td>
      <td class="multi-col-header" colspan="3">Vs Koreans</td>
    </tr>
    <tr>
      <td class="name">Player</td>
      <td class="number">Wins</td>
      <td class="number">Losses</td>
      <td class="number">Ratio</td>
    </tr>
  </thead>
  <tbody>
<?php foreach(array_slice($data['players'], 0, $listSize) as $player) { ?>
    <tr class="<?php print $odd ? "odd" : "even"; $odd = !$odd; ?>" >
      <td class="name"><span class="Race<?php print $player['rc']; ?>"><?php print $player['rc']; ?></span> <img class="country" src="/resources/<?php print strtolower($player['country']); ?>.png" /> <a href="http://aligulac.com/players/<?php print $player['ag_id'];?>/results/?after=2013-03-01&nats=kr&game=HotS"><?php print $player['tag']; ?></a></td>
      <td class="number"><?php print $player['wins']; ?></td>
      <td class="number"><?php print $player['loss']; ?></td>
      <td class="number"><?php if($player['loss'] > 0) { print number_format($player['wins'] / $player['loss'], 2); } ?></td>
    </tr>
<?php } ?>
    <tr>
      <td class="note" colspan="4"><a href="/KrVsWorld.php">More</a></td>
  </tbody>
</table>
