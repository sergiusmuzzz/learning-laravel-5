<?php
namespace App;

use App\AddPhotoToTour;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Mockery as m;

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 8/28/16
 * Time: 9:00 PM
 */

class AddPhotoToTourTest extends \TestCase
{
	function it_processes_a_from_to_add_a_photo_to_a_tour()
	{
		$tour = factory(Tour::class)->create();

		$file = m::mock(UploadedFile::class, [
			'getClientOriginalName' => 'foo',
			'getClientOriginalExtension' => 'jpg',
		]);

		$file->shouldReceive('move')
			->once()
			->with('images/photos', 'nowfoo.jpg');

		$thumbnail = m::mock(Thumbnail::class);

		$thumbnail->shouldRecieve('move')
			->once()
			->with('images/photos/nowfoo.jpg', 'images/photos/tn-nowfoo.jpg');

		$form = new AddPhotoToTour($tour, $file, $thumbnail);

		$form->save();

		$this->assertCount(1, $tour->images);
	}
}

function time()
{
	return 'now';
}

function sha1($path)
{
	return $path;
}