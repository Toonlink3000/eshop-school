
function Navigate(addr) 
{
    window.location.href = addr;
}

function ToggleUser() 
{
    let user = document.getElementById("user_dropdown");
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
    let basket = document.getElementById("basketcontainer") 
    basket.style.display = "none";
    basket.textContent = "";

    let user = document.getElementById("user_dropdown");
    user.style.display = "block";
}

function Checkout() 
{
    document.location = "checkout.php";
}

function HideUser() 
{
    let user = document.getElementById("user_dropdown");
    user.style.display = "none";
}

function ShowBasket() 
{
    HideUser();
    let basket = document.getElementById("basketcontainer");

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
            let newnode = document.createElement("div")
            newnode.setAttribute("class", "basketelement")
            newnode.textContent = "No items";
        
            basket.appendChild(newnode);
            console.log("sfdsdfsd");
            basket.style.display = "block";
            return;
        }
    
        let items = response.items.forEach(element => {
            let newnode = document.createElement("div")
            newnode.setAttribute("class", "basketelement")
            newnode.textContent = element;
    
            basket.appendChild(newnode);
        });
        // add checkout button
        let newnode = document.createElement("button");
        newnode.setAttribute("onclick", "Checkout()");
        newnode.textContent = "Checkout";
        newnode.setAttribute("class", "checkout_button");

        basket.appendChild(newnode);
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