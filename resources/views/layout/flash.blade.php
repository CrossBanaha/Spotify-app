<div id="flashModal" class="fixed bottom-0 left-0 mb-4 ml-4 bg-opacity-50 justify-center items-center hidden">
    <div class="Modal border-green-500 border-2">
        <h2 id="flashMessage"></h2>
    </div>
</div>

<script>
    function showFlash(message) {
        document.getElementById('flashMessage').innerHTML = message;
        document.getElementById('flashModal').classList.remove('hidden');
        setTimeout(function() {
            document.getElementById('flashModal').classList.add('hidden');
        }, 3000);
    }
</script>