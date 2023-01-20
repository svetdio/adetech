if (typeof localStorage['adetech_user'] == 'undefined') {
    alert("You are not logged-in\n\nPlease log in first");
    window.location = 'login.php';
}
function calc() {
    var rph1 = (document.getElementById('rph1').value !== "") ? parseFloat(document.getElementById('rph1').value) : 0;
    var cutoff1 = (document.getElementById('cutoff1').value !== "") ? parseFloat(document.getElementById('cutoff1').value) : 0;
    var rph2 = (document.getElementById('rph2').value !== "") ? parseFloat(document.getElementById('rph2').value) : 0;
    var cutoff2 = (document.getElementById('cutoff2').value !== "") ? parseFloat(document.getElementById('cutoff2').value) : 0;
    var rph3 = (document.getElementById('rph3').value !== "") ? parseFloat(document.getElementById('rph3').value) : 0;
    var cutoff3 = (document.getElementById('cutoff3').value !== "") ? parseFloat(document.getElementById('cutoff3').value) : 0;
    var sssl = (document.getElementById('sssl').value !== "") ? parseFloat(document.getElementById('sssl').value) : 0;
    var pil = (document.getElementById('pil').value !== "") ? parseFloat(document.getElementById('pil').value) : 0;
    var fsd = (document.getElementById('fsd').value !== "") ? parseFloat(document.getElementById('fsd').value) : 0;
    var fsl = (document.getElementById('fsl').value !== "") ? parseFloat(document.getElementById('fsl').value) : 0;
    var sl = (document.getElementById('sl').value !== "") ? parseFloat(document.getElementById('sl').value) : 0;
    var ol = (document.getElementById('ol').value !== "") ? parseFloat(document.getElementById('ol').value) : 0;

    var result1 = rph1 * cutoff1;
    var result2 = rph2 * cutoff2;
    var result3 = rph3 * cutoff3;

    document.getElementById('result1').value = result1;
    document.getElementById('result2').value = result2;
    document.getElementById('result3').value = result3;

    document.getElementById('GIResult').value = result1 + result2 + result3;

    var sssC = 200;
    var phC = 100;
    var piC = 100;

    document.getElementById('TotalDeductionResult').value = sssC + phC + piC + sssl + pil + fsd + fsl + sl + ol;

}

function calcNI() {
    var gross = (document.getElementById('GIResult').value !== "") ? parseFloat(document.getElementById('GIResult').value) : 0;
    var total_deduction = (document.getElementById('TotalDeductionResult').value !== "") ? parseFloat(document.getElementById('TotalDeductionResult').value) : 0;
    document.getElementById('NIResult').value = gross - total_deduction
}

const inpFile = document.getElementById("inpFile");
const previewContainer = document.getElementById("imagePreview");
const previewImage = previewContainer.querySelector(".image-preview__image");
const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

inpFile.addEventListener("change", function () {

    const file = this.files[0];

    if (file) {

        const reader = new FileReader();

        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";
        reader.addEventListener("load", function () {
            previewImage.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
    } else {
        previewDefaultText.style.display = null;
        previewImage.style.display = null;
        previewImage.setAttribute("src", "");
    }
});
function logout() {
    let conf = confirm("Do you want to log-out?");
    if (conf) {
        alert('You have been successfully logged-out');
        localStorage.removeItem('adetech_user');
        window.location = 'login.php';
    }
}


