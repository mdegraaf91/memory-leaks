var x = [];

function createNodes()
{
    var div;
    var i = 10000;
    var fragment = document.createDocumentFragment();

    for (;i > 0; i--) {
        div = document.createElement("div");
        div.appendChild(document.createTextNode(i + " - " + new Date().toTimeString()));
        fragment.appendChild(div);
    }
    
    document.getElementById("nodes").appendChild(fragment);
}

function grow()
{
    x.push(new Array(1000000).join("x"));

    createNodes();

    setTimeout(grow, 1000);
}

document.querySelector(".button").addEventListener("click", grow);
