<?php
$query = "select * from (select date, if(pb.country = 'KR', pa.tag, pb.tag) tag, if(pb.country = 'KR', pa.country, pb.country) country, if(pb.country = 'KR',rca,rcb) rc, if(pb.country  = 'KR', pa.id, pb.id) ag_id, if(pb.country = 'KR', pa.tlpd_id, pb.tlpd_id) tlpd_id, sum(if(pb.country = 'KR', sca, scb)) wins, sum(if(pb.country = 'KR', scb, sca)) loss from ratings_match m, ratings_player pa, ratings_player pb where m.pla_id = pa.id and m.plb_id = pb.id and ((pa.country != 'KR' and pb.country = 'KR') or (pa.country = 'KR' and pb.country != 'KR')) and game='HotS' group by if(pb.country = 'KR', pa.tag, pb.tag) , if(pb.country = 'KR', pa.country, pb.country))a where rc = 'P' order by if(wins + loss > 10, wins / loss, wins / (loss+1) / 1000) desc limit 300";
  
mysql_connect("mysql.laowaigonewild.com", "sclp", "Phav6zaC") or die(mysql_error());
mysql_select_db("aligulac") or die(mysql_error());
$result = mysql_query($query) or die(mysql_error());
$data = array();
$data['label'] = $rc . " vs " . $rco;
$data['players'] = array();
while($row = mysql_fetch_array( $result )) {
  $data['players'][$row['tag']] = array(
     'tag' => $row['tag']
    ,'country' => $row['country']
    ,'tlpd_id' => $row['tlpd_id']
    ,'ag_id' => $row['ag_id']
    ,'rc' => $row['rc']
    ,'wins' => $row['wins']
    ,'loss' => $row['loss']
  );
}

print json_encode($data);
?>