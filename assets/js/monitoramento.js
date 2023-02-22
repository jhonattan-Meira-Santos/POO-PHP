//Atualiza a tela a cada 10 segundos
$( document ).ready(function() {
    function getData() {
        $.ajax
        ({
            type: 'GET', //Método => POST | GET
            dataType: 'html', //Tipo de retorno da página
            url: './action/ajaxAtualizaDados.php', 
            beforeSend: function(){
            },
            success: function(data){
                $('#cartoes').html(data);

                const iconesHeader = data.split("|");

                //Implementação do icone cinza
                if(typeof iconesHeader[1] !== 'undefined'){
                    $('#icone-cinza').html(iconesHeader[1]);
                }

                //Implementação do icone laranja
                if(typeof iconesHeader[2] !== 'undefined'){
                    $('#icone-laranja').html(iconesHeader[2]);
                }
            },
            error: function(){
                console.log("Ocorreu um erro durante a atualização! Não se preocupe, o processo ocorrerá novamente mais tarde. =)");
            },
            complete: function(){
                setInterval(getData, 1000000000);
                // setInterval(getData, 10000);
            }
        })
    }
    getData();
});