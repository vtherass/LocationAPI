<?php

/**
 * Description of Activity
 *
 * @author Yassine
 */
class Activity {

	/**
	 * Id d'une activitÃ©.
	 *
	 * @var string
	 */
	private $id;

	/**
	 * Nom du cours(2).
	 *
	 * @var string
	 */
	private $libelle2;

	/**
	 * Nom de l'activitÃ©.
	 *
	 * @var string
	 */
	private $name;

	/**
	 * Heure de dÃ©but d'une activitÃ©.
	 *
	 * @var \DateTime
	 */
	private $heureDebut;

	/**
	 * Heure de fin d'une activitÃ©.
	 *
	 * @var \DateTime
	 */
	private $heureFin;

	/**
	 * Dates de l'activitÃ©.
	 *
	 * @var array
	 */
	private $datesActivity;

	/**
	 * Semaines de l'activitÃ©s.
	 *
	 * @var array
	 */
	private $weeks;

	/**
	 * Toutes les semaines oÃ¹ se dÃ©roule les activitÃ©s.
	 *
	 * @var string
	 */
	private $weekLabel;

	/**
	 * Assistant de l'activitÃ©.
	 *
	 * @var string
	 */
	private $assistant;

	/**
	 * Communication de l'activitÃ©.
	 *
	 * @var string
	 */
	private $communication;

	/**
	 * Type de l'activitÃ©.
	 *
	 * @var string
	 */
	private $typeActivity;

	/**
	 * LibellÃ©e du type de l'activitÃ©.
	 *
	 * @var string
	 */
	private $typeActivityLibelle;

	/**
	 * Campus de l'activitÃ©.
	 *
	 * @var string
	 */
	private $campus;

	/**
	 * Locaux de l'activitÃ©.
	 *
	 * @var string[]
	 */
	private $locals;

	/**
	 * Titulaires de l'activitÃ©s
	 *
	 * @var string[]
	 */
	private $staff;

	/**
	 * Jours durant lesquels se dÃ©roule l'activitÃ©.
	 *
	 * @var int[] jour de l'activitÃ©(0 = Lundi -> 5 = Samedi)
	 */
	private $weekDays;

	/**
	 * DurÃ©e d'une activity.
	 * durÃ©e d'une activitÃ© en pÃ©riode.(10  = 10pÃ©riodes de 30minutes = 5heures).
	 *
	 * @var int
	 */
	private $duration;

	/**
	 * Nom du cours Ã  laquelle appartient une activitÃ©.
	 *
	 * @var string
	 */
	private $courseName;

	/**
	 * MnÃ©mo du cours Ã  laquelle l'activitÃ© appartient.
	 *
	 * @var string
	 */
	private $courseMnemo;

	/**
	 * Periode de dÃ©but de l'activitÃ©.
	 *
	 * @var int
	 */
	private $periodeDebut;

	/**
	 * Periode de fin de l'activitÃ©.
	 *
	 * @var int
	 */
	private $periodeFin;

	/**
	 * Nombre par lequel on va diviser l'activitÃ© lors de l'affichage.
	 *
	 * @var int
	 */
	private $diviseur;

	/**
	 * Couleur selon le type d'activitÃ©.
	 *
	 * @var string
	 */
	private $color;

	/**
	 * Est une activitÃ© conjointe parent.
	 *
	 * @var boolean
	 */
	private $isJTAParent;

	/**
	 * Est une activitÃ© conjointe enfant.
	 *
	 * @var boolean
	 */
	private $isJTAChild;

	/**
	 * Id d'une activitÃ© parent.
	 *
	 * @var array
	 */
	private $parentsId;

	/**
	 * Liste des activitÃ©s conjointes parents.
	 *
	 * @var Activity[]
	 */
	private $JTAParents;

	/**
	 * L'activitÃ© variante parent.
	 *
	 * @var Activity
	 */
	private $variantParent;

	/**
	 * L'activitÃ© conjointe enfant.
	 *
	 * @var Activity
	 */
	private $JTAChild;

	/**
	 * Liste des activitÃ©s conjointes enfants
	 *
	 * @var Activity[]
	 */
	private $variantChildren;

	/**
	 * Est une activitÃ© enfant (conjointe).
	 *
	 * @var boolean
	 */
	private $isVariantChild;

	/**
	 * Est une activitÃ© variante.
	 *
	 * @var boolean
	 */
	private $isVariantParent;

	/**
	 * Reprend les groupes liÃ©s Ã  cette activitÃ©s.
	 *
	 * @var array clÃ© : libellÃ© du groupe, valeur : boolÃ©en(True : visible; False : non visible);
	 */
	private $groupes;

	/**
	 * Afficher ou non cette activitÃ©s.
	 *
	 * @var boolean True : visible; False : non visible
	 */
	private $visible;

	/**
	 * L'activitÃ© appartient Ã  un cours ajoutÃ© par l'Ã©tudiant.
	 *
	 * @var boolean
	 */
	private $isCourseAdded;

	/**
	 * Instanciation d'une activitÃ© avec les donnÃ©es rÃ©cupÃ©rÃ©es de la DB.
	 *
	 * @param mixed[] $arrayDB Tuple rÃ©cupÃ©rÃ© de la DB.
	 */
	public function __construct($arrayDB = NULL) {
		$this->courseName = (isset($arrayDB['courseName']) ? $arrayDB['courseName'] : NULL);
		$this->courseMnemo = (isset($arrayDB['mnemo']) ? $arrayDB['mnemo'] : NULL);
		$this->libelle2 = $arrayDB['libelle2'];
		$this->id = $arrayDB['activityId'];
		$this->name = $arrayDB['nameAct'];
		$this->assistant = $arrayDB['assistant'];
		$this->communication = $arrayDB['comm'];
		$this->typeActivity = $arrayDB['typeActivity'];
		$this->typeActivityLibelle = $arrayDB['typeActivityLibelle'];
		$this->duration = $arrayDB['duration'];
		$this->weekLabel = $arrayDB['weekLabel'];
		$this->isJTAParent = $arrayDB['isJTAParent'] == 1;
		$this->isJTAChild = $arrayDB['isJTAChild'] == 1;
		$this->isVariantParent = $arrayDB['isVariantParent'] == 1;
		$this->isVariantChild = $arrayDB['isVariantChild'] == 1;
		$this->visible = true;
		$this->isCourseAdded = false;
		$this->groupes = array();
		$this->weeks = array();
		$this->staff = array();
		$this->weekDays = array();
		$this->locals = array();
		$this->setColor();
	}

	/**
	 * Initialisation des activitÃ©s agenda avec seulement les informations utiles.
	 *
	 * @param array $arrayDB
	 */
	public function initActiAgenda($arrayDB) {
		$this->libelle2 = $arrayDB['libelle2'];
		$this->id = $arrayDB['activityId'];
		$this->name = $arrayDB['nameAct'];
		$this->assistant = $arrayDB['assistant'];
		$this->communication = $arrayDB['comm'];
		$this->typeActivity = $arrayDB['typeActivity'];
		$this->typeActivityLibelle = $arrayDB['typeActivityLibelle'];
		$this->duration = $arrayDB['duration'];
		$this->weekLabel = $arrayDB['semaineLabel'];
		$this->visible = true;
		$this->isCourseAdded = false;
	}

	/**
	 * Initialisation des activitÃ©s conjointes(enfant) avec seulement les informations utiles.
	 *
	 * @param array $arrayDB
	 */
	public function initActiConjointes($arrayDB) {
		$this->libelle2 = $arrayDB['libelle2'];
		$this->id = $arrayDB['activityId'];
		$this->name = $arrayDB['nameAct'];
		$this->assistant = $arrayDB['assistant'];
		$this->communication = $arrayDB['comm'];
		$this->typeActivity = $arrayDB['typeActivity'];
		$this->typeActivityLibelle = $arrayDB['typeActivityLibelle'];
		$this->duration = $arrayDB['duration'];
		$this->weekLabel = $arrayDB['weekLabel'];
		$this->parentsId = array();
		$this->visible = true;
		$this->isCourseAdded = false;
	}

	/**
	 * VÃ©rifie si le cours est rajoutÃ© ou inscrit.
	 *
	 * @return boolean Si le cours est ajoutÃ©
	 */
	public function isCourseAdded() {
		if ($this->isJTAChild) {
			$result = false;
			/* @var $parent Activity */
			foreach ($this->JTAParents as $parent) {
				$result = $result || $parent->isCourseAdded();
			}

			return $result;
		} else if ($this->isVariantChild && isset($this->variantParent)) {
			return $this->variantParent->isCourseAdded();
		} else {
			return $this->isCourseAdded;
		}
	}

	/**
	 * Set si le cours est ajoutÃ©.
	 *
	 * @param boolean $isCourseAdded Si le cours est ajoutÃ©
	 */
	public function setIsCourseAdded($isCourseAdded) {
		$this->isCourseAdded = $isCourseAdded;
	}

	/**
	 * Get les groupes dont fait partie l'activitÃ©
	 *
	 * @return boolean[] Tableau des groupes
	 */
	public function getGroupes() {
		return $this->groupes;
	}

	/**
	 * Set les groupes d'une activitÃ©.
	 *
	 * @param array $groupes Tableau de groupes
	 */
	public function setGroupes($groupes) {
		$this->groupes = $groupes;
	}

	/**
	 * Ajoute un groupe Ã  une visibilitÃ© donnÃ©e
	 *
	 * @param string $groupe Le nom du groupe Ã  ajouter
	 * @param boolean $visible Si le groupe est visible
	 */
	public function addGroupe($groupe, $visible) {
		$this->groupes[$groupe] = $visible;
	}

	/**
	 * VÃ©rifie si l'activitÃ© est visible.
	 * Si l'activitÃ© est une enfant, elle regarde si l'un de ses parents est visible.
	 *
	 * @return boolean Si l'activitÃ© est visible
	 */
	public function isVisible() {
	/*	if ($this->isJTAChild) {
			$result = false;
			foreach ($this->JTAParents as $parent) {
				$result = $result || $parent->isVisible();
			}

			return $result;
		} else if ($this->isVariantChild && isset($this->variantParent)) {
			return $this->variantParent->isVisible();
		} else {
			return $this->visible;
		}*/
		return $this->visible;
	}

	/**
	 * Set la visibilitÃ© de l'activitÃ©.
	 *
	 * @param boolean $visible Si l'activitÃ© doit Ãªtre visible
	 */
	public function setVisible($visible) {
		$this->visible = $visible;
	}

	/**
	 * Get si l'activitÃ© est un parent de variante.
	 *
	 * @return boolean Si l'activitÃ© est un parent de variante
	 */
	public function isVariantParent() {
		return $this->isVariantParent;
	}

	/**
	 * Set si l'activitÃ© est un parent de variante.
	 *
	 * @param boolean $isVariantParent Si l'activitÃ© est un parent de variante
	 */
	public function setIsVariantParent($isVariantParent) {
		$this->isVariantParent = $isVariantParent;
	}

	/**
	 * Get si l'activitÃ© est un enfant de variante.
	 *
	 * @return boolean Si l'activitÃ© est un enfant de variante
	 */
	public function isVariantChild() {
		return $this->isVariantChild;
	}

	/**
	 * Set si l'activitÃ© est un enfant de variante.
	 *
	 * @param boolean $isVariant Si l'activitÃ© est un enfant de variante
	 */
	public function setIsVariantChild($isVariant) {
		$this->isVariantChild = $isVariant;
	}

	/**
	 * Get si l'activitÃ© est un enfant de conjointe.
	 *
	 * @return boolean Si l'activitÃ© est un enfant de conjointe
	 */
	public function isJTAChild() {
		return $this->isJTAChild;
	}

	/**
	 * Set si l'activitÃ© est un enfant de conjointe.
	 *
	 * @param boolean $isJTAChild Si l'activitÃ© est un enfant de conjointe
	 */
	public function setIsJTAChild($isJTAChild) {
		$this->isJTAChild = $isJTAChild;
	}

	/**
	 * Get si l'activitÃ© est un parent de conjointe.
	 *
	 * @return boolean Si l'activitÃ© est un parent de conjointe
	 */
	public function isJTAParent() {
		return $this->isJTAParent;
	}

	/**
	 * Get les conjointes parents.
	 *
	 * @return Activity[]
	 */
	public function getJTAParents() {
		return $this->JTAParents;
	}

	/**
	 *
	 * @param boolean $isParent
	 */
	public function setIsJTAParent($isParent) {
		$this->isJTAParent = $isParent;
	}

	/**
	 * Get la variante parent.
	 *
	 * @return Activity[]
	 */
	public function getVariantParent() {
		return $this->variantParent;
	}

	/**
	 * Get la conjointes enfant.
	 *
	 * @return Activity[]
	 */
	public function getJTAChild() {
		return $this->JTAChild;
	}

	/**
	 * Get les variantes enfants.
	 *
	 * @return Activity[]
	 */
	public function getVariantChildren() {
		return $this->variantChildren;
	}

	/**
	 * Ajoute une activitÃ© en tant que parent de conjointe.
	 *
	 * @param Activity $JTAParent L'activitÃ© Ã  ajouter
	 */
	public function addJTAParent(Activity $JTAParent) {
		$this->JTAParents[$JTAParent->getId()] = $JTAParent;
	}

	/**
	 * Retire un parent de conjointe.
	 *
	 * @param string $id L'id de l'activitÃ© Ã  retirer
	 */
	public function removeJTAParent($id) {
		if (isset($this->JTAParents[$id])) {
			unset($this->JTAParents[$id]);
		}
	}

	/**
	 * Ajoute une activitÃ© en tant qu'enfant de variante.
	 *
	 * @param Activity $variantChild L'activitÃ© Ã  ajouter
	 */
	public function addVariantChild(Activity $variantChild) {
		$this->variantChildren[$variantChild->getId()] = $variantChild;
	}

	/**
	 * Retire un enfant de variante.
	 *
	 * @param string $id L'id de l'activitÃ© Ã  retirer
	 */
	public function removeVariantChild($id) {
		if (isset($this->variantChildren[$id])) {
			unset($this->variantChildren[$id]);
		}
	}

	/*public function setJTAParents($JTAParents) {
		$this->JTAParents = $JTAParents;
	}*/

	/*public function setVariantChildren($variantChildren) {
		$this->variantChildren = $variantChildren;
	}*/

	/**
	 * Set l'activitÃ© variante parent.
	 *
	 * @param Activity $variantParent L'activitÃ© variante parent
	 */
	public function setVariantParent($variantParent) {
		$this->variantParent = $variantParent;
	}

	/**
	 * Set l'activitÃ© conjointe enfant.
	 *
	 * @param Activity $JTAChild L'activitÃ© conjointe enfant
	 */
	public function setJTAChild($JTAChild) {
		$this->JTAChild = $JTAChild;
	}

	/**
	 * Get le libelle du type d'activitÃ©.
	 *
	 * @return string Le libelle du type d'activitÃ©
	 */
	public function getTypeActivityLibelle() {
		return $this->typeActivityLibelle;
	}

	/**
	 * Get la couleur de l'activitÃ© dans la grille.
	 *
	 * @return string La couleur de l'activitÃ©
	 */
	public function getColor() {
		return $this->color;
	}

	/**
	 * Set la couleur de l'activitÃ©.
	 * Si aucune couleur n'est donnÃ©e, elle prendra la couleur par dÃ©faut selon son type.
	 *
	 * @param string $color La couleur Ã  donner, NULL par dÃ©faut.
	 */
	public function setColor($color = NULL) {
		$this->color = (!isset($color) ? static::getColorType($this->typeActivity) : $color);
	}

	/**
	 * Get des semaines de l'activitÃ© sous forme de texte.
	 *
	 * @return string Les semaines de l'activitÃ© sous forme de texte
	 */
	public function getWeekLabel() {
		return $this->weekLabel;
	}

	/**
	 * RÃ©cupÃ¨re les mnÃ©moniques des cours de l'activitÃ©.
	 * Si l'activitÃ© est une enfant, elle prend les mnÃ©mos des cours des activitÃ©s parents.
	 *
	 * @return string[] Les mnÃ©moniques des cours de l'activitÃ©
	 */
	public function getCourseMnemo() {
		if ($this->isJTAChild) {
			$courseMnemos = array();
			/* @var $parent Activity */
			foreach ($this->JTAParents as $parent) {
				$courseMnemos = array_unique(array_merge($courseMnemos, $parent->getCourseMnemo()));
			}

			return $courseMnemos;
		} else if ($this->isVariantChild && isset($this->variantParent)) {
			return $this->variantParent->getCourseMnemo();
		} else if ($this->visible && isset($this->courseMnemo)) {
			return array($this->courseMnemo);
		} else {
			return array();
		}
	}

	/**
	 * Set le mnÃ©monique du cours de l'activitÃ©.
	 *
	 * @param string $mnemo Le mnÃ©monique du cours
	 */
	public function setCourseMnemo($mnemo) {
		$this->courseMnemo = $mnemo;
	}

	/**
	 * RÃ©cupÃ¨re les noms des cours de l'activitÃ©.
	 * Si l'activitÃ© est une enfant, elle prend les noms des cours des activitÃ©s parents.
	 *
	 * @return string[] Les noms des cours de l'activitÃ©
	 */
	public function getCourseName() {
		if ($this->isJTAChild) {
			$courseName = array();
			/* @var $parent Activity */
			foreach ($this->JTAParents as $parent) {
				$courseName = array_unique(array_merge($courseName, $parent->getCourseName()));
			}

			return $courseName;
		} else if ($this->isVariantChild && isset($this->variantParent)) {
			return $this->variantParent->getCourseName();
		} else if ($this->visible && isset($this->courseName)) {
			return array($this->courseName);
		} else {
			return array();
		}
	}

	/**
	 * ConcatÃ¨ne les mnÃ©mos et les noms des cours de l'activitÃ© en un seul string.
	 *
	 * @return string Le string contenant tout
	 */
	public function getFullCourseName() {
		$mnemos = $this->getCourseMnemo();
		$names = $this->getCourseName();

		$fullName = '';
		for ($i = 0; $i < count($mnemos); ++$i) {
			$fullName .= $names[$i] . ' [' . $mnemos[$i] . "],\n";
		}
		if ($fullName == '') {
			return '';
		}

		return substr($fullName, 0, -2);
	}

	/**
	 * Set le nom du cours de l'activitÃ©.
	 *
	 * @param string $name Le nom du cours
	 */
	public function setCourseName($name) {
		$this->courseName = $name;
	}

	/**
	 * Get le nom de l'enseignant.
	 *
	 * @return string[] Le nom de l'enseignant
	 */
	public function getStaff() {
		return $this->staff;
	}

	/**
	 * Set le nom de l'enseignant.
	 *
	 * @param string $staff Le nom de l'enseignant
	 */
	public function setStaff($staff) {
		$this->staff = $staff;
	}

	/**
	 * Get le type de l'activitÃ©.
	 *
	 * @return string Le type de l'activitÃ©
	 */
	public function getTypeActivity() {
		return $this->typeActivity;
	}

	/**
	 * Get le campus.
	 *
	 * @return string Le campus
	 */
	public function getCampus() {
		return $this->campus;
	}

	/**
	 * Set le campus.
	 *
	 * @param string $campus Le campus
	 */
	public function setCampus($campus) {
		$this->campus = $campus;
	}

	/**
	 * Get une concatÃ©nation des locaux de l'activitÃ©.
	 *
	 * @return string Le string concatÃ©nÃ©
	 */
	public function getLocals($iCal = NULL) {
		return !isset($iCal) ? implode(', ', $this->locals) : implode('\, ', $this->locals);
		//return implode(', ', $this->locals);
	}

	/**
	 * Ajoute un local Ã  l'activitÃ©.
	 *
	 * @param string $local Le local Ã  ajouter
	 */
	public function addLocal($local) {
		if (array_search($local, $this->locals) === false) {
			$this->locals[] = $local;
		}
	}

	/**
	 * Get l'assistant.
	 *
	 * @return string L'assistant
	 */
	public function getAssistant() {
		return $this->assistant;
	}

	/**
	 * Get la communication.
	 *
	 * @return string La communication
	 */
	public function getCommunication() {
		return $this->communication;
	}

	/**
	 * Get l'ID de l'activitÃ©.
	 *
	 * @return string L'ID
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Get le libellÃ© du cours de l'activitÃ©.
	 *
	 * @return string Le libellÃ©.
	 */
	public function getLibelle2() {
		return $this->libelle2;
	}

	/**
	 * Get le nom de l'activitÃ©.
	 *
	 * @return string Le nom de l'activitÃ©
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Get l'heure de dÃ©but de l'activitÃ©.
	 *
	 * @return DateTime L'heure du dÃ©but de l'activitÃ©
	 */
	public function getHeureDebut() {
		return $this->heureDebut;
	}

	/**
	 * Set l'heure de dÃ©but de l'activitÃ©.
	 *
	 * @param DateTime $heureDebut L'heure du dÃ©but de l'activitÃ©
	 */
	public function setHeureDebut($heureDebut) {
		$this->heureDebut = $heureDebut;
	}

	/**
	 * Get l'heure de fin de l'activitÃ©.
	 *
	 * @return DateTime L'heure de la fin de l'activitÃ©
	 */
	public function getHeureFin() {
		return $this->heureFin;
	}

	/**
	 * Set l'heure de fin de l'activitÃ©.
	 *
	 * @param DateTime $heureFin L'heure de la fin de l'activitÃ©
	 */
	public function setHeureFin($heureFin) {
		$this->heureFin = $heureFin;
	}

	/**
	 * Get les dates de l'activitÃ©.
	 *
	 * @return DateTime[] Les dates de l'activitÃ©
	 */
	public function getDatesActivity() {
		return $this->datesActivity;
	}

	/**
	 * Set les dates de l'activitÃ©.
	 *
	 * @param DateTime[] $dates Les dates de l'activitÃ©
	 */
	public function setDatesActivity($dates) {
		$this->datesActivity = $dates;
	}

	/**
	 * Get les semaines de l'activitÃ©.
	 *
	 * @return DateTime[] Les semaines de l'activitÃ©
	 */
	public function getWeeks() {
		return $this->weeks;
	}

	/**
	 * Ajoute une semaine Ã  l'activitÃ©.
	 *
	 * @param DateTime $week La semaine Ã  ajouter
	 */
	public function addWeek($week) {
		if (array_search($week, $this->weeks) === false) {
			$this->weeks[] = $week;
		}
	}

	/**
	 * Get les jours de la semaine (de 0 Ã  5) oÃ¹ a lieu l'activitÃ©.
	 *
	 * @return int[] Les jours de la semaine (de 0 Ã  5) oÃ¹ a lieu l'activitÃ©
	 */
	public function getWeekDays() {
		return $this->weekDays;
	}

	/**
	 * Ajoute un jour de la semaine Ã  l'activitÃ©.
	 *
	 * @param int $weekDay Le jour Ã  ajouter
	 */
	public function addWeekDay($weekDay) {
		if (array_search($weekDay, $this->weekDays) === false) {
			$this->weekDays[] = $weekDay;
		}
	}

	/**
	 * Get la durÃ©e de l'activitÃ©, en nombre de pÃ©riode.
	 *
	 * @return int La durÃ©e de l'activitÃ©
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Get la pÃ©riode de dÃ©but de l'activitÃ©.
	 *
	 * @return int La pÃ©riode de dÃ©but de l'activitÃ©
	 */
	public function getPeriodeDebut() {
		return $this->periodeDebut;
	}

	/**
	 * Set la pÃ©riode de dÃ©but de l'activitÃ©.
	 *
	 * @param int $periodeDebut La pÃ©riode de dÃ©but de l'activitÃ©
	 */
	public function setPeriodeDebut($periodeDebut) {
		$this->periodeDebut = $periodeDebut;
	}

	/**
	 * Get la pÃ©riode de fin de l'activitÃ©.
	 *
	 * @return int La pÃ©riode de fin de l'activitÃ©
	 */
	public function getPeriodeFin() {
		return $this->periodeFin;
	}

	/**
	 * Set la pÃ©riode de fin de l'activitÃ©.
	 *
	 * @param int $periodeFin La pÃ©riode de fin de l'activitÃ©
	 */
	public function setPeriodeFin($periodeFin) {
		$this->periodeFin = $periodeFin;
	}

	/**
	 * Get le nombre par lequel il faudra diviser l'activity dans la grille.
	 *
	 * @return int Le nombre par lequel il faudra diviser l'activity dans la grille
	 */
	public function getDiviseur() {
		return $this->diviseur;
	}

	/**
	 * Set le nombre par lequel il faudra diviser l'activity dans la grille.
	 *
	 * @param int $diviseur Le nombre par lequel il faudra diviser l'activity dans la grille
	 */
	public function setDiviseur($diviseur) {
		$this->diviseur = $diviseur;
	}

	/**
	 * RÃ©cupÃ¨re la couleur correspondant Ã  un type d'activitÃ© donnÃ©.
	 *
	 * @param string $activityType Le type d'activitÃ©
	 * @return string La couleur
	 */
	public static function getColorType($activityType) {
		if (isset($GLOBALS['activities_style'][$activityType])) {
			return $GLOBALS['activities_style'][$activityType];
		} else {
			return $GLOBALS['activities_style']['default'];
		}
	}

}
