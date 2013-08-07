<?php
$data_json = <<<EOD
{
  "Group A":{"players":{
    "73":{"probs":{"win":35,"adv":63,"fav":true}},
    "35":{"probs":{"win":21,"adv":45,"fav":true}},
    "82":{"probs":{"win":13,"adv":30}},
    "8":{"probs":{"win":31,"adv":62,"dq":true}}
    },"date":"Aug 5, 2013"},
  "Group B":{"players":{
    "121":{"probs":{"win":12,"adv":31}},
    "6":{"probs":{"win":51,"adv":82,"fav":true}},
    "243":{"probs":{"win":9,"adv":24}},
    "106":{"probs":{"win":29,"adv":63,"fav":true}}
    },"date":"Aug 6, 2013"},
  "Group C":{"players":{
    "66":{"probs":{"win":27,"adv":55,"fav":true}},
    "145":{"probs":{"win":15,"adv":34}},
    "90":{"probs":{"win":20,"adv":44}},
    "23":{"probs":{"win":38,"adv":67,"fav":true}}
    },"date":"Aug 7, 2013"},
  "Group D":{"players":{
    "276":{"probs":{"win":18,"adv":55,"fav":true}},
    "86":{"probs":{"win":16,"adv":41}},
    "19":{"probs":{"win":62,"adv":89,"fav":true}},
    "142":{"probs":{"win":5,"adv":16}}
    },"date":"Aug 8, 2013"}
}
EOD;

$data = json_decode($data_json, true);
$player_ids = array();
foreach($data as $group) { 
  $player_ids = array_merge($player_ids, array_keys($group['players']));
}

$query = "select id, tag, lower(country) as flag, race as rc from ratings_player where id in (". implode($player_ids, ",") . ")";
mysql_connect("mysql.laowaigonewild.com", "sclp", "Phav6zaC") or die(mysql_error());
mysql_select_db("aligulac") or die(mysql_error());
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array( $result )) {
  foreach($data as $groupname => &$group) {
    foreach($group['players'] as $id => &$attrs) {
      if($id == $row['id']) {
        $attrs['tag'] = $row['tag'];
        $attrs['flag'] = $row['flag'];
        $attrs['rc'] = $row['rc'];
      }
    }
  }
}

print(json_encode($data));
?>
