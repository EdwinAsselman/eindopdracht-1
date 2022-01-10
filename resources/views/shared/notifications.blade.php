{{-- FLASH MESSAGES --}}
@if( Session::has('message') )
    <div class="p-4 text-white border-2 rounded-lg bg-gradient-to-r from-green-400 to-green-500">
        {{ Session::get('message') }}
    </div>
@endif

{{-- BROWSER EVENTS --}}
<script>
window.addEventListener('message', event => {
    alert(event.detail.message);
})
</script>