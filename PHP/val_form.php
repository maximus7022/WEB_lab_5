<?php
	class User 
	{
		protected $pib;
		protected $birthday;

		function __construct($pib, $birthday)
		{
			$this->pib = $pib;
			$this->birthday = $birthday;
		}

		function getPib()
		{
			echo ("ПIБ: $this->pib</br>");
		}

		function getBirth()
		{
			echo ("Рік народження: $this->birthday</br>");
		}

		function getAgeFromBirth() {

	  			$age = date('Y') - $this->birthday;
	  			echo ("Вік: $age</br>");
		}
	}

	class Student extends User
	{
		private $group;
		private $specialty;
		private $email;

		function __construct($pib, $birthday, $group, $specialty, $email)
		{
			parent::__construct($pib, $birthday);
			$this->group = $group;
			$this->specialty = $specialty;
			$this->email = $email;
		}

		function getGroup()
		{
			echo ("Група: $this->group</br>");
		}

		function getSpecialty()
		{
			echo ("Спеціальність: $this->specialty</br>");
		}

		function getEmail()
		{
			echo ("Email: $this->email");
		}
	}

	$student = $_POST['student'];
	$birthday = $_POST['birthday'];
	$group = $_POST['group'];
	$specialty = $_POST['specialty'];
	$email = $_POST['email'];

	if($student == '')
	{
		echo 'Виникла помилка:</br>Поле ПІБ пусте';
		return;
	}

	if($group == '')
	{
		echo 'Виникла помилка:</br>Поле Група пусте';
		return;
	}

	if($birthday == '')
	{
		echo 'Виникла помилка:</br>Поле Дата Народження пусте';
		return;
	}

	if($birthday <=1960 || $birthday >= 2003)
	{
		echo 'Виникла помилка:</br>Недопустимий рік народження';
		return;
	}

	if($specialty == '')
	{
		echo 'Виникла помилка:</br>Поле Спеціальність пусте';
		return;
	}

	if($email == '')
	{
		echo 'Виникла помилка:</br>Поле Email пусте';
		return;
	}

	else {
	    $obj = new Student($student, $birthday, $group, $specialty, $email);

	    echo "Дані успішно оброблені сервером:</br>";
		$obj->getPib();
		$obj->getBirth();
		$obj->getAgeFromBirth();
		$obj->getGroup();
		$obj->getSpecialty();
		$obj->getEmail();
	}
?>