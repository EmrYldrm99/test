<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Request'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requests view content">
            <h3><?= h($request->first_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($request->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($request->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mail Address') ?></th>
                    <td><?= h($request->mail_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($request->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($request->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount Passengers') ?></th>
                    <td><?= $this->Number->format($request->amount_passengers) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departure Date') ?></th>
                    <td><?= h($request->departure_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departure Time') ?></th>
                    <td><?= h($request->departure_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gdpr Agreed') ?></th>
                    <td><?= $request->gdpr_agreed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>