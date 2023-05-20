function mdf(test) {
  var mdfjs = test;
  jQuery.ajax({
    url: "ses_mat_mdf.php",
    type: "POST",
    data: {
      var_mdf: mdfjs,
    },
    success: function (response) {
      window.location.href = "modification_mat.php";
    },
  });
}
