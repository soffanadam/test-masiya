<?php

namespace App\Core;

use XmlParser;

abstract class XmlRepository
{
	protected $path = 'app/repo';
	protected $filename;
    protected $fields = [];

	/**
     * @var \Orchestra\Parser\Xml\Reader
     */
    protected $xml;

    public function __construct()
    {
        $xmlString = $this->getXmlString();
    	$this->xml = XmlParser::extract($xmlString);
    }

    public function getAll()
	{
        return collect($this->xml->parse([
            ['uses' => 'row['.implode(',', $this->fields).']']
        ])[0])->map(function ($row) {
            return $this->present($row);
        });
	}

    protected function getFilePath()
    {
        return storage_path(rtrim($this->path, '/') . '/' . $this->filename . '.xml');
    }

    protected function getXmlString()
    {
        $xmlString = @file_get_contents($this->getFilePath());

        // Replace all "field" tagname with "name" attribute value: <field name="name">Adam Sundana</field> to <name>Adam Sundana</name>
        $xmlString = preg_replace("/<field name=\"(.*?)\">(.*?)<\/field>/", "<$1>$2</$1>", $xmlString);

        return $xmlString;
    }

    protected function present($row)
    {
        return $row;
    }
}