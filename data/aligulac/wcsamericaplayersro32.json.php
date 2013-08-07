<?php
$data_json = <<<EOD
{
  "Group A":{"players":{
    "35":{"probs":{"win":41,"adv":71,"fav":true}},
    "276":{"probs":{"win":26,"adv":55,"fav":true}},
    "22":{"probs":{"win":23,"adv":52}},
    "184":{"probs":{"win":9,"adv":22}}
    }},
  "Group B":{"players":{
    "19":{"probs":{"win":45,"adv":79,"fav":true}},
    "6":{"probs":{"win":35,"adv":71,"fav":true}},
    "119":{"probs":{"win":15,"adv":34,"fav":false}},
    "249":{"probs":{"win":6,"adv":16,"fav":false}}
    }},
  "Group C":{"players":{
    "86":{"probs":{"win":64,"adv":90,"fav":true}},
    "213":{"probs":{"win":17,"adv":50,"fav":true}},
    "243":{"probs":{"win":12,"adv":39}},
    "4495":{"probs":{"win":8,"adv":21}}
    }},
  "Group D":{"players":{
    "73":{"probs":{"adv":71,"win":40,"fav":true}},
    "145":{"probs":{"adv":56,"win":27,"fav":false}},
    "111":{"probs":{"adv":57,"win":26,"fav":true}},
    "317":{"probs":{"adv":16,"win":6,"fav":false}}
    }},
  "Group E":{"players":{
    "8":{"probs":{"adv":90,"win":57,"fav":true}},
    "90":{"probs":{"adv":70,"win":33,"fav":true}},
    "127":{"probs":{"adv":28,"win":8,"fav":false}},
    "310":{"probs":{"adv":11,"win":3,"fav":false}}
    }},
  "Group F":{"players":{
    "66":{"probs":{"adv":78,"win":42,"fav":true}},
    "106":{"probs":{"adv":77,"win":42,"fav":true}},
    "107":{"probs":{"adv":33,"win":12,"fav":false}},
    "366":{"probs":{"adv":13,"win":4,"fav":false}}
    }},
  "Group G":{"players":{
    "23":{"probs":{"adv":76,"win":42,"fav":true}},
    "11":{"probs":{"adv":77,"win":41,"fav":true}},
    "82":{"probs":{"adv":36,"win":13,"fav":false}},
    "221":{"probs":{"adv":11,"win":4,"fav":false}}
    }},
  "Group H":{"players":{
    "38":{"probs":{"adv":65,"win":36,"fav":true}},
    "121":{"probs":{"adv":49,"win":23,"fav":true}},
    "129":{"probs":{"adv":44,"win":21,"fav":false}},
    "142":{"probs":{"adv":43,"win":20,"fav":false}}
    }}
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
