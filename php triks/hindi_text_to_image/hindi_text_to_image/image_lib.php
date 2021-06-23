<?php
function imagelib($text){
	$words = explode(" ", $text);        
	for($k = 0; $k < count($words); $k++){
		$text_encoding = mb_detect_encoding($words[$k], 'UTF-8, ISO-8859-1');
		if ($text_encoding != 'UTF-8') {
			$words[$k] = mb_convert_encoding($words[$k], 'UTF-8', $text_encoding);
		}
		$words[$k] = mb_encode_numericentity($words[$k], array (0x0, 0xffff, 0, 0xffff), 'UTF-8');
		$arr = explode("&#", $words[$k]);
		for ($i = 0; $i < (count($arr)-1); $i++){
			  if($arr[$i] == "2367;") {
				$arr[$i] = $arr[$i-1] . '';
				$arr[$i-1] = "2367;";
			  }

			  if($arr[$i] == "2311;") {
				if($arr[$i+1] == "2364;") {
					$arr[$i] = "2316;";
					$arr[$i+1] = '';
					}
			  }
			  
			  if($arr[$i] == "2371;") {
				  if($arr[$i+1] == "2364;") {
					$arr[$i] = "2372;";
					$arr[$i+1] = '';
					}
			  }

			  if($arr[$i] == "2305;") {
				  if($arr[$i+1] == "2364;") {
					$arr[$i] = "2384;";
					$arr[$i+1] = '';
					}
			  }

			  if($arr[$i] == "2315;") {
				  if($arr[$i+1] == "2364;") {
					$arr[$i] = "2400;";
					$arr[$i+1] = '';
					}
			  }

			  if($arr[$i] == "2312;") {
				  if($arr[$i+1] == "2364;") {
					$arr[$i] = "2401;";
					$arr[$i+1] = '';
					}
			  }

			  if($arr[$i] == "2367;") {
				  if($arr[$i+1] == "2364;") {
					$arr[$i] = "2402;";
					$arr[$i+1] = '';
					}
			  }

			  if($arr[$i] == "2368;") {
				  if($arr[$i+1] == "2364;") {
					$arr[$i] = "2403;";
					$arr[$i+1] = '';
					}
			  }

			  if($arr[$i] == "2404;") {
				  if($arr[$i+1] == "2364;") {
					$arr[$i] = "2365;";
					$arr[$i+1] = '';
					}
			  }

			  if($arr[$i] == "2381;") {
				  if($arr[$i+1] == "2381;") {
				  //$arr[$i+1] = '8204;';
				  }
				}

			  if($arr[$i] == "2364;") {
				  if($arr[$i+1] == "2381;") {
				  //$arr[$i] = "2381;";
				  //$arr[$i+1] = '8205;';
					}
			  }

			}
		$words[$k] = implode('&#',$arr);
	}
	return $words;
}
?>