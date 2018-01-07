<?php 

	function getTitle(){
		global $pageTitle;

		if(isset($pageTitle)){
			echo $pageTitle;
		}
		else{
			echo "Default";
		}
	}
	function getHeader(){
		global $pageHeader;

		if(isset($pageHeader)){
			echo $pageHeader;
		}
		else{
			echo "";
		}
	}