
function Navigate(addr) 
{
    window.location.href = addr;
}

function ShowBasket() 
{
    var basket = document.getElementById("basketcontainer");

    if (basket.style.display === "block") 
    {
        basket.style.display = "none";
        basket.textContent = "";
        return
    }

    req = fetch("basket.php", 
    {
        method: "GET",
        credentials: "include"
    })
    .then(response => response.json())
    .then((response) => 
    {
        if (response.status === false ) 
        {
            console.log("WHAT");
            var newnode = document.createElement("div")
            newnode.setAttribute("class", "basketelement")
            newnode.textContent = "No items";
        
            basket.appendChild(newnode);
            return;
        }
    
        var items = response.items.forEach(element => {
            var newnode = document.createElement("div")
            newnode.setAttribute("class", "basketelement")
            newnode.textContent = element;
    
            basket.appendChild(newnode);
        });
        basket.style.display = "block";
        
    });
}

function AddToBasket(id) 
{
    fetch("basket.php", {
        method: "POST",
        credentials: "include",
        body: 
        JSON.stringify({
            item: id
        })
    })
    .then(response => response.json())
    .then((response) => 
    {
        if (response.status === false) 
        {
            console.log("Error adding to basket");
        }
    });
}