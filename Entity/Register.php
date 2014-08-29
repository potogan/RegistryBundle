<?php
namespace Potogan\RegistryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Potogan\RegistryBundle\Entity\Repository\Registers")
 * @ORM\Table(name="registers")
 */
class Register {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", length=100)
	 */
	protected $name;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $value;

	public function __construct($name, $value = null)
	{
		$this->name = $name;

		$this->setValue($value);
	}

	public function getName()
	{
		return $this->name;
	}

	public function getValue()
	{
		return unserialize($this->value);
	}

	public function setValue($value)
	{
		$this->value = serialize($value);
	}
}