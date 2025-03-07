function changeParagraph() {
    document.getElementById("message").innerText = "Hello! You click the button!";
    //console.log("yes");
}

function changeBackgroundColor() {
    let colors = ["blanchedalmond", "cadetblue", "darksalmon", "darkseagreen", "lightblue"];
    let new_color = colors[Math.floor(Math.random() * 4)];
    //console.log(new_color);

    document.getElementById("body").style.backgroundColor = new_color;
}

function showGreeting() {
    let name = document.getElementById("inputText").value;
    console.log(name);
    document.getElementById("greeting").innerText = "Hello, " + name + "!";
}

document.getElementById("submitName").addEventListener("click", showGreeting);

document.getElementById("messageButton").addEventListener("click", changeParagraph);
document.getElementById("colorButton").addEventListener("click", changeBackgroundColor);
