<?php
	class Captcha
	{
		/**
		*Generate CAPTCHA
		* @param $img_w int Captcha image width
		* @param $img_h int CAPTCHA images with high
		* @param $char_len  Length of code value
		* @param $font      Captcha font size
		*/
		public	function generate($img_w,$img_h,$char_len,$font)
		{
		    //Generate code values without zeros to avoid conflicts with the letter o
			$char = array_merge(range('A','Z'),range('a','z'),range(1,9));
			$rand_keys=array_rand($char,$char_len);
			if($char_len==1)
			{
				$rand_keys=array($rand_keys);
			}
			shuffle($rand_keys);//Break up the array holding the random numbers
			$code ='';
			foreach($rand_keys as $key)
			{
				$code.=$char[$key];
			}
			//Save in session
			session_start(); 
			$_SESSION['captcha_code']=$code;
			//Write the CAPTCHA value to the image
			//Generate Canvas
			$img=imageCreateTrueColor($img_w,$img_h);
			//Setting the background
			$bg_color=imageColorAllocate($img,0xc0,0xc0,0xc0);
			imageFill($img,0,0,$bg_color);
			//interference pixel
			for($i=0;$i<300;++$i)
			{
				$color = imageColorAllocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
				imageSetPixel($img,mt_rand(0,$img_w),mt_rand(0,$img_h),$color);
			}
			//rectangular border
			$rect_color = imageColorAllocate($img,0xff,0xff,0xff);//white
			imageRectangle($img,0,0,$img_w-1,$img_h-1,$rect_color);
			//2Manipulating the Canvas
			//Setting the string color
			if(mt_rand(1,2)==1)
			{
				$str_color=imageColorAllocate($img,0,0,0);//black
			}
			else
			{
				$str_color=imageColorAllocate($img,0xff,0xff,0xff);//white
			}
			//Setting the string position
			$font_w = imageFontWidth($font);//font width
			$font_h = imageFontHeight($font);//font height
			$str_w = $font_w * $char_len;//string width
			imageString($img,$font,($img_w-$str_w)/2,($img_h-$font_h)/2,$code,$str_color);
			//Output image content
			header('Content-Type:image/png');
			imagepng($img);
			//Destruction of the canvas
			imagedestroy($img);
		}
	}
?>