const cek = document.getElementById('cek');
const sidebar = document.querySelector('.sidebar');
const customNav = document.querySelector('.custom-nav');
const content = document.querySelector('.content'); // Tambahkan ini untuk memilih elemen content

cek.addEventListener('click', function() {
    sidebar.classList.toggle('close');
    if (sidebar.classList.contains('close')) {
        customNav.style.left = '70px'; // Lebar sidebar saat ditutup
        content.style.marginLeft = '80px'; // Sisipkan ini untuk mengubah posisi content saat sidebar ditutup
    } else {
        customNav.style.left = '260px'; // Lebar sidebar saat dibuka
        content.style.marginLeft = '270px'; // Sisipkan ini untuk mengubah posisi content saat sidebar dibuka
    }
});


function closeAlert(element) {
        var alert = element.parentElement;
        alert.style.display = "none";
    }

function deleteData(){
        pesan = confirm('data will be deleted ?');
        if(pesan) return true;
        else return false;
    }

    function confirmLogin(event) {
        event.preventDefault();
        const loginConfirmed = confirm("Logout !");
        if (loginConfirmed) {
            // Lakukan login
            const loginForm = document.getElementById('login-form');
            loginForm.submit();
        } else {
            // Batal login
            return false;
        }
    }