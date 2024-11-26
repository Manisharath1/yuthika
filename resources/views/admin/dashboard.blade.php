<x-app-layout>
    <x-navbar />
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Include your head content (like meta tags, title, and CSS links) -->
    </head>
    <body class="bg-gray-100 min-h-screen">
        <!-- Flex Container to Hold Sidebar and Main Content -->
        <div class="flex flex-col md:flex-row min-h-screen">
            <!-- Sidebar -->
            <x-sidebar class="w-full md:w-1/4 lg:w-1/5 bg-white shadow-md" />

            <!-- Main Content -->
            <div class="flex-1 bg-gray-100 p-4 md:p-6">
                <!-- Add your main content here -->
                <h1 class="text-2xl font-bold text-gray-800">Welcome</h1>
                <p class="mt-2 text-gray-600">
                    Your responsive layout is ready to handle different screen sizes effectively!
                </p>
            </div>
        </div>
    </body>
    </html>
</x-app-layout>
