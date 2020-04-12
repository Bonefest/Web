
<!DOCTYPE html>
<html>
	<head>
	
		<title>PHP basics</title>
	
	</head>
	
	<body>
		<?php
			function line($title) {
				echo <<<CFG
					<div style="border: 1px solid;margin-top:1px"></div>
					<h3>$title</h3>
				CFG;
			}


			#Variables---------------------------------------------------------
			line("Variables");
			{
				//Global variables
				$globalA = 3;		
				$globalB = '10';

				function pass() {
					$passLocal = 13.4;
					echo nl2br('function pass $passLocal = '.$passLocal."\n");	//concatenation
				}

				function static_pass() {
					static $counter = 0;
					echo nl2br('static_pass call #'.++$counter."\n");

				}

				echo nl2br($globalA + $globalB . "\n");
				echo nl2br($globalB + $globalA . "\n");
				echo nl2br($globalA . $globalB . "\n");

				pass();
				for($i = 0; $i < 10; $i++)
					static_pass();
			}

			#Operators---------------------------------------------------------
			line("Operators");
			{
				$varInt = 10;
				$varFloat = 10.0;
				$varStr = "10";
				$varStr2 = "10";

				echo nl2br('$varInt == $varFloat: '.json_encode($varInt == $varFloat)."\n");
				echo nl2br('$varFloat == $varStr: '.json_encode($varFloat == $varStr)."\n");
				echo nl2br('$varStr == $varInt: '.json_encode($varStr == $varInt)."\n");

				echo nl2br('$varInt === $varFloat: '.json_encode($varInt === $varFloat)."\n");
				echo nl2br('$varFloat === $varStr: '.json_encode($varFloat === $varStr)."\n");
				echo nl2br('$varStr === $varInt: '.json_encode($varStr === $varInt)."\n");
				echo nl2br('$varStr === $varStr2: '.json_encode($varStr === $varStr2)."\n");

				
			}

			#Arrays------------------------------------------------------------
			line("Arrays");
			{	
				echo nl2br("Indexed array\n");
				$integers = array();
				for($i = 0;$i < 10; ++$i) {
					array_push($integers, $i);
				}

				print_r($integers);

				echo nl2br("\n\nMap\n");

				$data = array();
				$data["apple"] = 19;
				$data["pineapple"] = "text";
				$data[10] = 33;

				print_r($data);
			}


			#Singleton---------------------------------------------------------
			line("Singleton");
			{
				class Singleton {

					public static function getInstance() {
						static $inst = null;
						if($inst == null) {
							$inst = new Singleton();
						}
						return $inst;
					}

					public function test() {
						echo nl2br("Singleton function\n");
					}

					private function __construct() {
						echo nl2br("Singleton created\n");
					}

					private function __clone() {

					}

					private function __wakeup() {


					}
				}

				Singleton::getInstance()->test();
				Singleton::getInstance()->test();
				Singleton::getInstance()->test();
				Singleton::getInstance()->test();
				

			}
		?>
	</body>
</html>
