@if ($errors->any())
<div id="error-notification" class="position-fixed top-0 end-0 p-3" style="z-index: 9000; max-width:300px;">
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: red; color: white; font-size: 1.2rem;">
        <strong>{{ $errors->first() }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeNotification('error-notification')"></button>
    </div>
</div>
@endif

@if (session('success'))
<div id="success-notification" class="position-fixed top-0 end-0 p-3" style="z-index: 9000;">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: green; color: white; font-size: 1.2rem;">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeNotification('success-notification')"></button>
    </div>
</div>
@endif

<script>
    // Función para eliminar la notificación
    function removeNotification(notificationId) {
        var notification = document.getElementById(notificationId);
        if (notification) {
            notification.remove();
        }
    }

    // Autocierre de las notificaciones después de 4 segundos
    setTimeout(() => {
        removeNotification('error-notification');
        removeNotification('success-notification');
    }, 8000);
</script>