
function Navigate(addr) 
{
    window.location.href = addr;
}

function ToggleUser() 
{
    var user = document.getElementById("user_dropdown");
    if (user.style.display === "none") 
    {
        ShowUser();
        return;
    }
    HideUser();
}

function ShowUser() 
{
    // hide the basket
    var basket = document.getElementById("basketcontainer") 
    basket.style.display = "none";

    var user = document.getElementById("user_dropdown");
    user.style.display = "block";
}

function HideUser() 
{
    var user = document.getElementById("user_dropdown");
    user.style.display = "none";
}

function ShowBasket() 
{
    HideUser();
    var basket = document.getElementById("basketcontainer");

    if (basket.style.display === "block") 
    {
        basket.style.display = "none";
        basket.textContent = "";
        return;
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
        else 
        {
            let basket = document.getElementById("basketcontainer");
            if (basket.style.display == "block") 
            {
                ShowBasket();
                ShowBasket();
            }
        }
    });
}