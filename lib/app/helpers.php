<?php
	function cut_string($text, $length)
	{
	    if(strlen($text) > $length) {
	    	$text = $text.' ';
	        $text = substr($text, 0, strpos($text, ' ', $length)).'...';
	    }
	    return $text;
	}
	function cut_string_name($text, $length)
	{
	    $check = strlen($text) > $length;
	    if(strlen($text) > $length) {
	    	$text = $text.' ';
	        $text = substr($text, 0, $length).'...';
	    }

	    $tmp = explode(' ',$text);
	    if($check) unset($tmp[count($tmp) - 1]);
	    if($check){
            $text = implode(' ',$tmp).'...';
        }else {
            $text = implode(' ',$tmp);
        }

	    return $text;
	}

	function get_status($status){
	    $str = '';
        switch ($status){
            case 0 : $str = "Tắt";break;
            case 1 : $str = "Đang đăng";break;
            case 2 : $str = "Chờ duyệt lần 2";break;
            case 3 : $str = "Chờ duyệt lần 1";break;
            case 4 : $str = "Trả lại";break;
        }
        return $str;
    }


	/**
     * Save all images in request and resized copies of them.
     *
     * @return implode(',' , 'all images with new names');
     */

	function textTest($length){
		$text = "Đây chỉ là một đoạn text vô nghĩa , không mang chức năng gì nhiều . Cảm ơn bạn đã chú ý và đọc đoạn text này của chúng tôi. Quyến đẹp troai hân hạnh tài trợ chương trình này";
		if(strlen($text) > $length) {
	    	$text = $text.' ';
	        $text = substr($text, 0, strpos($text, ' ', $length)).'...';
	    }
	    return $text;
	}
	function saveImage($input,$resized_size,$path){
	    $imgArr = [];
	    $max_size = $resized_size;
	    foreach ($input as $image) {

	        $filename = 'img_'.date("Y-m-d").'_'.round(microtime(true)).'.'.$image->extension();
	        $image->storeAs($path,$filename);
	        $imgArr[] = $filename;

	        $image_info = getimagesize($image);
	        $width_orig  = $image_info[0];
	        $height_orig = $image_info[1];

	        $ratio = $width_orig/$height_orig;
	        if($ratio>=1){
	            $width=$max_size;
	            $height=$width/$ratio;
	        }else{
	            $height=$max_size;
	            $width=$height*$ratio;
	        }
	        $destination_image = imagecreatetruecolor($width, $height);

	        $type_org = $image->extension();
	        switch ($type_org) {
	            case 'jpeg':
	            $orig_image = imagecreatefromjpeg($image);
	            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
	            imagejpeg($destination_image, 'lib/storage/app/'.$path.'/resized-'.$filename);
	            break;

	            case 'jpg':
	            $orig_image = imagecreatefromjpeg($image);
	            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
	            imagejpeg($destination_image, 'lib/storage/app/'.$path.'/resized-'.$filename);
	            break;

	            case 'png':
	            $orig_image = imagecreatefrompng($image);
	            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
	            imagepng($destination_image, 'lib/storage/app/'.$path.'/resized-'.$filename);
	            break;

	            case 'gif':
	            $orig_image = imagecreatefromgif($image);
	            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
	            imagegif($destination_image, 'lib/storage/app/'.$path.'/resized-'.$filename);
	            break;
	        }
	    }
	    return implode(',',$imgArr);
	}

	//lưu ảnh riêng cho bài viết
	function saveImageArticle($input,$path){
	    $imgArr = [];
	    $max_size500 = 500;
	    $max_size200 = 200;
	    foreach ($input as $image) {

	        $filename = 'img_'.date("Y-m-d").'_'.round(microtime(true)).'.'.$image->extension();
	        $image->storeAs($path,$filename);
	        $imgArr[] = $filename;

	        $image_info = getimagesize($image);
	        $width_orig  = $image_info[0];
	        $height_orig = $image_info[1];

	        $ratio = $width_orig/$height_orig;
	        if($ratio>=1){
	        	//resize 500px
	            $width500=$max_size500;
	            $height500=$width500/$ratio;
	            //resize 200px
	            $width200=$max_size200;
	            $height200=$width200/$ratio;
	        }else{
	            $height500=$max_size500;
	            $width500=$height500*$ratio;

	            $height200=$max_size200;
	            $width200=$height200*$ratio;
	        }
	        $destination_image500 = imagecreatetruecolor($width500, $height500);
	        $destination_image200 = imagecreatetruecolor($width200, $height200);

	        $type_org = $image->extension();
	        switch ($type_org) {
	            case 'jpeg':
	            $orig_image = imagecreatefromjpeg($image);
	            imagecopyresampled($destination_image500, $orig_image, 0, 0, 0, 0, $width500, $height500, $width_orig, $height_orig);
	            imagejpeg($destination_image500, 'local/storage/app/'.$path.'/resized500-'.$filename);

	            imagecopyresampled($destination_image200, $orig_image, 0, 0, 0, 0, $width200, $height200, $width_orig, $height_orig);
	            imagejpeg($destination_image200, 'local/storage/app/'.$path.'/resized200-'.$filename);
	            break;

	            case 'jpg':
	            $orig_image = imagecreatefromjpeg($image);
	            imagecopyresampled($destination_image500, $orig_image, 0, 0, 0, 0, $width500, $height500, $width_orig, $height_orig);
	            imagejpeg($destination_image500, 'local/storage/app/'.$path.'/resized500-'.$filename);
	            //200
	            imagecopyresampled($destination_image200, $orig_image, 0, 0, 0, 0, $width200, $height200, $width_orig, $height_orig);
	            imagejpeg($destination_image200, 'local/storage/app/'.$path.'/resized200-'.$filename);
	            break;

	            case 'png':
	            $orig_image = imagecreatefrompng($image);
	            imagecopyresampled($destination_image500, $orig_image, 0, 0, 0, 0, $width500, $height500, $width_orig, $height_orig);
	            imagepng($destination_image500, 'local/storage/app/'.$path.'/resized500-'.$filename);
	            //200
	            imagecopyresampled($destination_image200, $orig_image, 0, 0, 0, 0, $width200, $height200, $width_orig, $height_orig);
	            imagepng($destination_image200, 'local/storage/app/'.$path.'/resized200-'.$filename);
	            break;

	            case 'gif':
	            $orig_image = imagecreatefromgif($image);
	            imagecopyresampled($destination_image500, $orig_image, 0, 0, 0, 0, $width500, $height500, $width_orig, $height_orig);
	            imagegif($destination_image500, 'local/storage/app/'.$path.'/resized500-'.$filename);

	            imagecopyresampled($destination_image200, $orig_image, 0, 0, 0, 0, $width200, $height200, $width_orig, $height_orig);
	            imagegif($destination_image200, 'local/storage/app/'.$path.'/resized200-'.$filename);
	            break;
	        }
	    }
	    return implode(',',$imgArr);
	}

	function time_format($time){
		if ($time == null) {
			return 'lỗi';
		}
		else{
			$date = new DateTime();
			$date = strtotime(date_format($date,"Y-m-d h:m:s"));
			$time = strtotime(date_format($time,"Y-m-d h:m:s"));
			// echo $date . "----" . $time;
			// return $date.' - '.$time;
			$year = 31526000;
			$month = 2592000;
			$day = 86400;
			$hour = 3600;
			$min = 60;
			// strtotime(date_format($time,"Y-m-d")) == strtotime(date_format($date,"Y-m-d"))
			if ($time < $date-$year) {
				return round(($date-$time)/$year).' năm';
			}
			else if($time < $date-$month){
				return round(($date-$time)/$month).' tháng';
			}
			else if ($time < $date-$day) {
				return round(($date-$time)/$day).' ngày';
			}
			else if ($time < $date-$hour) {
				return round(($date-$time)/$hour).' giờ';
			}
			else if ($time < $date-$min) {
				return round(($date-$time)/$min).' phút';
			}
			else{
				return 'bây giờ';
			}
		}
			

	}

	function date_format_vn($time){
		if ($time == null) {
			return 'lỗi';
		}
		else{
			$date_now = time();

			
			
			$year = 31526000;
			$month = 2592000;
			$day = 86400;
			$hour = 3600;
			$min = 60;
			// strtotime(date_format($time,"Y-m-d")) == strtotime(date_format($date,"Y-m-d"))
			if ($time < $date_now-$year) {
				return round(($date_now-$time)/$year).' năm trước';
			}
			else if($time < $date_now-$month){
				return round(($date_now-$time)/$month).' tháng trước';
			}
			else if ($time < $date_now-$day) {
				return round(($date_now-$time)/$day).' ngày trước';
			}
			else if ($time < $date_now-$hour) {
				return round(($date_now-$time)/$hour).' giờ trước';
			}
			else if ($time < $date_now-$min) {
				return round(($date_now-$time)/$min).' phút trước';
			}
			else{
				return 'bây giờ';
			}
		}
			

	}


	function getUrl() {
	    $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
	    $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
	    $url .= $_SERVER["REQUEST_URI"];
	    return $url;
    }

    
    function level_format($level){
    	switch ($level) {
    		case 1:
    			return 'Giám đốc';
    			break;
    		case 2:
    			return 'Nhân viên';
    			break;
    		case 3:
    			return 'Người dùng';
    			break;
    		
    		default:
    			return 'Lỗi';
    			break;
    	}
    }
     function gender_format($gender){
    	switch ($gender) {
    		case 1:
    			return 'Nam';
    			break;
    		case 2:
    			return 'Nữ';
    			break;
    		case 3:
    			return 'Khác';
    			break;
    		
    		default:
    			return 'Lỗi';
    			break;
    	}
    }
