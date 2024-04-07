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
    window.history.back(); // Fungsi untuk kembali ke halaman sebelumnya
}
