<?php

namespace udamuri\imagethum;

class ImageThum extends \yii\base\Widget
{
    public function run()
    {
        return "Muri Budiman :D !";
    }

    public static function resize($img_target, $newcopy, $w, $h, $ext)
    {
	    list($w_orig, $h_orig) = getimagesize($img_target);
	    $scale_ratio = $w_orig / $h_orig;

	    if (($w / $h) > $scale_ratio) 
	    {
	        $w = $h * $scale_ratio;
	    } else 
	    {
	        $h = $w / $scale_ratio;
	    }

	    $img = "";

	    $ext = strtolower($ext);

	    if ($ext == "gif")
	    { 
	    	$img = imagecreatefromgif($img_target);
	    } 
	    else if($ext =="png")
	    { 
	    	$img = imagecreatefrompng($img_target);
	    } 
	    else 
	    { 
	    	$img = imagecreatefromjpeg($img_target);
	    }

	    $tci = imagecreatetruecolor($w, $h);

	    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
	    if ($ext == "gif")
	    { 
	        imagegif($tci, $newcopy);
	    } else if($ext =="png")
	    { 
	        imagepng($tci, $newcopy);
	    } else 
	    { 
	        imagejpeg($tci, $newcopy, 84);
	    }
	}

	public static function thumb($img_target, $newcopy, $w, $h, $ext) {
	    list($w_orig, $h_orig) = getimagesize($img_target);
	    $src_x = ($w_orig / 2) - ($w / 2);
	    $src_y = ($h_orig / 2) - ($h / 2);
	    $ext = strtolower($ext);
	    $img = "";

	    if ($ext == "gif")
	    { 
	    	$img = imagecreatefromgif($img_target);
	    } 
	    else if($ext =="png")
	    { 
	    	$img = imagecreatefrompng($img_target);
	    } 
	    else 
	    { 
	    	$img = imagecreatefromjpeg($img_target);
	    }

	    $tci = imagecreatetruecolor($w, $h);
	    imagecopyresampled($tci, $img, 0, 0, $src_x, $src_y, $w, $h, $w, $h);
	    if ($ext == "gif"){ 
	        imagegif($tci, $newcopy);
	    } else if($ext =="png"){ 
	        imagepng($tci, $newcopy);
	    } else { 
	        imagejpeg($tci, $newcopy, 84);
	    }
	}

}
