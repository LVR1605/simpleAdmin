<?php

require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

$sql = "SELECT * FROM admins WHERE deleted_at IS null";
$result = $conn->query($sql);

$conn->close();
        while ($row = $result->fetch_assoc()) {
            // Check if the logged-in admin's first name is "admin"
            // If it is, they can delete other admins (excluding themselves)
            if ($admin_first_name === "admin" && $row['admin_first_name'] !== "admin") {
                $deleteLink = '<a href="javascript:void(0);" onclick="confirmDelete(' . $row['admin_id'] . ')">Delete</a>';
            } else {
                // Admin with other names or "admin" itself can't delete
                $deleteLink = 'Not Authorized';
            }
        ?>
            <tr>
                <td><?php echo $row['admin_id']; ?></td>
                <td>
                    <?php echo $row['admin_first_name']; ?>
                    <?php echo $row['admin_last_name']; ?>
                </td>
                <td><?php echo $row['admin_email']; ?></td>
                <td><?php echo $row['admin_pass']; ?></td>
                <td><?php echo $deleteLink; ?></td>
            </tr>
        <?php } ?>