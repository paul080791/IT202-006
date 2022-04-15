function flash (message = "", color = "info") {
    let flash = document.getElementById("flash");
    //create a div (or whatever wrapper we want)
    let outerDiv = document.createElement("div");
    outerDiv.className = "row justify-content-center";
    let innerDiv = document.createElement("div");

    //apply the CSS (these are bootstrap classes which we'll learn later)
    innerDiv.className = `alert alert-${color}`;
    //set the content
    innerDiv.innerText = message;

    outerDiv.appendChild(innerDiv);
    //add the element to the DOM (if we don't it merely exists in memory)
    flash.appendChild(outerDiv);
    clear_flashes();
}
let flash_timeout = null;
function clear_flashes () {
    let flash = document.getElementById("flash");
    if (!flash_timeout) {
        flash_timeout = setTimeout(() => {
            console.log("removing");
            if (flash.children.length > 0) {
                flash.children[0].remove();
            }
            flash_timeout = null;
            if (flash.children.length > 0) {
                clear_flashes();
            }
        }, 3000);
    }
}
window.addEventListener("load", () => setTimeout(clear_flashes, 100));

function isValidUsername(username){
    const pattern= /^[a-z0-9_-]{3,16}$/;
    return pattern.test(username);
}// function isValidUsername
function isValidEmail(email){
    const patternEm  = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
    return patternEm.test(email);
}
function isValidPassword(password){
    if(!password){
        return false;
    }
    return password.length >= 8;

}
function isEqual(a,b)
{
   return a == b; 
}

function refreshBalance () {
    fetch("api/get_balance.php", {
        method: "POST",
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
            "X-Requested-With": "XMLHttpRequest",
        }
    }).then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        let balances = document.getElementsByClassName("show-balance");
        for (let b of balances) {
            b.getElementsByTagName("div")[0].innerText = "Balance: " + (data.balance || 0);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function activate_item (item, ele) {
    let fd = new FormData();
    fd.append("item_id", item);
    fetch("api/activate_item.php", {
        method: "POST",
        //had to not set a Content-Type for this to work
        //not sure if this is just a local issue or not
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
        body: fd
    }).then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            ele.parentElement.parentElement.querySelector(".quantity").innerText = data.remaining || 0;
            //ele.parentNode.querySelector(".quantity").innerText = data.remaining || 0

        })
        .catch((error) => {
            console.error('Error:', error);
        });
}