<?php
include_once '_graph_functions.php';
mysql_connect("mysql.laowaigonewild.com", "sclp", "Phav6zaC") or die(mysql_error());
mysql_select_db("aligulac") or die(mysql_error());
$result = mysql_query("select * from (select date_format(date, 'Week %v<br/>(%b %Y)') as 'whenpretty', date_format(date, '%y%v') as 'when', sum(if(rca = 'Z' and pa.country != 'KR' and pb.country = 'KR', sca, if(rcb = 'Z' and pa.country = 'KR' and pb.country != 'KR', scb, 0))) zwins, sum(if(rca = 'Z'  and pa.country != 'KR' and pb.country = 'KR', scb, if(rcb = 'Z' and pa.country = 'KR' and pb.country != 'KR', sca, 0))) zloss, sum(if(rca = 'T' and pa.country != 'KR' and pb.country = 'KR', sca, if(rcb = 'T' and pa.country = 'KR' and pb.country != 'KR', scb, 0))) twins,   sum(if(rca = 'T' and pa.country != 'KR' and pb.country = 'KR', scb, if(rcb = 'T' and pa.country = 'KR' and pb.country != 'KR', sca, 0))) tloss, sum(if(rca = 'P' and pa.country != 'KR' and pb.country = 'KR', sca, if(rcb =  'P' and pa.country = 'KR' and pb.country != 'KR', scb, 0))) pwins, sum(if(rca = 'P' and pa.country != 'KR' and pb.country = 'KR', scb, if(rcb = 'P' and pa.country = 'KR' and pb.country != 'KR', sca, 0))) ploss from ratings_match m, ratings_player pa, ratings_player pb where m.pla_id = pa.id and m.plb_id = pb.id and  date > '2013-03-08' and game = 'HotS' and rca != 'R' and rcb != 'R' and rca !=   rcb group by date_format(date, '%y%v') order by 2 asc) z") or die(mysql_error());
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
