// Confirm before deleting a record
function confirmDelete() {
    return confirm("Are you sure you want to delete this record?");
}

// Form validation example (extend for other forms)
function validateForm() {
    let amount = document.querySelector('input[name="amount"]').value;
    if (amount <= 0) {
        alert("Amount must be greater than zero.");
        return false;
    }
    return true;
}
