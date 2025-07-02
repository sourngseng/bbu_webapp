<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .toast-container {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            z-index: 1050;
        }
        .modal-backdrop {
            z-index: 1040 !important;
        }
        .modal {
            z-index: 1050 !important;
        }
    </style>
</head>
<body>
    <!-- Main Container -->
    <div class="container py-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">Student Management</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModal" onclick="openCreateModal()">Add Student</button>
        </div>

        <!-- Students Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="studentsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date of Birth</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Populated dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create/Edit Modal -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="studentForm">
                        <input type="hidden" name="id" id="studentId">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <!-- <input type="tel" class="form-control" id="phone" name="phone" pattern="\+?[1-9]\d{1,14}" required> -->
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" maxlength="255" required></textarea>
                        </div>
                        <div id="formError" class="alert alert-danger d-none"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveButton" onclick="saveStudent()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this student?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container">
        <div id="toast" class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const studentModal = new bootstrap.Modal(document.getElementById('studentModal'));
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        const toastEl = document.getElementById('toast');
        const toast = new bootstrap.Toast(toastEl);
        let isEdit = false;
        let currentStudentId = null;

        // Load students on page load
        document.addEventListener('DOMContentLoaded', loadStudents);

        function loadStudents() {
            fetch('./api/students.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const tbody = document.querySelector('#studentsTable tbody');
                        tbody.innerHTML = '';
                        (data.data || []).forEach(student => {
                            const row = `
                                <tr>
                                    <td>${student.id}</td>
                                    <td>${student.first_name}</td>
                                    <td>${student.last_name}</td>
                                    <td>${student.email}</td>
                                    <td>${student.phone}</td>
                                    <td>${student.date_of_birth}</td>
                                    <td>${student.address}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning me-1" onclick="openEditModal(${student.id})">Edit</button>
                                        <button class="btn btn-sm btn-danger" onclick="openDeleteModal(${student.id})">Delete</button>
                                    </td>
                                </tr>
                            `;
                            tbody.innerHTML += row;
                        });
                    } else {
                        showToast(data.message, 'danger');
                    }
                })
                .catch(error => showToast('Error loading students', 'danger'));
        }

        function openCreateModal() {
            isEdit = false;
            document.getElementById('studentModalLabel').textContent = 'Add Student';
            document.getElementById('saveButton').textContent = 'Create';
            document.getElementById('studentForm').reset();
            document.getElementById('studentId').value = '';
            document.getElementById('formError').classList.add('d-none');
            studentModal.show();
        }

        function openEditModal(id) {
            fetch(`./api/students.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        isEdit = true;
                        document.getElementById('studentModalLabel').textContent = 'Edit Student';
                        document.getElementById('saveButton').textContent = 'Update';
                        document.getElementById('formError').classList.add('d-none');
                        const student = data.data;
                        document.getElementById('studentId').value = student.id;
                        document.getElementById('first_name').value = student.first_name;
                        document.getElementById('last_name').value = student.last_name;
                        document.getElementById('email').value = student.email;
                        document.getElementById('phone').value = student.phone;
                        document.getElementById('date_of_birth').value = student.date_of_birth;
                        document.getElementById('address').value = student.address;
                        studentModal.show();
                    } else {
                        showToast(data.message, 'danger');
                    }
                })
                .catch(error => showToast('Error fetching student', 'danger'));
        }

        function openDeleteModal(id) {
            currentStudentId = id;
            deleteModal.show();
        }

        function saveStudent() {
            const form = document.getElementById('studentForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const formData = {
                id: document.getElementById('studentId').value,
                first_name: document.getElementById('first_name').value,
                last_name: document.getElementById('last_name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                date_of_birth: document.getElementById('date_of_birth').value,
                address: document.getElementById('address').value
            };

            const method = isEdit ? 'PUT' : 'POST';
            fetch('./api/students.php', {
                method: method,
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        studentModal.hide();
                        loadStudents();
                        showToast(data.message, 'success');
                    } else {
                        document.getElementById('formError').textContent = data.message;
                        document.getElementById('formError').classList.remove('d-none');
                    }
                })
                .catch(error => showToast('Error saving student', 'danger'));
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', () => {
            fetch(`./api/students.php?id=${currentStudentId}`, {
                method: 'DELETE'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        deleteModal.hide();
                        loadStudents();
                        showToast(data.message, 'success');
                    } else {
                        showToast(data.message, 'danger');
                    }
                })
                .catch(error => showToast('Error deleting student', 'danger'));
        });

        function showToast(message, type) {
            const toastBody = toastEl.querySelector('.toast-body');
            toastEl.classList.remove('text-bg-success', 'text-bg-danger');
            toastEl.classList.add(`text-bg-${type}`);
            toastBody.textContent = message;
            toast.show();
        }
    </script>
</body>
</html>