<!-- bundle -->
@yield('script')
<!-- App js -->
@yield('script-bottom')

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.2.7/purify.min.js"></script>

<script type="text/javascript" src="{{ config('app.url') }}/editor/js/froala_editor.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/align.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/char_counter.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/code_view.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/draggable.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/entities.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/file.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/fullscreen.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/image.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/line_breaker.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/inline_style.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/link.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/quick_insert.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/quote.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/table.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/save.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/url.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/video.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/help.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/print.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/third_party/spell_checker.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/special_characters.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/plugins/word_paste.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/editor/js/languages/uk.js"></script>

<script>
    (function () {
        new FroalaEditor('#edit', {
            language: 'uk',
            key: "1C%kZV[IX)_SL}UJHAEFZMUJOYGYQE[\\ZJ]RAe(+%$==",
            attribution: false,
            imageUploadURL: '{{ config('app.url') }}admin/uploadImage',
            imageUploadMethod: 'POST',
        })
    })()
</script>
