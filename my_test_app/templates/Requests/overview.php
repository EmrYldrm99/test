<h2>Overview</h2>
<div class="requests-container">
    <table>
        <thead class="requests-header">
            <th>Id</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>AP</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>GDPR Agreed</th>
            <th>Actions</th>
        </thead>
        <tbody class="requests-data">
            <?php foreach($requests as $request): ?>
                <tr>
                    <td><?= $request->id ?></td>
                    <td><?= $request->departure_date ?></td>
                    <td><?= $request->departure_time ?></td>
                    <td><?= $request->amount_passengers ?></td>
                    <td><?= $request->first_name ?></td>
                    <td><?= $request->last_name ?></td>
                    <td><?= $request->gdpr_agreed ?></td>
                    <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                        <button>Select</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<h2>Selected</h2>
<div class="requests-container">
    <table>
        <thead class="requests-header">
            <th>Id</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>AP</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>GDPR Agreed</th>
            <th>Actions</th>
        </thead>
        <tbody class="requests-data">
            
        </tbody>
    </table>
</div>