// part 1
function changeMessage() {
    document.getElementById("message").innerText = "Hello! You click the button!";
    //console.log("yes");
}

// part 2
function changeBackgroundColor() {
    let colors = ["blanchedalmond", "cadetblue", "darksalmon", "darkseagreen", "lightblue"];
    let new_color = colors[Math.floor(Math.random() * 4)];
    //console.log(new_color);

    document.getElementById("body").style.backgroundColor = new_color;
}

// part 3
function showGreeting() {
    let name = document.getElementById("inputText").value;
    //console.log(name);
    document.getElementById("greeting").innerText = "Hello, " + name + "!";
}

// part 4
function showHideText() {
    let isShown = document.getElementById("hideButton").innerText === "Hide Text";
    //console.log(isShown);

    if (isShown) {
        document.getElementById("hiddenText").style.display = "none";
        document.getElementById("hideButton").innerText = "Show Text";
    } else {
        document.getElementById("hiddenText").style.display = "block";
        document.getElementById("hideButton").innerText = "Hide Text";
    }

    //console.log(document.getElementById("hideButton").innerText);
}

// part 1
document.getElementById("messageButton").addEventListener("click", changeMessage);
// part 2
document.getElementById("submitName").addEventListener("click", showGreeting);
// part 3
document.getElementById("colorButton").addEventListener("click", changeBackgroundColor);
// part 4
document.getElementById("hideButton").addEventListener("click", showHideText);
