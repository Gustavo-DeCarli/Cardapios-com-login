const baseUrl = `//localhost/pw3/lib/`

let modal = null
let btnSalvar1 = null
let btnAlterar1 = null
let btnSalvar2 = null
let btnAlterar2 = null
let btnSalvar3 = null
let btnAlterar3 = null

onload = async () => {
    modal = new bootstrap.Modal(document.getElementById('exampleModal1'))
    btnSalvar1 = document.getElementById("salvar1")

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
        modal.hide();
    })

    modal = new bootstrap.Modal(document.getElementById('exampleModal2'))
    btnSalvar2 = document.getElementById("salvar2")

    btnSalvar2.addEventListener("click", async () => {
        const item = document.getElementById("item").value
        const calorias = document.getElementById("calorias").value

        const body = new FormData()
        body.append('item', item)
        body.append('calorias', calorias)

        const response = await fetch(`${baseUrl}salvaritem.php`, {
            method: "POST",
            body
        })
        modal.hide();
    })
}
