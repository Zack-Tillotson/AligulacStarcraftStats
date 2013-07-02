<?php
include_once '_graph_functions.php';
mysql_connect("mysql.laowaigonewild.com", "sclp", "Phav6zaC") or die(mysql_error());
mysql_select_db("aligulac") or die(mysql_error());
$result = mysql_query("select * from (select date_format(date, 'Week %v<br/>(%b %Y)') as 'whenpretty', date_format(date, '%y%v') as 'when', sum(if(rca = 'Z', sca, if(rcb = 'Z', scb, 0))) zwins, sum(if(rca =   'Z',   scb, if(rcb = 'Z', sca, 0))) zloss, sum(if(rca = 'T', sca, if(rcb = 'T', scb, 0))) twins, sum(if(rca = 'T', scb, if(rcb = 'T', sca, 0))) tloss, sum(if(rca = 'P', sca, if(rcb =   'P',     scb, 0))) pwins, sum(if(rca = 'P', scb, if(rcb = 'P', sca, 0))) ploss from ratings_match where date > '2013-03-01' and game = 'HotS' and rca != 'R' and rcb != 'R' and rca !=   rcb group by date_format(date, '%y%v') order by 2 asc) z where zwins + zloss + twins + tloss + pwins + ploss > 100") or die(mysql_error());
$data = array(
    "t" => array()
  , "p" => array()
  , "z" => array()
);
while($row = mysql_fetch_array( $result )) {
  $data['t'][$row['whenpretty']] = array();
  $data['t'][$row['whenpretty']]['win_cnt'] = $row['twins'];
  $data['t'][$row['whenpretty']]['tot_cnt'] = $row['twins'] + $row['tloss'];
  $data['z'][$row['whenpretty']] = array();
  $data['z'][$row['whenpretty']]['win_cnt'] = $row['zwins'];
  $data['z'][$row['whenpretty']]['tot_cnt'] = $row['zwins'] + $row['zloss'];
  $data['p'][$row['whenpretty']] = array();
  $data['p'][$row['whenpretty']]['win_cnt'] = $row['pwins'];
  $data['p'][$row['whenpretty']]['tot_cnt'] = $row['pwins'] + $row['ploss'];
}

print json_encode(array_reverse(smooth_data($data)));
?>
