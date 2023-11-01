let inputs = document.querySelectorAll(".input")
let editButton = document.querySelectorAll(".edit")

function disable() {
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = true;
    }
}

function enable() {
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
}

for (let i = 0; i < editButton.length; i++) {
    editButton[i].addEventListener("click", () => {
        enable()
    })
}

disable();