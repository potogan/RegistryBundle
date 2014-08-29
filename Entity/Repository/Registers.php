<?php
namespace Potogan\RegistryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Potogan\RegistryBundle\Entity\Register;

class Registers extends EntityRepository
{
	public function get($key, $default = null)
	{
		$register = $this->find($key);

		return $register ? $register->getValue() : $default;
	}

	public function set($key, $value)
	{
		$register = $this->find($key);

		if ($register) {
			$register->setValue($value);
		} else {
			$register = new Register($key, $value);
			$this->_em->persist($register);
		}

		$this->_em->flush();
	}
}