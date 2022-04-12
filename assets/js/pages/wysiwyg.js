let myEditor;
$(".ckeditor").each(function (key, value) {
  ClassicEditor.create(value)
    .then((editor) => {
      window.editor = editor;
    })
    .catch((error) => {
      console.log(error);
    });
});