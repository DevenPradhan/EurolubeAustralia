<div
    {{ $attributes->merge(['class' => 'flash_message fixed top-20 right-40 z-10 shadow-md shadow-gray-400 flex max-w-max rounded-sm opacity-90 items-center justify-evenly p-4']) }}>
    <h3 class=" font-medium tracking-wide max-w-sm uppercase text-base inline-block">
        {{ $slot }}
    </h3>
    <button type="button" class="ml-4 text-xl font-bold self-end" data-dismiss="alert"
        onclick=delete_flash(this)>×</button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    function delete_flash(flash) {
        $(flash).parent().remove();
    }
</script>

<script type="text/javascript">
    $(".flash_message").delay(5200).fadeOut(1000);
</script>

