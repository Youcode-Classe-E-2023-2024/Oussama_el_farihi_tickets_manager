<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Ticket</title>
</head>

<body>
    <nav class="bg-white shadow mb-8">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="flex">
                    <a href="index.php" class="px-3 py-2 rounded text-gray-700 bg-gray-200 hover:bg-gray-300">Back</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600">Add New Ticket</h2>
                <p class="text-gray-500 mb-6">Please fill out all the fields.</p>
                <form action="../actions/add_ticket_process.php" method="post">
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600 lg:col-span-1">
                                <p class="font-medium text-lg">Ticket Details</p>
                            </div>

                            <div class="lg:col-span-2">
                                <div class="grid gap-4 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="title">Title</label>
                                        <input type="text" id="title"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="assignedTo"
                                            class="block text-sm font-medium leading-6 text-gray-900">Assigned
                                            to</label>
                                        <div class="relative mt-2">
                                            <button type="button" id="dropdownButton"
                                                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                                <span class="flex items-center">
                                                    <span class="ml-3 block truncate" id="selectedNames">Select
                                                        Members</span>
                                                </span>
                                                <span
                                                    class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 9l6 6 6-6" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <ul id="dropdownMenu"
                                                class="hidden absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                                tabindex="-1">
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="status"
                                            class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                        <select id="status"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="">Select Status</option>
                                            <option value="open">Open</option>
                                            <option value="in_progress">In Progress</option>
                                            <option value="closed">Closed</option>
                                        </select>
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="priority"
                                            class="block text-sm font-medium leading-6 text-gray-900">Priority</label>
                                        <select id="priority"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="">Select Priority</option>
                                            <option value="low">Low</option>
                                            <option value="medium">meduim</option>
                                        </select>
                                    </div>

                                    <div class="md:col-span-5">
                                        <button class="px-4 py-2 text-blue-500 hover:text-blue-600">+ Add tag</button>
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="description">Description</label>
                                        <textarea id="description" cols="30" rows="4"
                                            class="h-25 border mt-1 rounded px-4 w-full bg-gray-50"
                                            placeholder="Add your ticket description here"></textarea>
                                    </div>

                                    <div class="md:col-span-5 text-right">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <script>
        // Sample data for dropdown
        const members = [
            { id: 1, name: 'Tom Cook' },
            { id: 2, name: 'Jane Doe' },
            { id: 3, name: 'John Smith' }
        ];
        const selectedMembers = [];

        function toggleDropdown() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        }

        function selectMember(memberId) {
            const memberIndex = selectedMembers.indexOf(memberId);
            if (memberIndex > -1) {
                selectedMembers.splice(memberIndex, 1);
            } else {
                selectedMembers.push(memberId);
            }
            updateSelectedNames();
        }

        function updateSelectedNames() {
            const selectedNames = selectedMembers.map(id => members.find(member => member.id === id).name);
            document.getElementById('selectedNames').textContent = selectedNames.join(', ') || 'Select Members';
        }

        // Populate dropdown with members
        function populateDropdown() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            members.forEach(member => {
                const listItem = document.createElement('li');
                listItem.className = 'text-gray-900 cursor-default select-none py-2 pl-3 pr-9';
                listItem.textContent = member.name;
                listItem.onclick = () => selectMember(member.id);
                dropdownMenu.appendChild(listItem);
            });
        }

        document.getElementById('dropdownButton').addEventListener('click', toggleDropdown);
        window.onload = populateDropdown;
    </script>
</body>

</html>