<?php
include_once '_graph_functions.php';
mysql_connect("mysql.laowaigonewild.com", "sclp", "Phav6zaC") or die(mysql_error());
mysql_select_db("aligulac") or die(mysql_error());
$result = mysql_query("select * from (select date_format(str_to_date(date_format(date, '%X%V Monday'), '%X%V %W'), '%Y-%m-%d') as 'when', sum(if(rca = 'Z',   sca, if(rcb = 'Z', scb, 0))) zwins, sum(if(rca =   'Z',   scb, if(rcb = 'Z', sca, 0))) zloss, sum(if(rca = 'T', sca, if(rcb = 'T', scb, 0))) twins, sum(if(rca = 'T', scb, if(rcb = 'T', sca, 0)))       tloss, sum(if(rca = 'P', sca, if(rcb =   'P',     scb, 0))) pwins, sum(if(rca = 'P', scb, if(rcb = 'P', sca, 0))) ploss from ratings_match where date > '2013-03-04' and game = 'HotS' and rca != 'R'    and rcb != 'R' and rca !=   rcb group by date_format(str_to_date(date_format(date, '%X%V Monday'), '%X%V %W'), '%Y-%m-%d') order by 1 asc) z") or die(mysql_error());
$data = array(
    "t" => array()
  , "p" => array()
  , "z" => array()
);
while($row = mysql_fetch_array( $result )) {
  $data['t'][$row['when']] = array();
  $data['t'][$row['when']]['win_cnt'] = $row['twins'];
  $data['t'][$row['when']]['tot_cnt'] = $row['twins'] + $row['tloss'];
  $data['z'][$row['when']] = array();
  $data['z'][$row['when']]['win_cnt'] = $row['zwins'];
  $data['z'][$row['when']]['tot_cnt'] = $row['zwins'] + $row['zloss'];
  $data['p'][$row['when']] = array();
  $data['p'][$row['when']]['win_cnt'] = $row['pwins'];
  $data['p'][$row['when']]['tot_cnt'] = $row['pwins'] + $row['ploss'];
}

print json_encode(array_reverse(smooth_data($data)));
?>
