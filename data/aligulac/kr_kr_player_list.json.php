<?php
$query = "select * from (select tag, country, rc, tlpd_id, ag_id, sum(wins) wins, sum(loss) loss from ((select pb.tag, pb.country, rcb rc, pb.tlpd_id, pb.id ag_id, sum(scb) wins, sum(sca) loss from   ratings_match m, ratings_player pa, ratings_player pb where m.pla_id = pa.id and m.plb_id = pb.id and pa.country = 'KR' and pb.country = 'KR' and game='HotS' and date > '2013-03-04'    group by pb.tag, pb.country, rcb, pb.tlpd_id, pb.id order by pb.id) union (select pa.tag, pa.country, rca rc, pa.tlpd_id, pa.id ag_id, sum(sca) wins, sum(scb) loss from ratings_match   m, ratings_player pa, ratings_player pb where m.pla_id = pa.id and m.plb_id = pb.id and pa.country = 'KR' and pb.country = 'KR' and game='HotS' and date > '2013-03-04' group by pa.     tag, pa.country, rca, pa.tlpd_id, pa.id order by pa.id)) z group by tag, country, rc, tlpd_id, ag_id) zz order by wins + loss >= 15 desc, if(wins + loss >= 15, wins / loss, wins / (loss + 1)) desc, wins desc, loss asc";
  
mysql_connect("mysql.laowaigonewild.com", "sclp", "Phav6zaC") or die(mysql_error());
mysql_select_db("aligulac") or die(mysql_error());
$result = mysql_query($query) or die(mysql_error());
$data = array();
$data['label'] = $rc . " vs " . $rco;
$data['players'] = array();
while($row = mysql_fetch_array( $result )) {
  $data['players'][] = array(
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
