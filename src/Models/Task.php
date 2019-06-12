<?php
namespace MVC\Models;

use MVC\Core\Model;

/**
 * @Entity @Table(name="tasks")
 **/
class Task extends Model
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	/** @Column(type="string") **/
	protected $title;
	/** @Column(type="string") **/
	protected $description;

	public function __construct()
	{
		// $this->title = "";
		// $this->description = "";
	}

	public function getId()
	{
		return $this->id;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}
}