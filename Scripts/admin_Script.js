// OLD METHOD
//document.getElementById("right-body-1").style.display = "block";
//document.getElementById("right-body-2").style.display = "none";
//document.getElementById("right-body-3").style.display = "none";
//document.getElementById("right-body-4").style.display = "none";
//document.getElementById("right-body-5").style.display = "none";
//document.getElementById("right-body-6").style.display = "none";


$(document).ready(function () {
  $(".btnUpdate").on("click", function () {
    $("#UpdateUser").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);

    $("#update_id").val(data[0]);
    $("#update_name").val(data[1]);
    $("#update_email").val(data[2]);
    $("#update_phone").val(data[3]);
    $("#update_address").val(data[4]);
    $("#update_blood").val(data[5]);
  });
});

$(document).ready(function () {
  $(".btnDonate").on("click", function () {
    $("#DonateBlood").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);

    $("#donor_id").val(data[0]);
    $("#donor_type").val(data[5]);
  });
});





