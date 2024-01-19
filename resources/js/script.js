function showAlert(message) {
    const alertElement = document.getElementById("alert");
    alertElement.textContent = message;
    alertElement.style.display = "block";

    setTimeout(() => {
        alertElement.style.opacity = "1";
    }, 100);

    // Automatically hide the alert after 5 seconds (adjust as needed)
    setTimeout(() => {
        alertElement.style.opacity = "0";
        alertElement.style.display = "none";
    }, 5000);
}