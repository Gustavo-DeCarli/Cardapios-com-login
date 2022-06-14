const baseUrl = `//localhost/pw3-master/pw3/backend/lib/`

let modal1 = null
let modal2 = null
let modal3 = null
let btnSalvar1 = null
let btnSalvar2 = null
let btnSalvar3 = null
let btnapagar = null

onload = async () => {
    btnSalvar1 = document.getElementById("salvar1")
    modal1 = new bootstrap.Modal(document.getElementById('exampleModal1'))
    modal2 = new bootstrap.Modal(document.getElementById('exampleModal2'))
    modal3 = new bootstrap.Modal(document.getElementById('exampleModal3'))

    btnSalvar1.addEventListener("click", async () => {

        const ingrediente = document.getElementById("ingrediente").value
        const calorias = document.getElementById("calorias").value

        const body = new FormData()
        body.append('ingrediente', ingrediente)
        body.append('calorias', calorias)

        const response = await fetch(`${baseUrl}salvaringrediente.php`, {
            method: "POST",
            body
        })
        modal1.hide();
        window.location.href = "http://localhost/pw3-master/pw3/frontend/nutriform.php"
    })

    btnSalvar2 = document.getElementById("salvar2")

    btnSalvar2.addEventListener("click", async () => {

        const item = document.getElementById("item").value
        const calorias = document.getElementById("calorias1").value

        const body = new FormData()
        body.append('item', item)
        body.append('calorias1', calorias)

        const response = await fetch(`${baseUrl}salvaritem.php`, {
            method: "POST",
            body
        })
        console.log(modal2)
        modal2.hide();
        window.location.href = "http://localhost/pw3-master/pw3/frontend/nutriform.php"
    })

    btnSalvar3 = document.getElementById("salvar3")

    btnSalvar3.addEventListener("click", async () => {

        const itens = document.getElementsByName('itens')
        const ids = []
        itens.forEach(item => {
            if (item.value > 0)
                ids.push(+item.value)
        })

        console.log(ids)
        const nome = document.getElementById("nome").value
        const tipo = document.getElementById("tipo").value
        const data = document.getElementById("data").value

        const body = new FormData()
        body.append('nome', nome)
        body.append('tipo', tipo)
        body.append('data', data)
        body.append('itens', ids)

        console.log(body)
        console.log(ids, itens)

        const response = await fetch(`${baseUrl}salvarcardapio.php`, {
            method: "POST",
            body
        })
        modal3.hide();
        window.location.href = "http://localhost/pw3-master/pw3/frontend/nutriform.php"
    })


    btnapagar = [];
    btnapagar = document.querySelectorAll('[id^="apagar-"]')
    if (btnapagar.length > 0) {
        let arr = [];
        for (var i = 0; i < btnapagar.length; i++) {
            arr.push({
                'id': btnapagar[i].parentElement.parentNode.childNodes[0]['id'],
                'value': document.getElementById(btnapagar[i].parentElement.parentNode.childNodes[0]['id']).value
            });
        }
        btnapagar.forEach((item) => {
            item.addEventListener("click", async (event) => {
                const body = new FormData()
                const id = arr.find(function (item) {
                    return item.id === event.target.parentElement.parentNode.childNodes[0].id;
                })
                body.append("idcardapio", id.value)
                const response = await fetch(`${baseUrl}excluircardapio.php`, {
                    method: "POST",
                    body
                })
                window.location.href = "http://localhost/pw3-master/pw3/frontend/nutriform.php"
            })
            
        })
    }

    criarSelect()
}

const escolhidos = []

const criarSelect = async () => {

    const response = await fetch(`${baseUrl}listaItens.php`)
    const items = await response.json()

    const select = document.createElement('select')
    select.setAttribute('class', 'form-select')
    select.setAttribute('name', 'itens')
    select.addEventListener('change', async function () {
        escolhidos.push(+this.value)
        console.log(escolhidos)
        await criarSelect()
    })
    select.style.color = "black"
    const option = document.createElement("OPTION")
    option.setAttribute('value', -1)
    option.innerHTML = "Selecione"
    select.appendChild(option)
    items.forEach(({ id, descricao, calorias }) => {
        console.log(escolhidos.includes(id), id)
        if (!escolhidos.includes(id)) {
            const option = document.createElement("OPTION")
            option.setAttribute('value', id)
            option.innerHTML = `${descricao} (${calorias} cal)`
            select.appendChild(option)
        }
    })
    document.getElementById('form_produto').appendChild(select)
}





