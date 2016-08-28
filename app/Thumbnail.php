<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 8/27/16
 * Time: 10:03 PM
 */

namespace App;


use Image;

class Thumbnail
{
	public function make($src, $destination)
	{
		Image::make($src)
			->fit(200)
			->save($destination);
	}
}