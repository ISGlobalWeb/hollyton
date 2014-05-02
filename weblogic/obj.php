<?php
   class CatListObj {
		private $catId;
		private $catName;
		
		public function getCatId() { return $this->catId; } 
		public function getCatName() { return $this->catName; } 
		
		public function setCatId($x) { $this->catId = $x; } 
		public function setCatName($x) { $this->catName = $x; } 
   }
   
   class SubCatListObj {
		private $subCatId;
		private $subCatName;
		
		public function getSubCatId() { return $this->subCatId; } 
		public function getSubCatName() { return $this->subCatName; } 
		
		public function setSubCatId($x) { $this->subCatId = $x; } 
		public function setSubCatName($x) { $this->subCatName = $x; } 
   }
?>