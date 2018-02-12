<?php
class User {
    private $id;
    private $email;
    private $password;
    private $role;
	private $firstname;
	private $lastname;
	private $dob;
	private $location;
	private $gender;

    public function __construct($i, $eml, $pwd, $r,  $fnm, $lnm, $dob, $lctn, $gndr) {
        $this->id = $i;
        $this->email = $eml;
        $this->password = $pwd;
        $this->role = $r;
        $this->firstname = $fnm;
        $this->lastname = $lnm;
        $this->dob = $dob;
		$this->location = $lctn;
        $this->gender = $gndr;
    }
    public function getId() { return $this->id; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRole() { return $this->role; }
    public function getFirstName() { return $this->firstname; }
    public function getLastName() { return $this->lastname; }
    public function getDOB() { return $this->dob; }
	public function getLocation() { return $this->location; }
    public function getGender() { return $this->gender; }

    public function setId($i) { $this->id = $i; }
    public function setEmail($n) { $this->email = $n; }
    public function setPassword($p) { $this->password = $p; }
    public function setRole($r) { $this->role = $r; }
    public function setFirstName($fn) { return $this->$fn; }
    public function setLastName($ln) { return $this->$ln; }
    public function setDOB($d) { return $this->$d; }
	public function setLocation($loc) { return $this->$loc; }
    public function setGender($gen) { return $this->$gen; }
}
?>
