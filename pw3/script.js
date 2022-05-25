const baseUrl = `//localhost/pw3/lib/`

let modal1 = null
let modal2 = null
let modal3 = null
let btnSalvar1 = null
let btnAlterar1 = null
let btnSalvar2 = null
let btnAlterar2 = null
let btnSalvar3 = null
let btnAlterar3 = null

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
    })

    btnSalvar3 = document.getElementById("salvar3")

    btnSalvar3.addEventListener("click", async () => {
        
        const nome = document.getElementById("nome").value
        const tipo = document.getElementById("tipo").value
        const data = document.getElementById("data").value

        const body = new FormData()
        body.append('nome', nome)
        body.append('tipo', tipo)
        body.append('data', data)

        const response = await fetch(`${baseUrl}salvarcardapio.php`, {
            method: "POST",
            body
        })
        modal3.hide();
    })
}
