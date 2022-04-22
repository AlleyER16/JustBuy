<?php

	class Dbh{

		private const HOST_NAME = "localhost";
		private const USER_NAME = "root";
		private const PASSWORD = "";
		private const DATABASE_NAME = "justbuy";

		private const DSN = "mysql:host=".self::HOST_NAME.";dbname=".self::DATABASE_NAME;

		public function GetConnection(){

			$conn_object = new PDO(self::DSN, self::USER_NAME, self::PASSWORD);
			$conn_object->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			return $conn_object;

		}

		public function SanitizeVariable($variable){

			return htmlspecialchars(htmlentities(strip_tags($variable)));

		}

	}

?>
