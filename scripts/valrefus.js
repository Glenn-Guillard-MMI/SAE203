function accepter(test) {
  var acc = test;
  jQuery.ajax({
    url: "acc_mat.php",
    type: "POST",
    data: {
      var_accpt: acc,
    },
    success: function (response) {
      window.location.href = "validation.php";
    },
  });
}

function refuser(test) {
  var acc = test;
  jQuery.ajax({
    url: "ref_mat.php",
    type: "POST",
    data: {
      var_ref: acc,
    },
    success: function (response) {
      window.location.href = "validation.php";
    },
  });
}
