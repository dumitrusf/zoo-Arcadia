<div class="container mt-4 px-4 py-4" style="background-color: #d6d6d6; border-radius: 10px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">System Permissions Catalog</h1>
    </div>
    <p class="text-muted mb-4">
        This is a list of all possible actions within the system.
        Can't edit here; it serves as a reference dictionary.
    </p>

                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 40%;" class="ps-4">Permission</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Categoría 1: Gestión de Cuentas -->
                                <tr>
                                    <td colspan="2" class="table-dark fw-bold ps-4">🔑 Account Management

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>View Users</strong> (<code>users-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the list of users in the system.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Create Users</strong> (<code>users-create</code>)
                                    </td>
                                    <td>
                                        Allows creating new users.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Edit Users</strong> (<code>users-edit</code>)
                                    </td>
                                    <td>
                                        Allows editing existing users.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Delete Users</strong> (<code>users-delete</code>)
                                    </td>
                                    <td>
                                        Allows deleting users.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>View Roles</strong> (<code>roles-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the list of roles in the system.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Create Roles</strong> (<code>roles-create</code>)
                                    </td>
                                    <td>
                                        Allows creating new roles.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Edit Roles</strong> (<code>roles-edit</code>)
                                    </td>
                                    <td>
                                        Allows editing existing roles.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Delete Roles</strong> (<code>roles-delete</code>)
                                    </td>
                                    <td>
                                        Allows deleting roles.

                                    </td>
                                </tr>

                                <!-- Categoría 2: Gestión del Zoo -->
                                <tr>
                                    <td colspan="2" class="table-dark fw-bold ps-4">🎪 Zoo Management

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Create Services</strong> (<code>services-create</code>)
                                    </td>
                                    <td>
                                        Allows creating new services for the zoo.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>View Services</strong> (<code>services-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the list of services.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Edit Services</strong> (<code>services-edit</code>)
                                    </td>
                                    <td>
                                        Allows editing existing services.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Delete Services</strong> (<code>services-delete</code>)
                                    </td>
                                    <td>
                                        Allows deleting services.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>View Schedules</strong> (<code>schedules-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the list of schedules for the zoo.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Edit Schedules</strong> (<code>schedules-edit</code>)
                                    </td>
                                    <td>
                                        Allows updating the schedules for the zoo.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>View Habitats</strong> (<code>habitats-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the information of the habitats.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Edit Habitats</strong> (<code>habitats-edit</code>)
                                    </td>
                                    <td>
                                        Allows editing the information of the habitats.

                                    </td>
                                </tr>

                                <!-- Categoría 3: Gestión de Animales -->
                                <tr>
                                    <td colspan="2" class="table-dark fw-bold ps-4">🐼 Animal Management

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Add Animals</strong> (<code>animals-create</code>)
                                    </td>
                                    <td>
                                        Allows adding new animals to the zoo.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>View Animals</strong> (<code>animals-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the list and details of the animals.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Edit Animals</strong> (<code>animals-edit</code>)
                                    </td>
                                    <td>
                                        Allows editing the information of the animals.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Delete Animals</strong> (<code>animals-delete</code>)
                                    </td>
                                    <td>
                                        Allows deleting animals from the registry.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>View Animal Statistics</strong> (<code>animal_stats-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the statistics of visits to the animals (clicks).

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>View Animal Feeding</strong> (<code>animal_feeding-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the information of feeding of the animals.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Assign Food to Animal</strong> (<code>animal_feeding-assign</code>)
                                    </td>
                                    <td>
                                        Allows assigning and updating the food of an animal.

                                    </td>
                                </tr>

                                <!-- Categoría 4: Veterinaria -->
                                <tr>
                                    <td colspan="2" class="table-dark fw-bold ps-4">⚕️ Veterinary

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Create Veterinary Reports</strong> (<code>vet_reports-create</code>)
                                    </td>
                                    <td>
                                        Allows creating new veterinary reports.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>View Veterinary Reports</strong> (<code>vet_reports-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the veterinary reports.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Edit Veterinary Reports</strong> (<code>vet_reports-edit</code>)
                                    </td>
                                    <td>
                                        Allows editing existing veterinary reports.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Create Habitat Suggestions</strong> (<code>habitat_suggestions-create</code>)
                                    </td>
                                    <td>
                                        Allows the veterinarian to create suggestions for habitat improvement.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>View Habitat Suggestions</strong> (<code>habitat_suggestions-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the suggestions for habitat improvement.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Manage Habitat Suggestions</strong> (<code>habitat_suggestions-manage</code>)
                                    </td>
                                    <td>
                                        Allows accepting or rejecting suggestions for habitat improvement.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Delete Habitat Suggestions</strong> (<code>habitat_suggestions-delete</code>)
                                    </td>
                                    <td>
                                        Allows deleting suggestions for habitat improvement.

                                    </td>
                                </tr>

                                <!-- Categoría 5: Interacción Pública -->
                                <tr>
                                    <td colspan="2" class="table-dark fw-bold ps-4">💬 Public Interaction

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>View Testimonials</strong> (<code>testimonials-view</code>)
                                    </td>
                                    <td>
                                        Allows viewing the list of testimonials pending and approved.

                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="ps-4">
                                        <strong>Validate Testimonials</strong> (<code>testimonials-validate</code>)
                                    </td>
                                    <td>
                                        Allows validating or invalidating testimonials from visitors.

                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <strong>Delete Testimonials</strong> (<code>testimonials-delete</code>)
                                    </td>
                                    <td>
                                        Allows deleting testimonials.

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>