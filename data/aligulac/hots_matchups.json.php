<?php
include_once '_graph_functions.php';
mysql_connect("mysql.laowaigonewild.com", "sclp", "Phav6zaC") or die(mysql_error());
mysql_select_db("aligulac") or die(mysql_error());
$result = mysql_query("select * from (select date_format(date, 'Week %v<br/>(%b %Y)') as 'whenpretty', date_format(date, '%y%v') as 'when', sum(if(rca = 'T' and rcb = 'Z', sca, if(rcb = 'T' and rca = 'Z', scb, 0))) tzwins, sum(if(rca = 'T' and rcb = 'Z', scb, if(rcb = 'T' and rca = 'Z', sca, 0))) tzloss, sum(if(rca = 'T' and rcb = 'P', sca, if(rcb = 'T' and rca = 'P', scb, 0))) tpwins, sum(if(rca = 'T' and rcb = 'P', scb, if(rcb = 'T' and rca = 'P', sca, 0))) tploss, sum(if(rca = 'P' and rcb = 'Z', sca, if(rcb = 'P' and rca = 'Z', scb, 0))) pzwins, sum(if(rca = 'P' and rcb = 'Z', scb, if(rcb = 'P' and rca = 'Z', sca, 0))) pzloss from ratings_match where date > '2013-03-03' and game = 'HotS' group by date_format(date, '%y%v') order by 2 asc) temp") or die(mysql_error());
$data = array(
    "t" => array()
  , "p" => array()
  , "z" => array()
);
while($row = mysql_fetch_array( $result )) {
  $data['t'][$row['whenpretty']] = array();
  $data['t'][$row['whenpretty']]['win_cnt'] = $row['tzwins'];
  $data['t'][$row['whenpretty']]['tot_cnt'] = $row['tzwins'] + $row['tzloss'];
  $data['z'][$row['whenpretty']] = array();
  $data['z'][$row['whenpretty']]['win_cnt'] = $row['pzwins'];
  $data['z'][$row['whenpretty']]['tot_cnt'] = $row['pzwins'] + $row['pzloss'];
  $data['p'][$row['whenpretty']] = array();
  $data['p'][$row['whenpretty']]['win_cnt'] = $row['tpwins'];
  $data['p'][$row['whenpretty']]['tot_cnt'] = $row['tpwins'] + $row['tploss'];
}

print json_encode(array_reverse(smooth_data($data)));
?>
