<!-- bundle -->
@yield('script')
<!-- App js -->
@yield('script-bottom')

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.2.7/purify.min.js"></script>

<script type="text/javascript" src="http://cprpp/editor/js/froala_editor.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/align.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/char_counter.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/code_view.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/draggable.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/entities.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/file.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/fullscreen.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/image.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/line_breaker.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/inline_style.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/link.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/quick_insert.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/quote.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/table.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/save.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/url.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/video.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/help.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/print.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/third_party/spell_checker.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/special_characters.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/plugins/word_paste.min.js"></script>
<script type="text/javascript" src="http://cprpp/editor/js/languages/uk.js"></script>

<script>
    (function () {
        new FroalaEditor('#edit', {
            language: 'uk',
            key: "1C%kZV[IX)_SL}UJHAEFZMUJOYGYQE[\\ZJ]RAe(+%$==",
            attribution: false, // to hide "Powered by Froala"
            imageUploadURL: 'http://cprpp/admin/uploadImage',
            imageUploadMethod: 'POST',

        })
    })()
</script>
