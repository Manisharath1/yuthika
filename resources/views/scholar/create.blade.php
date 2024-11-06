<x-app-layout>
    <x-navbar />

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <x-sidebar />

        <div class="container">
            <h1 class="text-2xl font-bold mb-4">Add New Scholar</h1>

            <!-- Form for creating a new scholar -->
            <form action="{{ route('scholar.create') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-gray-700">Type:</label>
                    <input type="text" id="type" name="type" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700">Category:</label>
                    <input type="text" id="category" name="category" class="w-full px-3 py-2 border rounded" required>
                </div>

                <!-- Add more input fields as needed for scholar details -->

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Scholar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
