function checkPassword() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm").val();

    if (password != confirmPassword)
        $("#check").html("Passwords do not match!");
    else
        $("#check").html("");
}
function checkPasswordA() {
    var password = $("#passwordA").val();
    var confirmPassword = $("#confirmA").val();

    if (password != confirmPassword)
        $("#checkA").html("Passwords do not match!");
    else
        $("#check").html("");
}




