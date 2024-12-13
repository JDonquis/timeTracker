@if ($errors->any())
<div id="error-notification" class="position-fixed top-0 end-0 p-3" style="z-index: 9000; max-width:400px;">
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #ffff; color: #374557; font-size: 1.1rem;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="nftmax-svg-icon" style="width: 25px; margin-right:10px;"><path fill="#E74C3C" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
        <strong>{{ $errors->first() }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeNotification('error-notification')"></button>
    </div>
</div>
@endif

@if (session('success'))
<div id="success-notification" class="position-fixed top-0 end-0 p-3" style="z-index: 9000;">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #FFFFFF; color: #374557; font-size: 1.1rem;">
        <svg xmlns="http://www.w3.org/2000/svg" class="nftmax-svg-icon" style="width: 25px; margin-right:10px;" viewBox="0 0 448 512"><path fill="#D93EF9" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeNotification('success-notification')"></button>
    </div>
</div>
@endif

<style>
    .alert-success::after{
        content: '';
        display: block;
        width: 100%;
        height: 5px;
        background: #D93EF9;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .alert-danger::after{
        content: '';
        display: block;
        width: 100%;
        height: 5px;
        background: #E74C3C;
        position: absolute;
        bottom: 0;
        left: 0;
    }
</style>

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