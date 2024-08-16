document.addEventListener('DOMContentLoaded', function() {
    const addNoteBtn = document.getElementById('addNoteBtn');
    const addNoteForm = document.getElementById('addNoteForm');
    const noteForm = document.getElementById('noteForm');
    const cancelAddNote = document.getElementById('cancelAddNote');

    // Tampilkan formulir saat tombol "Add Note" diklik
    addNoteBtn.addEventListener('click', function() {
        addNoteForm.style.display = 'block'; // Tampilkan formulir
    });

    // Sembunyikan formulir saat tombol "Cancel" diklik
    cancelAddNote.addEventListener('click', function() {
        addNoteForm.style.display = 'none'; // Sembunyikan formulir
    });

    // Tangani pengiriman formulir
    noteForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form standar

        const formData = new FormData(this);

        fetch('add_note.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.includes("Note added successfully")) {
                addNoteForm.style.display = 'none'; // Sembunyikan formulir
                loadNotes(); // Muat ulang catatan
            } else {
                // Tampilkan pesan error di console
                console.error(data);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Fungsi untuk memuat catatan dari server
    function loadNotes() {
        fetch('notes.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('notesList').innerHTML = data;
            })
            .catch(error => console.error('Error loading notes:', error));
    }

    // Muat catatan saat halaman dimuat
    loadNotes();
});
