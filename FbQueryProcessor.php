<?php
class FbQueryProcessor {
	static function query($query, $facebook) { 
		$params = array('method' => 'fql.query',
				'query' => $query,
				'callback' => '');
		return $facebook->api($params); 
	}
}

?>
