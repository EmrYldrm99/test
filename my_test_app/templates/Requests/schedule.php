<h1>Schedule</h1>
<?= $this->Form->create($request) ?>
<fieldset>
    <legend>Daten</legend>
    <?php
        echo $this->Form->control('departure_date');
        echo $this->Form->control('departure_time');
        echo $this->Form->control('amount_passengers');
    ?>
</fieldset>