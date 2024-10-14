<div>
    @if($message)
    <Script type="module">
        Swal.fire({
            toast: true,
            position: "{{ $position }}",  // Posisi dinamis
            icon: "{{ $type }}",          // Jenis toast dinamis
            title: "{{ $message }}",  // Pesan dari props atau session
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    </Script>
    @endif
</div>