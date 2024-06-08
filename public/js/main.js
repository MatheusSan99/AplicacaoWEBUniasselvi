document.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
    const errorAlert = document.getElementById('errorAlert');
    const successAlert = document.getElementById('successAlert');

    if (errorAlert) {
        setTimeout(() => {
            errorAlert.classList.remove('show');
            errorAlert.classList.add('fade');
            setTimeout(() => errorAlert.remove(), 500);
        }, 4000);
    }

    if (successAlert) {
        setTimeout(() => {
            successAlert.classList.remove('show');
            successAlert.classList.add('fade');
            setTimeout(() => successAlert.remove(), 500);
        }, 4000); 
    }
});