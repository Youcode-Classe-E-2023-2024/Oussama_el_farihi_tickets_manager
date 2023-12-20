<?php
require_once '../classes/Ticket.php';
require_once '../classes/User.php';

$ticket = new Ticket();
$priorities = $ticket->getPriorities();
$statuses = $ticket->getStatuses();

$user = new User();
$users = $user->getUsers();
?>

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
                                        <input type="text" id="title" name="title"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="assignedToDropdown"
                                            class="block text-sm font-medium leading-6 text-gray-900">Assigned
                                            to</label>
                                        <div class="relative mt-2">
                                            <button type="button" id="assignedToDropdown"
                                                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                                <span class="flex items-center">
                                                    <span class="ml-3 block truncate" id="selectedUsers">Select
                                                        Members</span>
                                                </span>
                                                <span
                                                    class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                </span>
                                            </button>
                                            <label for="assignedTo"
                                                class="block text-sm font-medium leading-6 text-gray-900">Assigned
                                                to</label>
                                            <select id="assignedTo" name="assignedTo[]" multiple
                                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                style="height: 100px;">
                                                <?php foreach ($users as $user): ?>
                                                    <option value="<?php echo htmlspecialchars($user['id_user']); ?>">
                                                        <?php echo htmlspecialchars($user['name']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="md:col-span-5">
                                        <label for="status"
                                            class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                        <select id="status" name="status"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="" name="status">Select Status</option>
                                            <?php foreach ($statuses as $status): ?>
                                                <option value="<?php echo htmlspecialchars($status); ?>">
                                                    <?php echo htmlspecialchars($status); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="md:col-span-5">
                                        <label for="priorite"
                                            class="block text-sm font-medium leading-6 text-gray-900">Priority</label>
                                        <select id="priorite" name="priorite"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="" name="priority">Select Priority</option>
                                            <?php foreach ($priorities as $priority): ?>
                                                <option value="<?php echo htmlspecialchars($priority); ?>">
                                                    <?php echo htmlspecialchars($priority); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="md:col-span-5">
                                        <button class="px-4 py-2 text-blue-500 hover:text-blue-600">+ Add tag</button>
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="description">Description</label>
                                        <textarea id="description" cols="30" rows="4" name="description"
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
        const members = <?php echo json_encode($users); ?>;
        let selectedUsers = [];

        function updateSelectedUsersDisplay() {
            const names = selectedUsers.map(id => {
                const user = members.find(member => member.id_user == id);
                return user ? user.name : '';
            });

            document.getElementById('selectedUsers').textContent = names.join(', ') || 'Select Members';
        }


        function toggleSelection(userId) {
            const index = selectedUsers.indexOf(userId);
            if (index > -1) {
                selectedUsers.splice(index, 1);
            } else {
                selectedUsers.push(userId);
            }
            updateSelectedUsersDisplay();
        }


        document.getElementById('assignedToDropdown').addEventListener('click', () => {
            document.getElementById('dropdownMenu').classList.toggle('hidden');
        });
    </script>
</body>

</html>