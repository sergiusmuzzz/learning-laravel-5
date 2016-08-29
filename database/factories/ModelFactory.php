<?php

$factory->define(App\User::class, function(Faker\Generator $faker){
	return[
		'name' => $faker->name,
		'email' => $faker->email,
		'password' => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
	];
});

$factory->define(App\Tour::class, function(Faker\Generator $faker){
	return[
		'user_id' => factory('App\User')->create()->id,
		'title' => $faker->country,
		'subtitle' => $faker->city,
	];
});