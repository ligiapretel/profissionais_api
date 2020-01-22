let form = document.getElementById('form');

form.onsubmit = (event)=>{
// Para não deixar a página atualizar quando envio o form, coloco uma função chamada preventDefault, que não deixa a página ser atualizada    
    event.preventDefault();

    // para pegar os dados que estão sendo enviados no IDBOpenDBRequest, uso o value.
    let professionalName = document.getElementById('name').value;

    let professionalGithub = document.getElementById('github').value;

    // Configurando o fetch (para criar um novo objeto no JS, coloc0 {})
    let config = {
        // informando que o método será post
        method: "post",
        // convertendo as infos do body para json
        body: JSON.stringify({name:professionalName, github:professionalGithub})
    }
    // No fetch, eu passo como parâmetro as configurações que fiz acima
    fetch('http://localhost:8000/api/profissionais',config)
    .then(function(resposta){
        return resposta.json();
    }).then(function(json){
        console.log(json);
    })

}