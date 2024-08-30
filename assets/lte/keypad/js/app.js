$(document).ready(function () {
  $("#lifting_no").focus();
  const input_value = $("#lifting_no");

  //disable input from typing

  $("#lifting_no").keypress(function () {
    return false;
  });

  //add password
  $(".calc").click(function () {
    let value = $(this).val();
    field(value);
  });
  function field(value) {
    input_value.val(input_value.val() + value);
  }
  $("#clear").click(function () {
    input_value.val("");
  });
  $("#enter").click(function () {
    alert("Your password " + input_value.val() + " added");
  });
});
