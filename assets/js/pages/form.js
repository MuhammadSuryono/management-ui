$(document).on("submit", "#formCreate", function (e) {
  e.preventDefault();

  const form = $(this);
  const url = form.attr("action");
  const data = form.serialize();

  // create ajax jquery
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    success: function (response) {
      if (response.success) {
        window.location.href = response.redirect;
      } else {
        alert(response.message);
      }
    }
  });
});

ClassicEditor.create(document.querySelector("#editor"))
  .then((editor) => {
    console.log(editor);
  })
  .catch((error) => {
    console.log(error);
  });
