<?
	if($me) {
		$dateStart = new DateTime();
		$dateStart->setTimestamp(0);
		$dateEnd = new DateTime('2006-09-26');
		$dateInterval = new DateInterval('P30D');
		while($dateEnd->getTimestamp() < time()) {
			$endTS = $dateEnd->getTimestamp();
			$startTS = $dateStart->getTimestamp();
			//get posts and statuses on my own wall
			$query = "SELECT post_id, actor_id, target_id, message, comments, privacy FROM stream WHERE source_id='$me[id]' AND created_time < $endTS and created_time > $startTS";
			echo $query;
			$results = FbQueryProcessor::query($query, $facebook);
			foreach( $results as $result) {
				foreach($result as $key=>$item) {
					print_r($item);
					print "<br/>";
				}
				print "<br/>";
			}
			$dateStart->setTimestamp($endTS);
			$dateEnd->add($dateInterval);
		}

	}
?>
