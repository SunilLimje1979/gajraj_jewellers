document.querySelectorAll('textarea.rich').forEach(function (textarea) {
  var editor = document.createElement('div');
  var toolbar = document.createElement('div');
  var panel = document.createElement('div');
  var actions = [
    { command: 'formatBlock', value: '<h1>', label: 'H1' },
    { command: 'formatBlock', value: '<h2>', label: 'H2' },
    { command: 'formatBlock', value: '<h3>', label: 'H3' },
    { command: 'formatBlock', value: '<h4>', label: 'H4' },
    { command: 'formatBlock', value: '<h5>', label: 'H5' },
    { command: 'formatBlock', value: '<h6>', label: 'H6' },
    { command: 'formatBlock', value: '<p>', label: 'P' },
    { command: 'bold', label: '<i class="fa-solid fa-bold"></i>' },
    { command: 'italic', label: '<i class="fa-solid fa-italic"></i>' },
    { command: 'underline', label: '<i class="fa-solid fa-underline"></i>' },
    { command: 'insertUnorderedList', label: '<i class="fa-solid fa-list-ul"></i>' },
    { command: 'insertOrderedList', label: '<i class="fa-solid fa-list-ol"></i>' },
    { command: 'insertHorizontalRule', label: 'HR' },
    { command: 'createLink', label: '<i class="fa-solid fa-link"></i>' },
    { command: 'removeFormat', label: '<i class="fa-solid fa-eraser"></i>' }
  ];

  function syncTextarea() {
    textarea.value = panel.innerHTML.trim();
  }

  function runCommand(action) {
    panel.focus();
    if (action.command === 'createLink') {
      var url = window.prompt('Enter link URL');
      if (!url) return;
      document.execCommand(action.command, false, url);
    } else {
      document.execCommand(action.command, false, action.value || null);
    }
    syncTextarea();
  }

  editor.className = 'rich-editor';
  toolbar.className = 'rich-toolbar';
  panel.className = 'rich-panel';
  panel.contentEditable = 'true';
  panel.innerHTML = textarea.value;

  actions.forEach(function (action) {
    var button = document.createElement('button');
    button.type = 'button';
    button.className = 'rich-tool';
    button.innerHTML = action.label;
    button.addEventListener('click', function () { runCommand(action); });
    toolbar.appendChild(button);
  });

  panel.addEventListener('input', syncTextarea);
  panel.addEventListener('blur', syncTextarea);
  textarea.form && textarea.form.addEventListener('submit', syncTextarea);

  editor.appendChild(toolbar);
  editor.appendChild(panel);
  textarea.classList.add('rich-source');
  textarea.insertAdjacentElement('afterend', editor);
});
document.querySelectorAll('[data-color-picker]').forEach(function (picker) {
  var target = document.getElementById(picker.dataset.colorPicker);
  if (!target) return;
  picker.addEventListener('input', function () {
    target.value = picker.value.toUpperCase();
  });
  target.addEventListener('input', function () {
    if (/^#[0-9a-fA-F]{6}$/.test(target.value)) picker.value = target.value;
  });
});
