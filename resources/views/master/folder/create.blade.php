<x-app-layout noScrollbar="true">
    <div class="p-3 md:p-5">
        <div class="p-5 bg-white rounded-lg">
            <form action="{{ route('folder.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="space-y-3">
                    <div>
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul*</label>
                        <input type="text" id="title" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Judul" required>
                    </div>
                    <div>
                        <label for="domain_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domain*</label>
                        <select id="domain_id" name="domain_id[]" class="selectDomain" required multiple>
                            @foreach ($kategori as $item)
                                <optgroup label="{{ $item->nama_kategori }}">
                                    <option value="selectAll"> Pilih Semua</option>
                                    @foreach ($item->domain as $domain)
                                        <option value="{{ $domain->id }}">{{ $item->nama_kategori }} -
                                            {{ $domain->nama_domain }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="spintax"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spintax*</label>
                        <textarea name="spintax" id="spintax" required></textarea>
                        <div id="tinyMceRequired" class=" fixed top-10  w-[calc(100%-200px)] opacity-0">
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 error whitespace-nowrap mx-auto w-min"
                                role="alert">
                                <span class="font-medium">Gagal Menyimpan!</span> Field Spintax tidak boleh kosong !!
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button class="cp-1 py-2 px-5 rounded-lg border border-gray-300 shadow-lg"
                            id="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('.selectDomain').select2();
    });

    $('.selectDomain').on('change', function() {
        var $select = $(this);
        var selectedValue = $select.val();
        if (selectedValue[0] && selectedValue.includes('selectAll')) {
            var $optgroup = $select.find('option:selected').parent('optgroup');
            $optgroup.find('option').prop('selected', true);
            $optgroup.find('option[value="selectAll"]').prop('selected', false);
        }
    });
</script>
<script>
    tinymce.init({
        selector: 'textarea#spintax',
        menubar: false,
        plugins: 'lists link autoresize',
        min_height: 260,
        statusbar: false,
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic | numlist bullist link',
        setup: function(editor) {
            editor.on('change', function() {
                tinymce.triggerSave();
                chkSubmit();
            });
        }
    });

    $(document).on('click', '#submit', chkSubmit);

    function chkSubmit() {
        var alert = document.getElementById('tinyMceRequired')
        var msg = $('#spintax').val();
        var textmsg = $.trim($(msg).text());
        if (textmsg == '') {
            alert.classList.add('show');

            setTimeout(function() {
                alert.classList.remove('show');
            }, 1500);
            return false;
        } else {
            $('#tinyMceRequired').addClass('hidden');
        }
    }
</script>
