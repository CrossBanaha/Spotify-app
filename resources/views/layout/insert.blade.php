<div id="authorModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="Modal">
        <h2 class="text-xl font-bold mb-4">Add New Author</h2>
        <form action="{{ route('spotifys.createAuthor') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nickname" class="block text-sm font-medium text-customText">Nickname</label>
                <input type="text" name="nickname" id="nickname" class="mt-1 p-2 w-full border rounded-md text-black" required maxlength="30">
            </div>
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-customText">URL</label>
                <input type="text" name="url" id="url" class="mt-1 p-2 w-full border rounded-md text-black" required>
            </div>
            <div class="flex justify-end">
                <button type="button" class="Register" onclick="closeModal()">Cancel</button>
                <button type="submit" class="Login">Add Author</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('authorModal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('authorModal').classList.add('hidden');
    }
    window.onclick = function(event) {
        const modal = document.getElementById('authorModal');
        if (event.target === modal) {
            closeModal();
        }
    }
</script>