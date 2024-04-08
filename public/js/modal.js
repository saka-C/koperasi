const modal = document.getElementById("editModal");
const openModal = document.getElementById("openModal");
const closeModal = document.getElementsByClassName("close-modal")[0];

openModal.onclick = function() {
  modal.classList.add("show");
}

closeModal.onclick = function() {
  modal.classList.remove("show");
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}