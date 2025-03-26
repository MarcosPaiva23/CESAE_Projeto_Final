// settings.js
document.addEventListener('DOMContentLoaded', function() {
    // Get the busy toggle element
    const busyToggle = document.getElementById('busyToggle');

    // Add event listener if the element exists
    if (busyToggle) {
        busyToggle.addEventListener('change', function() {
            toggleDays(this.checked);
        });
    }
});

/**
 * Toggles the availability of day checkboxes based on the busy status
 * @param {boolean} isBusy - Whether the user is marked as busy
 */
function toggleDays(isBusy) {
    const dayCheckboxes = document.querySelectorAll('.day-checkbox');
    const daysSection = document.getElementById('daysSection');

    // If busy, disable day checkboxes and clear them
    if (isBusy) {
        dayCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
            checkbox.disabled = true;
        });
        daysSection.style.opacity = '0.5';
    } else {
        // If not busy, enable day checkboxes
        dayCheckboxes.forEach(checkbox => {
            checkbox.disabled = false;
        });
        daysSection.style.opacity = '1';
    }
}
