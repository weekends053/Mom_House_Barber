<?php
foreach ($Barber as $row) {
?>
    <tr>
        <td><?php echo $row->B_Name; ?></td>
        <td><?php echo $row->B_Lname; ?></td>
        <td><?php echo $row->B_Nickname; ?></td>
        <td><?php echo anchor('Customer_Con/customer_look_barber_profile/' . $row->B_ID, 'โปรไฟล์', 'class="anchor"') . br(1); ?></td>
    </tr>
<?php
}
?>