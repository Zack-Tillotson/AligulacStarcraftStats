<?php
$listSize = filter_input(INPUT_GET, 'length', FILTER_SANITIZE_STRING);
if($listSize == "") {
  $listSize = 15;
}
$rc = filter_input(INPUT_GET, 'rc', FILTER_SANITIZE_STRING);
$rco = filter_input(INPUT_GET, 'rco', FILTER_SANITIZE_STRING);
if($rc == "" || $rco == "") {
  $rc = "Any";
  $rco = "Any";
  $query = "select p.tag, p.country, p.tlpd_id, m.rc, m.rco, m.wins, m.loss, m.wins / m.loss ratio from (select pl_id, rc, rco, sum(sc) wins, sum(sco) loss from (select pla_id as 'pl_id', date,    rca as 'rc', sca as 'sc', rcb as 'rco', scb as 'sco' from ratings_match where game = 'HotS' union select plb_id as 'pl_id', date, rcb as 'rc', scb as 'sc', rca as 'rco', sca as 'sco'   from ratings_match where game = 'HotS') a group by pl_id, rc, rco) m, ratings_player p where m.pl_id = p.id and (loss >= 5 or wins >= 15)";
} else {
  $query = "select p.tag, p.country, p.tlpd_id, m.rc, m.rco, m.wins, m.loss, m.wins / m.loss ratio from (select pl_id, rc, rco, sum(sc) wins, sum(sco) loss from (select pla_id as 'pl_id', date,    rca as 'rc', sca as 'sc', rcb as 'rco', scb as 'sco' from ratings_match where game = 'HotS' union select plb_id as 'pl_id', date, rcb as 'rc', scb as 'sc', rca as 'rco', sca as 'sco'   from ratings_match where game = 'HotS') a group by pl_id, rc, rco) m, ratings_player p where m.pl_id = p.id and rc = '$rc' and rco = '$rco' and (loss >= 5 or wins >= 15)";
}
  
$query = $query . "order by wins/(loss) desc limit $listSize";

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
    ,'rc' => $row['rc']
    ,'rco' => $row['rco']
    ,'wins' => $row['wins']
    ,'loss' => $row['loss']
    ,'ratio' => $row['ratio']
  );
}

print json_encode($data);
?>
