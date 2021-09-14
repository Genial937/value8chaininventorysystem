$(".table").dataTable();

$(".spinner-border").css("display","none");

//dynamically load product prices when creating sale
function getPrice(id) {
    $(".spinner-border").css("display","block");
    axios.get('/sales/get-price/' + id)
        .then((response) => {
            let price = "";
            if(response.data){
                price = response.data.price;
                $(".spinner-border").css("display","none");
                document.getElementById("price-input").value = price;
            }
        })
        .catch((error) => {
            console.log(error);
        })
}

//calculate total price when creating sale
function updateTotal(){
    let price = $("#price-input").val();
    let quantity = $("#quantity").val();
    let total = price*quantity;
    document.getElementById("total").value = total;
}

//update reorder model
function updateInventory(){
    let current = $("#current_inv").val();
    let added = $("#added_inventory").val();
    let new_inv = parseFloat(current) + parseFloat(added);
    document.getElementById("new_inv").value = new_inv;
}

//update reorder model
function updateStore(){
    let current = $("#current_store").val();
    let added = $("#added_store").val();
    let new_store = parseFloat(current) + parseFloat(added);
    document.getElementById("new_store").value = new_store;
}
