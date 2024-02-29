function show_pup() {
    document.getElementById('pup').style.display='block';
}
function hide_pup() {
    document.getElementById('pup').classList.remove('open');
}

//Login---> When the user clicks anywhere outside of the modal, close it
/*window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/