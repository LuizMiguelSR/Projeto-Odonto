@if (session('sucess'))
    <div class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 mb-4 me-4" role="alert">
        <strong>{{ session('sucess') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 5000);
    </script>
@endif
