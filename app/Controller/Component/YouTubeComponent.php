<?php
 
class YouTubeComponent extends Component {
    /*
    *埋め込みURLの作成
    */
    public function get_youtube_iframe_url($url) {
		/*
		*埋め込みコードの作成
		*/
		$endpoint = "http://www.youtube.com/oembed";
		$permalink = $url;
		$json = @file_get_contents($endpoint."?url=".rawurlencode($permalink)."&format=json");
		$obj = json_decode($json);
		$html = $obj->html;
		/*
		*urlの抽出
		*/
		if(preg_match_all('(https?://[-_.!~*\'()a-zA-Z0-9;/?:@&=+$,%#]+)', $html, $result) !== false){
			$url = $result[0][0];
		}
		return $url;
	}
}