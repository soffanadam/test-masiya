<?php

namespace App\Person;

class PersonRepository extends \App\Core\XmlRepository
{
	protected $filename = 'person';
	protected $fields = ['id', 'name', 'position', 'city', 'email', 'department', 'avatar', 'status'];
}