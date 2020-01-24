let form = document.getElementById('form');

form.onsubmit = (event)=>{
// Para não deixar a página atualizar quando envio o form, coloco uma função chamada preventDefault, que não deixa a página ser atualizada    
    event.preventDefault();

    // para pegar os dados que estão sendo enviados no IDBOpenDBRequest, uso o value.
    let professionalName = document.getElementById('name').value;

    let professionalGithub = document.getElementById('github').value;

    let professionalTechnology = document.getElementById('technology').value;

    // Configurando o fetch (para criar um novo objeto no JS, coloc0 {})
    let config = {
        headers:{
            "Content-Type":"application/json"
        },
        // informando que o método será post (o fetch por padrão usa o método get)
        method: "post",
        // convertendo as infos do body para json dentro das chaves - name do input:valores do input
        body: JSON.stringify({name:professionalName, github:professionalGithub, technology:professionalTechnology})
    }
    // No fetch, eu passo como parâmetro as configurações que fiz acima
    fetch('http://localhost:8000/api/profissionais',config)
    .then(function(resposta){
        return resposta.json();
    }).then(function(json){
        console.log(json);
    }).catch(function(erro){
        console.log(erro);
    })
    // O catch é para exibir o erro da aplicação

}