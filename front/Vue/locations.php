<div class="container">
    <h1>
        ICI LA LISTE DES ENSEIGNANTS
    </h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>FirstName</th>
            <th>Mail</th>
            <th>Delete</th>
        </tr>
        <?php
            foreach($locations as $location) {
                ?>
                <tr>
                    <td><?php echo $location->id; ?></td>
                    <td><?php echo $location->nom; ?></td>
                    <td><?php echo $location->prenom; ?></td>
                    <td><?php echo $location->email; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>
</div>