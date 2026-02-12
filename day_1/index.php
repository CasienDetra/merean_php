<!DOCTYPE html>
<html>

<head>
	<style>
		body {
			background-color: black;
			color: white;
		}
	</style>

<body>

	<?php
	class person
	{
		public	$name;
		public 	$age;
		public	$gender;
		public function set_detail($name, $age, $gender)
		{
			$this->name = $name;
			$this->age = $age;
			$this->gender = $gender;
		}
		function get_detail()
		{
			echo "name: " . $this->name . "\nage: " . $this->age . "\ngender:" . $this->gender;
		}
	}
	class teacher extends person {}

	$p = new person();
	$p->set_detail('yanouk', 11, 'male');
	$p->get_detail();
	?>

</body>

<head>

</html>
