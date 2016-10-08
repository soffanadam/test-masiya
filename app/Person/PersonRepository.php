<?php

namespace App\Person;

class PersonRepository extends \App\Core\XmlRepository
{
	protected $filename = 'person';
	protected $fields = ['id', 'name', 'position', 'city', 'email', 'department', 'avatar', 'status'];

	protected function present($person)
	{
		$statusTexts = [
			1 => 'Masuk', 'Cuti', 'Libur'
		];

		$person['statusText'] = $statusTexts[$person['status']];

		return $person;
	}
}