<?php
use App\Models\Prize;

$current_probability = floatval(Prize::sum('probability'));
?>

@if($current_probability > 0)
    <div class="alert alert-success">
        Total probability: {{ $current_probability }}
    </div>
@else
    <div class="alert alert-warning">
        No prizes found.
    </div>
@endif
