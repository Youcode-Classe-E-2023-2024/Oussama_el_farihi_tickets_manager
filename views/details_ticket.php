<?php

require_once '../classes/Ticket.php';
$ticket = new Ticket();
// Get the ticket ID from the URL query parameter
$id_ticket = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_ticket) {
    $ticketDetails = $ticket->getTicketById($id_ticket);
} else {
    // Handle the case where no ID is provided or redirect
    echo "No ticket ID provided.";
    exit;
}

?>
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
            
            <div class="flex flex-col px-4 py-5 sm:p-6">
               
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <p><?= htmlspecialchars($ticketDetails['titre']) ?></p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Assigned To</label>
                    <p><?= htmlspecialchars($ticketDetails['name']) ?></p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <p><?= htmlspecialchars($ticketDetails['status']) ?></p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Priorite</label>
                    <p><?= htmlspecialchars($ticketDetails['priorite']) ?></p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <p><?= htmlspecialchars($ticketDetails['description']) ?></p>
                </div>
                
            </div>
        </div>
    </div>
        </div>
        <form action="add_comment_process.php" method="post">
    <textarea name="comment" required></textarea>
    <input type="hidden" name="ticket_id" value="<?= $id_ticket ?>">
    <button type="submit">Post Comment</button>
</form>

        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
            <div class="max-w-2xl mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
                </div>
                <form class="mb-6">
                <form action="add_comment_process.php" method="post">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <!-- <label for="comment"  class="sr-only">Your comment</label>
                        <textarea id="comment" name="comment" rows="4" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:bg-gray-800" placeholder="Write a comment..." required></textarea>-->
                       <?php $comments = $ticket->getCommentsByTicketId($id_ticket);
foreach ($comments as $comment) {
    echo "<p>" . htmlspecialchars($comment['content']) . "</p>";
}
?>
                    </div>
                    <input type="hidden" name="ticket_id" value="<?= $id_ticket ?>">
                    <button type="submit" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-800">
                        Post comment
                    </button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
