<?php
namespace S3UTaxonomy\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="zf_term")
*/
class ZfTerm
{
	/**
	* @ORM\Column(name="term_id",type="bigint",length=20)
	* @ORM\Id
	* @ORM\GeneratedValue
	*/
	private $termId;

	/**
	 * @ORM\Column(length=200)
	 */
	private $name;

	/**
	 * @ORM\Column(length=200)
	 */
	private $slug;

	/**
	 * @ORM\Column(name="term_group",type="bigint",length=10)
	 */
	private $termGroup;

	public function getTermId()
	{
		return $this->termId;
	}

	public function setName($name)
	{
		$this->name=$name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setSlug($slug)
	{
		$this->slug=$slug;
	}

	public function getSlug()
	{
		return $this->slug;
	}

	public function setTermGroup($termGroup)
	{
		$this->termGroup=$termGroup;
	}

	public function getTermGroup()
	{
		return $this->termGroup;
	}

}
?>