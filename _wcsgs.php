<?php 
function drawGs($title, $predictionUrl, $resultsUrl) {
$url = $predictionUrl;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data_json = curl_exec($curl);
$data = json_decode($data_json, true);

$url = $resultsUrl;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data_json = curl_exec($curl);
$rdata = json_decode($data_json, true);

# Combine the two data sets
foreach($data as $group => &$gattrs) {
  if(array_key_exists($group, $rdata)) {
    $gattrs['date'] = $rdata[$group]['date'];
    foreach($gattrs['players'] as $pid => &$player) {
      if(array_key_exists($pid, $rdata[$group]['players'])) {
        $player['results'] = $rdata[$group]['players'][$pid]['results'];
        $player['result'] = $rdata[$group]['players'][$pid]['result'];
        $player['time'] = $rdata[$group]['players'][$pid]['time'];
      }
    }
    unset($player);
  } 
}
unset($gattrs);
foreach($rdata as $group => $gattrs) {
  if(!array_key_exists($group, $data)) {
    print "Setting data[$group]!\n";
    $data[$group] = $gattrs;
    print_r(array_keys($data));
  }
}
unset($gattrs);

?>
      <div class="results-container">
        <h2><?php print $title;?></h2>
<?php foreach($data as $gid => $group) { ?>
        <div class="results-set">
          <h3><?php print $gid; ?><span class="date"><?php print $group['date'];?></span></h3>
          <table>
            <thead>
              <tr>
                <td></td>
                <td colspan="2">Predicted</td>
                <td colspan="4">Actual</td>
              </tr>
              <tr>
                <td>Player</td>
                <td>Win Group</td>
                <td>Advance</td>
                <td>First Set</td>
                <td>Winners</td>
                <td>Losers</td>
                <td>Decider</td>
              </tr>
            </thead>
            <tbody>
<?php foreach($group['players'] as $player) { ?>
              <tr class="<?php if($player['probs']['fav']) {print "predict-advance";} else if($player['probs']['dq']) {print "predict-dq";}?>">
                <td class="name">
                  <span class="Race<?php print $player['rc']; ?>"><?php print $player['rc']; ?></span> 
                  <img class="country" src="/resources/<?php print $player['flag']; ?>.png"> <?php print $player['tag']; ?>
                </td>
                  <td class="prediction"><?php if($player['probs']['win']) { print $player['probs']['win']; ?>%<?php } ?></td>
                  <td class="prediction"><?php if($player['probs']['adv']) { print $player['probs']['adv']; ?>%<?php } ?></td>
<?php if($player['results']) { $i = 0; foreach($player['results'] as $score) { $i++; ?>
                <td class="<?php if($player['time'] < $i) { print "result-" . $player['result']; }?>"><?php print $score; ?></td>
<?php }} ?>
              </tr>
<?php } ?>
            </tbody>
          </table>
        </div>
<?php } ?>
      </div>
<?php } ?>
