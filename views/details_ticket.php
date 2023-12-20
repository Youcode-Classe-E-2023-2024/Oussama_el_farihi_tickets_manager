<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ticket Details</title>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow mb-8">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="w-full">
                    <a href="index.php" class="px-3 py-2 rounded text-gray-700 bg-gray-200 hover:bg-gray-300 w-full ">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="flex flex-col items-center justify-center p-6 border-b border-gray-200">
                <div class="w-full">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate ">Ticket Details</h2>
                </div>
            </div>
            <div class="flex flex-col px-4 py-5 sm:p-6">
                <!-- Detail sections -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter Title">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Assigned To</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Assignee Name">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option>Open</option>
                        <option>In Progress</option>
                        <option>Closed</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Priority</label>
                    <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4" placeholder="Enter Description"></textarea>
                </div>
            </div>
        </div>
        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
            <div class="max-w-2xl mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
                </div>
                <form class="mb-6">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="4" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-800">
                        Post comment
                    </button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
