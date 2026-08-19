(function () {
  var allowedTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'ul', 'ol', 'li', 'strong', 'b', 'em', 'i', 'u', 'a', 'br', 'hr', 'blockquote'];

  function sanitizeRichHtml(html) {
    var parser = new DOMParser();
    var doc = parser.parseFromString('<div>' + (html || '') + '</div>', 'text/html');

    function clean(node) {
      if (node.nodeType !== 1) return;

      var tag = node.tagName.toLowerCase();
      if (['script', 'style', 'iframe', 'object', 'embed'].indexOf(tag) !== -1) {
        node.parentNode.removeChild(node);
        return;
      }

      if (allowedTags.indexOf(tag) === -1 && tag !== 'body' && node !== doc.body.firstChild) {
        var parent = node.parentNode;
        var moved = [];
        while (node.firstChild) {
          moved.push(node.firstChild);
          parent.insertBefore(node.firstChild, node);
        }
        parent.removeChild(node);
        moved.forEach(clean);
        return;
      }

      var href = '';
      if (tag === 'a') {
        href = (node.getAttribute('href') || '').trim();
        if (!/^(https?:|mailto:|tel:|#)/i.test(href)) href = '';
      }

      Array.prototype.slice.call(node.attributes || []).forEach(function (attr) {
        node.removeAttribute(attr.name);
      });

      if (tag === 'a' && href) node.setAttribute('href', href);

      Array.prototype.slice.call(node.childNodes).forEach(clean);
    }

    clean(doc.body);
    return doc.body.firstChild ? doc.body.firstChild.innerHTML.trim() : '';
  }

  if (window.jQuery && jQuery.fn && jQuery.fn.summernote) {
    jQuery('textarea.rich').each(function () {
      var textarea = jQuery(this);
      textarea.val(sanitizeRichHtml(textarea.val()));
      textarea.summernote({
        height: 280,
        dialogsInBody: true,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'italic', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link', 'hr']],
          ['view', ['codeview']]
        ],
        styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
        callbacks: {
          onPaste: function (event) {
            var e = event.originalEvent || event;
            var clipboard = e.clipboardData || window.clipboardData;
            if (!clipboard) return;

            e.preventDefault();
            var html = clipboard.getData('text/html') || clipboard.getData('text/plain');
            var cleanHtml = sanitizeRichHtml(html).replace(/\n/g, '<br>');
            document.execCommand('insertHTML', false, cleanHtml);
          },
          onChange: function (contents) {
            textarea.val(sanitizeRichHtml(contents));
          }
        }
      });

      textarea.closest('form').on('submit', function () {
        textarea.summernote('code', sanitizeRichHtml(textarea.summernote('code')));
      });
    });
  }

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
})();
