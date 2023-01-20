function logout() {
    let conf = confirm("Do you want to log-out?");
    if (conf) {
        alert('You have been successfully logged-out');
        localStorage.removeItem('adetech_user');
        window.location = 'login.php';
    }
}