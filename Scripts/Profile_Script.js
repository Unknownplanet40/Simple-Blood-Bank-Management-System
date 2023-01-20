$(document).ready(function () {
  $(".Probtn").on("click", function () {
    $("#UpUserAct").modal("show");

    let id = document.getElementById("pid");
    let name = document.getElementById("pname");
    let username = document.getElementById("pusername");
    let password = document.getElementById("ppassword");
    let email = document.getElementById("pemail");
    let address = document.getElementById("paddress");
    let phone = document.getElementById("pphone");
    let blood = document.getElementById("pblood");

    $("#UID").val(id.value);
    $("#Upname").val(name.value);
    $("#uname").val(username.value);
    $("#pword").val(password.value);
    $("#mail").val(email.value);
    $("#tel").val(phone.value);
    $("#add").val(address.value);
    $("#UpBtypes").val(blood.value);
  });
});
