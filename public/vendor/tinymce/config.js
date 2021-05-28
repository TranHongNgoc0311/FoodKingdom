tinymce.init({
  selector: "textarea#content",
  theme: 'silver',
  width: "",
  height: 300,
  plugins: [
  "advlist autolink link image lists charmap print preview hr anchor pagebreak",
  "fullscreen save template textpattern imagetools",
  "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
  "table directionality emoticons paste code responsivefilemanager"
  ],
  toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
  toolbar2: "| insert | wordcount | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
  image_advtab: true ,
  code_dialog_height: 200,
  encoding: "html",
  statusbar: false,
  branding: false,
  entity_encodig: "raw",
  schema: "html5",
  toolbar_items_size: "small",
  element_format: "html",
  force_br_newlines: true,
  force_p_newlines: false,
  forced_root_block: "",
  filemanager_title:"Quản lý tập tin" ,
  external_filemanager_path: base_url()+"/filemanager/",
  external_plugins: { "filemanager" : base_url()+"/filemanager/plugin.min.js"},
  filemanager_access_key: akey(),
  setup: function (editor) {
    editor.ui.registry.addMenuButton('insert', {
      icon: 'plus',
      tooltip: 'Insert',
      fetch: (callback) => callback('image link | inserttable')
    });
  }
});
tinymce.init({
  selector: "textarea#blog",
  theme: 'silver',
  plugins: [
  "advlist autolink link image lists charmap print preview hr anchor pagebreak",
  "fullscreen save template textpattern imagetools",
  "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
  "table directionality emoticons paste code responsivefilemanager"
  ],
  toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
  toolbar2: "| insert | wordcount | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
  image_advtab: true ,
  code_dialog_height: 200,
  encoding: "html",
  statusbar: false,
  branding: false,
  entity_encodig: "raw",
  schema: "html5",
  toolbar_items_size: "small",
  element_format: "html",
  force_br_newlines: true,
  force_p_newlines: false,
  forced_root_block: "",
  filemanager_title:"Quản lý tập tin" ,
  external_filemanager_path: base_url()+"/filemanager/",
  external_plugins: { "filemanager" : base_url()+"/filemanager/plugin.min.js"},
  filemanager_access_key: akey(),
  setup: function (editor) {
    editor.ui.registry.addMenuButton('insert', {
      icon: 'plus',
      tooltip: 'Insert',
      fetch: (callback) => callback('image link | inserttable')
    });
  }
});
