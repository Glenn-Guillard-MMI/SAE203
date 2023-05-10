function script(test) {
  var varible_a_detruire = test;
  jQuery.ajax({
    url: "action_materiel_dispo.php",
    type: "POST",
    data: {
      var_sup: varible_a_detruire,
    },
  });
}



