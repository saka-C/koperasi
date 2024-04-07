const hamburger = document.getElementById("hamburger");
const sidebar = document.querySelector(".sidebar");
const hamburgerBtn = document.querySelector(".hamburger");

hamburger.addEventListener("click", () => {
    sidebar.classList.toggle("active");
});
hamburger.addEventListener("click", () => {
    hamburgerBtn.classList.toggle("active");
});
hamburger.addEventListener("click", () => {
    container.classList.toggle("active");
});



let selectedDescribe = null;

function selectRadioButton(id, describeElement) {
    const radioButton = document.getElementById(id);
    if (radioButton) {
        if (selectedDescribe) {
            selectedDescribe.classList.remove('checked');
        }
        selectedDescribe = describeElement;
        radioButton.click();
        describeElement.classList.add('checked');

    }
}

