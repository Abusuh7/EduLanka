//student/teacher form visibility
const showStudentButton = document.getElementById('showStudentBtn');
const showTeacherButton = document.getElementById('showTeacherBtn');
const newStudentFormContainer = document.getElementById('newStudentFormContainer');
const newTeacherFormContainer = document.getElementById('newTeacherFormContainer');

// const closeUserForm = document.getElementById('closeUserForm');

showStudentButton.addEventListener('click', () => {
    newStudentFormContainer.classList.remove('hidden');
    // hide teacher container when student button is pressed
    newTeacherFormContainer.classList.add('hidden');
});

showTeacherButton.addEventListener('click', () => {
    newTeacherFormContainer.classList.remove('hidden');
    // hide student container when teacher button is pressed
    newStudentFormContainer.classList.add('hidden');
});



// closeUserForm.addEventListener('click', () => {
//     formContainer.classList.add('hidden');
// });
