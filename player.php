<?php
	class Player {
		private $name;
		private $gp;
		private $fgp;
		private $tpp;
		private $ftp;
		private $ppg;

		public function __construct($statsArray) {
			$this->name = $statsArray['playerName'];
			$this->gp = $statsArray['gp'];
			$this->fgp = $statsArray['fgp'];
			$this->tpp = $statsArray['tpp'];
			$this->ftp = $statsArray['ftp'];
			$this->ppg = $statsArray['ppg'];
		}

		public function getPlayerName() {
			return $this->name;
		}

		public function getPlayerGP() {
			return $this->gp;
		}

		public function getPlayerFGP() {
			return $this->fgp;
		}

		public function getPlayerTPP() {
			return $this->tpp;
		}

		public function getPlayerFTP() {
			return $this->ftp;
		}

		public function getPlayerPPG() {
			return $this->ppg;
		}
	}
?>