<?php
class PHPTelnet {

	var $pausa_tempo = 125000;
	var $login_pausa_tempo = 10000;

	var $fp = NULL;
	var $prompt;

	var $c1;
	var $c2;
	
	function conectar($ip,$porta,$usuario,$senha) {
		$rv = 0;
		if ($this->fp=fsockopen($ip,$porta)) {
			fputs($this->fp,$this->c1);
			$this->pausa();
			
			fputs($this->fp,$this->c2);
			$this->pausa();
			
			$this->retorno($r);
			$r = explode("\n",$r);
			$this->prompt = $r[count($r)-1];
			
			fputs($this->fp,"$usuario\r");
			$this->pausa();
			
			fputs($this->fp,"$senha\r");
			$this->pausa();
			
			$this->retorno($r);
			$r = explode("\n",$r);
			if (($r[count($r)-1]=='') || ($this->prompt==$r[count($r)-1])) {
				$rv = 2;
				$this->desconectar();
			}
		} else { 
			$rv = 1;
		}
		return $rv;
	}
	
	function desconectar() {
		if ($this->fp) {
			$this->comando('exit');
			fclose($this->fp);
			$this->fp = NULL;
		}
	}

	function comando($c,&$r) {
		if ($this->fp) {
			fputs($this->fp,"$c\r");
			$this->pausa();
			$this->retorno($r);
			$r = preg_replace("/^.*?\n(.*)\n[^\n]*$/","$1",$r);
		}
		return $this->fp?1:0;
	}
	
	function retorno(&$r) {
		$r = '';
		do { 
			$r .= fread($this->fp,1000);
			$s = socket_get_status($this->fp);
		} while ($s['unread_bytes']);
	}
	
	function pausa() {
		//usleep($this->pausa_tempo);
		sleep(1);
	}
	
	function PHPTelnet() {
		$this->c1 = chr(0xFF).chr(0xFB).chr(0x1F).chr(0xFF).chr(0xFB).chr(0x20).chr(0xFF).chr(0xFB).chr(0x18).chr(0xFF).chr(0xFB).chr(0x27).chr(0xFF).chr(0xFD).chr(0x01).chr(0xFF).chr(0xFB).chr(0x03).chr(0xFF).chr(0xFD).chr(0x03).chr(0xFF).chr(0xFC).chr(0x23).chr(0xFF).chr(0xFC).chr(0x24).chr(0xFF).chr(0xFA).chr(0x1F).chr(0x00).chr(0x50).chr(0x00).chr(0x18).chr(0xFF).chr(0xF0).chr(0xFF).chr(0xFA).chr(0x20).chr(0x00).chr(0x33).chr(0x38).chr(0x34).chr(0x30).chr(0x30).chr(0x2C).chr(0x33).chr(0x38).chr(0x34).chr(0x30).chr(0x30).chr(0xFF).chr(0xF0).chr(0xFF).chr(0xFA).chr(0x27).chr(0x00).chr(0xFF).chr(0xF0).chr(0xFF).chr(0xFA).chr(0x18).chr(0x00).chr(0x58).chr(0x54).chr(0x45).chr(0x52).chr(0x4D).chr(0xFF).chr(0xF0);
		$this->c2 = chr(0xFF).chr(0xFC).chr(0x01).chr(0xFF).chr(0xFC).chr(0x22).chr(0xFF).chr(0xFE).chr(0x05).chr(0xFF).chr(0xFC).chr(0x21);
	}
	
}

return;
?>