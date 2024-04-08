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

        let walletName = describeElement.children[1].children[0].innerText;
        let balance = describeElement.children[1].children[1].innerText;

        const btnPopup = document.getElementById('popupBtn');
        btnPopup.innerText = `${walletName} | ${balance}`
    }

}

const btnPopup = document.getElementById('popupBtn');
const walletPopup = document.querySelector('.wallet-popup');



btnPopup.addEventListener("click", (e) => {
    walletPopup.classList.add("show");
    e.preventDefault();
});

function closeBtn(){
    walletPopup.classList.remove("show");
}


function goBack() {
    window.history.back();
}


