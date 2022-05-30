<?php

$nome = (isset($_GET['nome'])) ? $_GET['nome'] : 'Comando';
$lista = (isset($_GET['lista'])) ? $_GET['lista'] : 'Escolha um comando';
$comando_input = (isset($_GET['comando'])) ? $_GET['comando'] : '';

$code = '';
$info = '&nbsp';

$nome_selecionado = "<option selected>$nome</option>";
$lista_selecionada = "<option selected>$lista</option>";
$comando = '';
if ($nome != 'Comando') {
  switch (true) {
    case ($nome == 'Lista'):
      $comando = " <select name='lista'>$lista_selecionada
        <option value='cd gpononu;show authorization slot all link all'>Lista ONU's autorizadas</option>
        <option value='cd gpononu;show unauth list'>Lista ONU's Não autorizadas</option>
        <option value='cd gpononu;show discovery slot all link all'>Lista ONU's Não autorizadas por descoberta</option>
        <option value='cd gpononu;set white phy addr FHTT039780a8 pas null ac add  sl 11 li 1 o 1 ty 5506-04-f1'>Autoriza ONU's</option>
        <option value='cd gponline;show optic_module_par slot 11 link 1'>Info Nível de sinal ONU's</option>
        <option value='cd gpononu;set whitelist phy_addr address FHTT039780a8 password null action delete'>Desautoriza ONU's</option>
        <option value='cd device;show port all'>Info portas de uplink</option> 
        <option value='cd service;show manage vlan all'>Info vlan's uplink</option>
        <option value='showcard'>Info placas</option>
        <option value='cd service;show snmp'>Info SNMP</option>
        <option value='cd service;show time_method'>Info Time Zone</option>
        <option value='cd service;show snmp_time_cfg'>Info Sync Time</option>
        <option value='cd service;show auto_save'>Info Auto Salvar e Redundância</option>
        <option value='cd service;show telnet acl'>Info Permissões de acesso Telnet</option>
        <option value='cd service;show acl'>Info Permissões de acesso TCP</option>
        <option value='cd device;set uplink port 19:2 enable;cd service;set manage vlan name GERENCIA vid 100 inputport 19:2 tagged;set manage vlan name GERENCIA ip 10.10.10.2/24 10.10.10.1;cd ..;set card_all_auth;set card_auth slot 21 type fan;set card_auth slot 24 type pwr;set card_auth slot 25 type pwr;cd service;set time_method snmp hour GMT-3 min 0;set snmp_time_cfg interval 3600 serv_addr 192.168.1.234;cd ..;set auto_save enable period 360 active_time hour 0 min 0;set save sync enable'>Configura Tudo</option>
        <option value='erase startup-config'>Apaga Tudo</option>
        <option value='save'>Salva configurações</option>
        </select>
      ";
      break;
    case ($nome == 'Livre'):
      $comando = " <input type='text' value='$comando_input' name='comando' size='70'>";
      break;
  }
}

if ($comando_input || $lista && $lista != 'Escolha um comando') {
  require_once "PHPTelnet.php";  
  $telnet = new PHPTelnet();
  $result = $telnet->Connect('10.0.2.3','GEPON','GEPON');
  $telnet->DoCommand('EN', $result);
  $telnet->DoCommand("GEPON", $result);
  $telnet->DoCommand("cd service", $result);
  $telnet->DoCommand("idle-timeout 0", $result);
  $telnet->DoCommand("terminal length 0", $result);
  if ($lista) {
    foreach (explode(';', $lista) as $input) {
      $telnet->DoCommand($input, $result);
    }
  }
  if ($comando_input) {
    foreach (explode(';', $comando_input) as $input) {
      $telnet->DoCommand($input, $result);
    }
  }
  $telnet->Disconnect();
  $code = $result;
}

echo "<!DOCTYPE html><html><head><title>Fiber Home</title><link rel='shortcut icon' href='.favicon.png'><link rel='stylesheet' href='./css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'></head><body><div style='background-color: #4682B4; overflow: hidden'><form name='chamados' action='fiberhome.php' method='GET'><img src='./fiberhome.png'/> <select name='nome'>$nome_selecionado<option>Lista</option><option>Livre</option></select>$comando <input type='submit' value='Executar'></form></div><div style='background-color: #B0C4DE; overflow: hidden'>$info</div>";
echo "<pre>$code</pre>";
echo "</code></script><style>body{background-color: #f5f2f9}</style></body></html>";
    
