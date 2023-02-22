<html lang="pt-br">
  <?php 
    require_once("./include/head.html"); 
  ?>

  <body>
    <div class="row title-painel">
      <h1>Painel de monitoramento de ramal</h1> 
      <div id='icones'>
        <div id='icone-laranja'></div>
        <div id='icone-cinza'></div>
      </div>
    </div>
    <div class="container">
      <div class="row">
      <table>
        <thead>
          <th>Nome</th>
          <th>Ramal</th>
          <th>Online</th>
          <th>Status</th>
        </thead>
        <tbody id="cartoes">

        </tbody>
      </table>
      </div>
    </div>
  <?php 
    require_once("./include/scripts.html");
  ?>
  </body>

</html>