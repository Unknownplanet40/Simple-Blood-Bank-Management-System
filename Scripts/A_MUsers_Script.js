$(document).ready(function () {
  $(".AdminAdd").on("click", function () {
    $("#AdminAdd").modal("show");

    $("#Utype").val("Admin");
  });
});

$(document).ready(function () {
  $(".btnEdit").on("click", function () {
    $("#UpAccount").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);

    $("#user_id").val(data[0]);
    $("#name").val(data[1]);
    $("#username").val(data[2]);
    $("#password").val(data[3]);
  });
});

$(document).ready(function () {
  $(".updateBTN").on("click", function () {
    $("#UpUserAct").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);

    $("#UID").val(data[0]);
    $("#Upname").val(data[1]);
    $("#uname").val(data[2]);
    $("#pword").val(data[3]);
    $("#mail").val(data[4]);
    $("#tel").val(data[5]);
    $("#add").val(data[6]);
    $("#UpBtypes").val(data[8]);
  });
});
