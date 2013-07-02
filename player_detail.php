<?php

$listSize = filter_input(INPUT_GET, 'length', FILTER_SANITIZE_STRING);
$rc = filter_input(INPUT_GET, 'rc', FILTER_SANITIZE_STRING);
$rco = filter_input(INPUT_GET, 'rco', FILTER_SANITIZE_STRING);

$url = "http://www.starcrafttrends.com/data/aligulac/sniper_player_list.json.php?length=$listSize&rc=$rc&rco=$rco";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data_json = curl_exec($curl);
$data = json_decode($data_json, true);
$odd = true;
?>
<h3><?php print $data['label']; ?></h3>
<table class="sortable">
  <thead>
    <tr>
      <td class="name">Player</td>
      <td class="number">Wins</td>
      <td class="number">Losses</td>
      <td class="number">Ratio</td>
    </tr>
  </thead>
  <tbody>
<?php foreach($data['players'] as $player) { ?>
  <?php $odd = !$odd; ?>
    <tr class="<?php print $odd ? "odd" : "even"; ?>">
      <td class="name"><img class="country" src="/resources/<?php print strtolower($player['country']); ?>.png"/> <?php print $player['tag']; ?></td>
      <td class="number"><?php print $player['wins']; ?></td>
      <td class="number"><?php print $player['loss']; ?></td>
      <td class="number"><?php print number_format($player['ratio'], 2); ?></td>
    </tr>
<?php } ?>
  </thead>
  </tbody>
</table>
