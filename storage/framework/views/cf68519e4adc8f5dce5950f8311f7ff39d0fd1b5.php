<?php
use App\Models\Prize;

$current_probability = floatval(Prize::sum('probability'));
?>

<?php if($current_probability > 0): ?>
    <div class="alert alert-success">
        Total probability: <?php echo e($current_probability); ?>

    </div>
<?php else: ?>
    <div class="alert alert-warning">
        No prizes found.
    </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\lucky_prize_winner_event\resources\views/prob-notice.blade.php ENDPATH**/ ?>