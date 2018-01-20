<?php

	class LOGICA {

		private $proposition;
		private $p;
		private $q;

		

		function __construct( $x , $y ){

			if($this->p){

			}
			else{
			LOGICA::setValueP( $x );
			}

			LOGICA::setValueQ( $y );

		}//constructor

		public function f_and($r){

			LOGICA::setValueQ($r);

			if( $this->proposition ){
				//later on I want to combine results as in a normal calculator, where you take the last result and continue using different operations. maybe this is not the way to do it but I will not delete this part.
				$this->proposition *= LOGICA::getValueQ();   

			}
			else{

				$this->proposition= LOGICA::getValueP() * LOGICA::getValueQ();

			}//endif

		} 

		public function f_or($r){

			LOGICA::setValueQ($r);

			if( $this->proposition ){

				$this->proposition += LOGICA::getValueQ();   

			}
			else{

				$this->proposition= LOGICA::getValueP() + LOGICA::getValueQ();

			}//endif

		} 

		public function f_xor($r){

			LOGICA::setValueQ($r);

			if( $this->proposition ){

				$this->proposition += LOGICA::getValueQ();   

			}
			else{

				$this->proposition= LOGICA::getValueP() - LOGICA::getValueQ();

			}//endif

		} 

		public function setValueP( $l ){


			$this->p = $l;
		}

		public function getValueP(){

			return $this->p;
		}

		public function setValueQ( $m ){
			
			$this->q = $m;
		}

		public function getValueQ(){
			
			return $this->q;
		}

		public function getResult(){

			return $this->proposition;
		}

	}//endclass

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Logic Calculator</title>
		<link rel="stylesheet" href="./styles/style_1">
	</head>
	<body>
		

	<section id="frame">

		<h1>Logic Calculator</h1>

		<form action="" method="POST" >
			
			<select name="n_p">
				<option value="1" >True</option>
				<option value="0" >False</option>
			</select>

			<select name="n_operation" >
				<option value="and">AND</option>
				<option value="or">OR</option>
				<option value="xor">XOR</option>
			</select>


			<select name="n_q">
				<option value="1" >True</option>
				<option value="0" >False</option>
			</select>

			<input type="submit" value=" = ">

			<section id="result">

<?php

	error_reporting(E_ALL ^ E_NOTICE);

		$prop_p;
		
		$prop_p = $_POST['n_p'];
		settype($porp_p, 'bool');

		$prop_q;
		
		$prop_q = $_POST['n_q'];
		settype($prop_q, 'bool');

		$operation = $_POST['n_operation'];


		$object1 = new LOGICA($prop_p, $prop_q);

		switch($operation){

			case 'and':
					$object1->f_and($prop_q);
			break;

			case 'or':
					$object1->f_or($prop_q);
			break;

			case 'xor':
					$object1->f_xor($prop_q);
			break;

			default:
				echo "no operation selected";
			break;

		}//endswitch



		if($object1->getValueP() == 0){ 
			echo "<h4 class='value' >FALSE</h4>";
			
		}
		else{
			echo "<h4 class='value' >TRUE</h4>";
			
		}//endif



		echo "<h4 class='value' > " .$operation ."</h4>";



		if($object1->getValueQ() == 0) { 

			echo "<h4 class='value'>FALSE</h4>";
			
		}
		else{
			echo "<h4 class='value'>TRUE</h4>";
			
		}//endif
	

		echo "<h3 class='value'>=</h3>";


		if( $object1->getResult() == 0 ){ 

			echo "<h4 class='value'>FALSE</h4>";
			
		}
		else{

		echo "<h4 class='value'>TRUE</h4>";
			
		}//endif

		//echo $object1->getResult();

		//echo var_dump($prop_q);
?>
			</section>
	</section>

	</body>
</html>