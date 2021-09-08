var Clickbutton = document.querySelectorAll('.button')
var carrito = [];
var tbody= document.querySelector('.tbody');
console.log(Clickbutton);

Clickbutton.forEach(btn =>{
    btn.addEventListener('click', addToCarritoItem)
})

function addToCarritoItem(e){
    const button = e.target
    const item = button.closest('.carta');
    const itemTitle = item.querySelector('.title').textContent;
    const itemPrice = item.querySelector('.precio').textContent;
    const itemImg = item.querySelector('.imagen').src;
    const newItem = {
        title: itemTitle,
        precio: itemPrice,
        img: itemImg,
        cantidad: 1
    }
    addItemCarrito(newItem);
}

function addItemCarrito(newItem){

    const InputElemento = tbody.getElementsByClassName('elemento');
    for(let i=0; i< carrito.length; i++){
        if(carrito[i].title.trim() === newItem.title.trim()){
            //carrito[i].cantidad++;
            //const inputValue= InputElemento[i];
            //inputValue.value++;
            //CarritoTotal()
            alert('No se puede agregar el mismo producto');
            return null;
        }
    }

    carrito.push(newItem)

    renderCarrito()
}

function renderCarrito(){
    tbody.innerHTML= '';
    carrito.map(item =>{
        const tr = document.createElement('tr')
        tr.classList.add('ItemCarrito')
        const Content = `
    <tr>
      <td><img style="width: 75px; height: 75px" src=${item.img} alt=""></td>
      <td><h6 class="title">${item.title}</h6></td>
      <td><p>${item.precio}</p></td>
      <td><input type="number" min="1" value=${item.cantidad} class="elemento">
      <button class="delete btn btn-danger ">x</button></td>
    </tr>`
        tr.innerHTML = Content;
        tbody.append(tr);

        tr.querySelector(".delete").addEventListener('click', removeItemCarrito)
        tr.querySelector(".elemento").addEventListener('change', sumaCantidad)
    })
    CarritoTotal();
}

function CarritoTotal(){
    let total =0;
    const itemCartTotal = document.querySelector(".itemCarTotal");
    carrito.forEach((item) =>{
        const precio = Number(item.precio.replace("$", ''))
        total = total + precio*item.cantidad;
    })
    itemCartTotal.innerHTML = `Total: $${total}`
    addLocalStorage();
}

function removeItemCarrito(e){
    const buttonDelete = e.target
    const tr = buttonDelete.closest(".ItemCarrito")
    const title = tr.querySelector('.title').textContent;
    for(let i=0; i<carrito.length; i++){
        if(carrito[i].title.trim() === title.trim()){
            carrito.splice(i, 1)
        }
    }
    tr.remove()
    CarritoTotal();
}
function sumaCantidad(e){
    const sumaInput = e.target
    const tr = sumaInput.closest(".ItemCarrito")
    const title = tr.querySelector('.title').textContent;
    carrito.forEach(item =>{
        if(item.title.trim() === title){
            sumaInput.value < 1 ? (sumaInput.value =1):sumaInput.value;
            item.cantidad = sumaInput.value;
            CarritoTotal();
        }
    })
}

function addLocalStorage(){
    localStorage.setItem('carrito', JSON.stringify(carrito))
}

window.onload = function(){
    const storage = JSON.parse(localStorage.getItem('carrito'));
    if(storage){
        carrito = storage;
        renderCarrito();
    }
}

function comprar(){
    Swal.fire(
        'Está listo!',
        'Tu pedido esta en camino!',
        'success'
      )
}