<?= $this->Form->create(null, ['url' => ['action' => 'overview']]) ?>
<h2>Overview</h2>
<div class="requests-container">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Departure Date</th>
                <th>Departure Time</th>
                <th>AP</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>GDPR Agreed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $request->id ?></td>
                    <td><?= $request->departure_date ?></td>
                    <td><?= $request->departure_time ?></td>
                    <td><?= $request->amount_passengers ?></td>
                    <td><?= $request->first_name ?></td>
                    <td><?= $request->last_name ?></td>
                    <td><?= $request->gdpr_agreed ?></td>
                    <td>
                        <input type="checkbox" 
                               class="item-checkbox" 
                               name="selectedRequests[]" 
                               value="<?= $request->id ?>" 
                               data-id="<?= $request->id ?>" 
                               <?= isset($selectedItems[$request->id]) ? 'checked' : '' ?>>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
