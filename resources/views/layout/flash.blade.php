<div id="flashModal" class="fixed inset-0 bg-opacity-50 justify-center items-center">
    {{ session('flash') }}
    <div class="Modal border-green-500 border-2">
        <h2>Succesfull</h2>
    </div>
</div>

<script>
    setTimeout(function() {
        document.getElementById('flashModal').classList.add('hidden');
    }, 3000);
</script>