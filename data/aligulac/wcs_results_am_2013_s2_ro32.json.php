<?php
include_once '_graph_functions.php';
mysql_connect("mysql.laowaigonewild.com", "sclp", "Phav6zaC") or die(mysql_error());
mysql_select_db("aligulac") or die(mysql_error());
$result = mysql_query("select e.name, date_format(m.date, '%b %d, %Y') date, p1.id ida, p1.tag taga, p1.race rca, lower(p1.country) flaga, m.sca, p2.id idb, p2.tag tagb, m.scb, p2.race rcb, lower(p2.country) flagb from ratings_event e, ratings_match m, ratings_player p1, ratings_player p2 where eventobj_id = e.id and p1.id = m.pla_id and p2.id = m.plb_id and e.fullname like 'WCS 2013 Season 2 America Premier Ro32 %' order by e.name asc, m.id asc") or die(mysql_error());
$data = array();
while($row = mysql_fetch_array( $result )) {

  $group = $row['name'];
  $date = $row['date'];
  $ida = $row['ida'];
  $taga = $row['taga'];
  $rca = $row['rca'];
  $flaga = $row['flaga'];
  $sca = $row['sca'];
  $idb = $row['idb'];
  $tagb = $row['tagb'];
  $rcb = $row['rcb'];
  $flagb = $row['flagb'];
  $scb = $row['scb'];

  if(!array_key_exists($group, $data)) {
    $data[$group] = array(
      'name' => $group,
      'date' => $date,
      'players' => array()
    );
    $set_no = 0;
  }

  $set_i = $set_no < 2 ? 0 : $set_no - 1; # Set 1 and 2 are both first round

  if(!array_key_exists($ida, $data[$group]['players'])) {
    $data[$group]['players'][$ida] = array();
    $data[$group]['players'][$ida]['results'] = array('0' => '', '1' => '', '2' => '', '3' => '');
    $data[$group]['players'][$ida]['id'] = $ida;
    $data[$group]['players'][$ida]['tag'] = $taga;
    $data[$group]['players'][$ida]['rc'] = $rca;
    $data[$group]['players'][$ida]['flag'] = $flaga;
  }
  $data[$group]['players'][$ida]['results']["$set_i"] = $sca . "-" . $scb;
  if($set_i == 1 && $sca > $scb) { # Won in winners
    $data[$group]['players'][$ida]['result'] = "pos";
    $data[$group]['players'][$ida]['time'] = "1";
  } else if($set_i == 2 && $scb > $sca) { # Lost in losers
    $data[$group]['players'][$ida]['result'] = "neg";
    $data[$group]['players'][$ida]['time'] = "2";
  } else if($set_i == 3 && $sca > $scb) { # Won decider
    $data[$group]['players'][$ida]['result'] = "pos";
    $data[$group]['players'][$ida]['time'] = "3";
  } else if($set_i == 3 && $scb > $sca) { # Lost decider
    $data[$group]['players'][$ida]['result'] = "neg";
    $data[$group]['players'][$ida]['time'] = "3";
  }

  if(!array_key_exists($idb, $data[$group]['players'])) {
    $data[$group]['players'][$idb] = array();
    $data[$group]['players'][$idb]['results'] = array('0' => '', '1' => '', '2' => '', '3' => '');
    $data[$group]['players'][$idb]['id'] = $idb;
    $data[$group]['players'][$idb]['tag'] = $tagb;
    $data[$group]['players'][$idb]['rc'] = $rcb;
    $data[$group]['players'][$idb]['flag'] = $flagb;
  }
  $data[$group]['players'][$idb]['results'][$set_i] = $scb . "-" . $sca;
  if($set_i == 1 && $scb > $sca) { # Won in winners
    $data[$group]['players'][$idb]['result'] = "pos";
    $data[$group]['players'][$idb]['time'] = "1";
  } else if($set_i == 2 && $sca > $scb) { # Lost in losers
    $data[$group]['players'][$idb]['result'] = "neg";
    $data[$group]['players'][$idb]['time'] = "2";
  } else if($set_i == 3 && $scb > $sca) { # Won decider
    $data[$group]['players'][$idb]['result'] = "pos";
    $data[$group]['players'][$idb]['time'] = "3";
  } else if($set_i == 3 && $sca > $scb) { # Lost decider
    $data[$group]['players'][$idb]['result'] = "neg";
    $data[$group]['players'][$idb]['time'] = "3";
  }

  $set_no++;
}

print json_encode($data);
?>
