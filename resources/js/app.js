import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

//student/teacher form visibility
const showStudentButton = document.getElementById('showStudentBtn');
const showTeacherButton = document.getElementById('showTeacherBtn');
const newStudentFormContainer = document.getElementById('newStudentFormContainer');
const newTeacherFormContainer = document.getElementById('newTeacherFormContainer');

// const closeUserForm = document.getElementById('closeUserForm');

showStudentButton.addEventListener('click', () => {
    newStudentFormContainer.classList.remove('hidden');
});

// closeUserForm.addEventListener('click', () => {
//     formContainer.classList.add('hidden');
// });
