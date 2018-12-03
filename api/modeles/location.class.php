<?php

class Location implements JsonSerializable{

	/**
	 * Id de la salle
	 *
	 * @var string
	 */
	private $id;

	/**
	 * HK de la salle.
	 *
	 * @var string
	 */
	private $hostkey;

	/**
	 * Le nom de la salle.
	 *
	 * @var string
	 */
	private $name;

	/**
	 * Department de la salle
	 *
	 * @var string
	 */
	private $department;

	/**
	 * Zone de la salle
	 *
	 * @var string
	 */
	private $zone;

	/**
	 * Description de la salle
	 *
	 * @var string
	 */
	private $description;

	/**
	 * Tableau des ressources de la salle.
	 *
	 * @var Ressources[]
	 */
	private $suitabilities;

	/**
	 * Si la salle est visible.
	 *
	 * @var boolean
	 */
	private $visible;

	/**
	 * Constructeur Ã  4 paramÃ¨tres
	 *
	 * @param string $name Le nom du groupe
	 * @param string $type Le type du groupe
	 * @param boolean $visible S'il est visible. True par dÃ©faut.
	 */
	public function __construct($arrayDB = NULL) {		
		$this->id = $arrayDB['locationId'];;
		$this->hostkey = $arrayDB['locationHK'];;
		$this->name = $arrayDB['locationName'];
		$this->department = $arrayDB['deptName'];
		$this->zone = $arrayDB['zoneName'];
		$this->description = $arrayDB['locationDesc'];
		$this->suitabilities = explode(";", $arrayDB['suitabilityList']);
		$this->visible = true;
	}

	/**
	 * Reprend les informations importantes de la salle  et les structures
	 * pour Ãªtre encodable en JSON.
	 *
	 * @return string[] Les infos sous forme de tableau de strings
	 */
	public function jsonSerialize() {
		$json = array(
			'name' => $this->name,
			'id' => $this->id,
			'hostKey' => $this->hostkey,
			'department' => $this->department,
			'zone' => $this->zone,
			'description' => $this->description,
			'visible' => $this->visible,
			'suitabilities' => implode("-", $this->suitabilities)
		);

		return $json;
	}
}
