<?php
 
class YouTubeComponent extends Component {
    /*
    *埋め込みURLの作成
    */
    public function get_youtube_iframe_url($url = null) {
		/*
		*埋め込みコードの作成
		*/
		$endpoint = "http://www.youtube.com/oembed";
		/*
		*URLが保存されているかどうかの判定
		*/
		if(!empty($url)){
			$permalink = $url;
		} else {
			return false;
		}
		/*
		*URLへのアクセス
		*/
		$json = @file_get_contents($endpoint."?url=".rawurlencode($permalink)."&format=json");
		/*
		*jsonがあるかどうかの判定
		*/
		if(!empty($json)){
			$obj = json_decode($json);
		} else {
			return false;
		}
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