<html>
<head>
<title>Hero Contact Center : Home</title>
</head>
<body>
    <table>
    <tr>
        <th>User Name</th>
        <th>Last Name</th>
        <th>First Name</th>
    </tr>
    <?php
        foreach($records as $row):
    ?>
    <tr>
        <td><?=$row->user_name?></td>
        <td><?=$row->last?></td>
        <td><?=$row->first?></td>
    </tr>
    <?php
        endforeach;
    ?>
    </table>
</body>
</html>