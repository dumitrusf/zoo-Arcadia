<?php
// App/vet_reports/views/gest/edit.php
// Include functions to use hasPermission()
require_once __DIR__ . '/../../../../includes/functions.php';

// Get user ID from session
$userId = $_SESSION['user']['id_user'] ?? null;
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Health Report</h1>
        <a href="/vreports/gest/start" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Reports
        </a>
    </div>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'error' && isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_GET['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/vreports/gest/update" method="POST">
                <!-- Hidden field for report ID -->
                <input type="hidden" name="id_hs_report" value="<?= $report->id_hs_report ?>">

                <!-- Animal Selection -->
                <div class="mb-3">
                    <label for="full_animal_id" class="form-label fw-bold">Animal <span class="text-danger">*</span></label>
                    <select class="form-select" id="full_animal_id" name="full_animal_id" required>
                        <option value="" disabled>Select an animal...</option>
                        <?php if (!empty($animals)): ?>
                            <?php foreach ($animals as $animal): ?>
                                <option value="<?= $animal->id_full_animal ?>" 
                                        <?= ($animal->id_full_animal == $report->id_full_animal) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($animal->animal_name ?? 'N/A') ?> 
                                    (<?= htmlspecialchars($animal->specie_name ?? 'N/A') ?>)
                                    <?php if ($animal->habitat_name): ?>
                                        - <?= htmlspecialchars($animal->habitat_name) ?>
                                    <?php endif; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option disabled>No animals available.</option>
                        <?php endif; ?>
                    </select>
                    <div class="form-text">Select the animal for this health report.</div>
                </div>

                <!-- Health State -->
                <div class="mb-3">
                    <label for="hsr_state" class="form-label fw-bold">Health State <span class="text-danger">*</span></label>
                    <select class="form-select" id="hsr_state" name="hsr_state" required>
                        <option value="" disabled>Select health state...</option>
                        <optgroup label="Good States">
                            <option value="healthy" <?= ($report->hsr_state === 'healthy') ? 'selected' : '' ?>>Healthy</option>
                            <option value="well" <?= ($report->hsr_state === 'well') ? 'selected' : '' ?>>Well</option>
                            <option value="good_condition" <?= ($report->hsr_state === 'good_condition') ? 'selected' : '' ?>>Good Condition</option>
                            <option value="happy" <?= ($report->hsr_state === 'happy') ? 'selected' : '' ?>>Happy</option>
                        </optgroup>
                        <optgroup label="Warning States">
                            <option value="quarantined" <?= ($report->hsr_state === 'quarantined') ? 'selected' : '' ?>>Quarantined</option>
                            <option value="recovering" <?= ($report->hsr_state === 'recovering') ? 'selected' : '' ?>>Recovering</option>
                            <option value="hungry" <?= ($report->hsr_state === 'hungry') ? 'selected' : '' ?>>Hungry</option>
                            <option value="sad" <?= ($report->hsr_state === 'sad') ? 'selected' : '' ?>>Sad</option>
                            <option value="depressed" <?= ($report->hsr_state === 'depressed') ? 'selected' : '' ?>>Depressed</option>
                            <option value="stressed" <?= ($report->hsr_state === 'stressed') ? 'selected' : '' ?>>Stressed</option>
                            <option value="nervous" <?= ($report->hsr_state === 'nervous') ? 'selected' : '' ?>>Nervous</option>
                            <option value="anxious" <?= ($report->hsr_state === 'anxious') ? 'selected' : '' ?>>Anxious</option>
                        </optgroup>
                        <optgroup label="Critical States">
                            <option value="sick" <?= ($report->hsr_state === 'sick') ? 'selected' : '' ?>>Sick</option>
                            <option value="injured" <?= ($report->hsr_state === 'injured') ? 'selected' : '' ?>>Injured</option>
                            <option value="malnourished" <?= ($report->hsr_state === 'malnourished') ? 'selected' : '' ?>>Malnourished</option>
                            <option value="dehydrated" <?= ($report->hsr_state === 'dehydrated') ? 'selected' : '' ?>>Dehydrated</option>
                            <option value="terminal" <?= ($report->hsr_state === 'terminal') ? 'selected' : '' ?>>Terminal</option>
                            <option value="angry" <?= ($report->hsr_state === 'angry') ? 'selected' : '' ?>>Angry</option>
                            <option value="aggressive" <?= ($report->hsr_state === 'aggressive') ? 'selected' : '' ?>>Aggressive</option>
                        </optgroup>
                        <optgroup label="Other States">
                            <option value="pregnant" <?= ($report->hsr_state === 'pregnant') ? 'selected' : '' ?>>Pregnant</option>
                            <option value="infant" <?= ($report->hsr_state === 'infant') ? 'selected' : '' ?>>Infant</option>
                        </optgroup>
                    </select>
                    <div class="form-text">Select the current health state of the animal.</div>
                </div>

                <!-- Review Date -->
                <div class="mb-3">
                    <label for="review_date" class="form-label fw-bold">Review Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="review_date" name="review_date" 
                           value="<?= htmlspecialchars($report->review_date) ?>" required>
                    <div class="form-text">Date when the health review was performed.</div>
                </div>

                <!-- Veterinary Observations -->
                <div class="mb-3">
                    <label for="vet_obs" class="form-label fw-bold">Veterinary Observations <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="vet_obs" name="vet_obs" rows="6" 
                              placeholder="Enter detailed observations about the animal's health condition..." required><?= htmlspecialchars($report->vet_obs) ?></textarea>
                    <div class="form-text">Detailed observations and notes from the veterinarian.</div>
                </div>

                <!-- Optional Details -->
                <div class="mb-3">
                    <label for="opt_details" class="form-label fw-bold">Optional Details</label>
                    <input type="text" class="form-control" id="opt_details" name="opt_details" 
                           placeholder="Additional optional information (max 255 characters)" 
                           value="<?= htmlspecialchars($report->opt_details ?? '') ?>"
                           maxlength="255">
                    <div class="form-text">Optional additional details or notes (for PDF generation, etc.).</div>
                </div>

                <!-- Hidden field for user ID -->
                <input type="hidden" name="checked_by" value="<?= $userId ?>">

                <!-- Submit Button -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="/vreports/gest/start" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update Report
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

