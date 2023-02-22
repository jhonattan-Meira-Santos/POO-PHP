<?php
    /* Retorna os dados da tabela via ajax */
    require_once("../classe/Conexao.php");
    require_once("../classe/Ramais.php");
    $ramais = new Ramais();

    $ramaisAlterados = (array) json_decode($ramais->getRamais(), true);
    foreach($ramaisAlterados as $infoRamais):
        $online = $infoRamais['online'] === true ? 'Online' : 'Offline';

        $dataStatus = "{$online}-{$infoRamais['status']}";

        echo "
        <tr>
            <td data->". $infoRamais['nome']   ."</td>
            <td>". $infoRamais['ramal']  . "</td>
            <td>". $online . "</td>
            <td data-status='$dataStatus'>". $infoRamais['status'] . "</td>
        </tr>";
        
        //Verificação para ativação dos icones do cabeçalho
        if($infoRamais['status'] == 'pausa'){
            $iconeLaranja = true;
        }
        else if($infoRamais['status'] == 'indisponivel' && $online == 'Offline'){
            $iconeCinza = true;
        }
    endforeach;
    if(isset($iconeCinza)) echo " | <div class='icone-posicao iconeCinza piscar'></div>";
    if(isset($iconeLaranja)) echo " | <div class='icone-posicao iconeLaranja piscar'></div>";
?>