var imageUploadForm = document.getElementById('fileUploadForm');
var alertBox = document.getElementById('alert');
var alertMsg = document.getElementById('alert-msg');
imageUploadForm.addEventListener('submit', uploadImage);
function uploadImage(e) {
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    var formData = new FormData();
    var firstname = document.getElementById('firstname');
    var lastname = document.getElementById('lastname');
    var filename = document.getElementById('filename');
    formData.append('firstname', firstname.value);
    formData.append('lastname', lastname.value);
    formData.append('filename[]', filename.files[0]);
    xhr.open('POST', 'post/add', true);
    xhr.onload = function() {
        var response = JSON.parse(this.responseText);
        if (response.status == 1) {
            alertBox.innerHTML = response['message'];
            alertBox.classList.add('alert-success');
            alertBox.classList.remove('alert-danger');
            alertBox.classList.remove('d-none');
        } else {
            alertBox.innerHTML = response['message'];
            alertBox.classList.add('alert-danger');
            alertBox.classList.remove('alert-success');
            alertBox.classList.remove('d-none');
        }
    }
    xhr.send(formData);
    imageUploadForm.reset();
};