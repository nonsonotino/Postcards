function notificationUpdate() {
    if($template_params["page"] == "notifications_page.php") 
    {
        document.getElementById("notification-symbol").classList.remove('fa-regular');
        document.getElementById("notification-symbol").classList.remove('fa-solid');
    }
}